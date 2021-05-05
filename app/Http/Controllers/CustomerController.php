<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckAdminRole', ['only' => ['index']]);
        $this->middleware('CheckNormalRole');
    }

    //Mostar los clientes
    public function index(Customer $customers, Request $request)
    {
        if ($request['search'] == null) {
            return view('customers.index', ['customers' => $customers->orderBy('status', 'DESC')->paginate(5)]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            return view('customers.index', [
                'customers' => Customer::where('customers.first_name', 'LIKE', "%$search%")
                    ->orWhere('customers.last_name', 'LIKE', "%$search%")
                    ->orWhere('customers.email', 'LIKE', "%$search%")
                    ->orWhere('customers.dni', 'LIKE', "%$search%")
                    ->orWhere('customers.phone', 'LIKE', "%$search%")
                    ->paginate(5)
            ]);
        }
    }
    //Mostar los clientes del usuario actual
    public function index2(Customer $customers, Request $request)
    {
        if ($request['search'] == null) {
            return view('my-customers.index', [
                'customers' => Customer::where('customers.user_id', '=', auth()->user()->id)
                    ->select('customers.*')
                    ->orderBy('status', 'DESC')
                    ->paginate(5),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            $customers = Customer::where('customers.first_name', 'LIKE', "%$search%")
                ->orWhere('customers.last_name', 'LIKE', "%$search%")
                ->orWhere('customers.email', 'LIKE', "%$search%")
                ->orWhere('customers.dni', 'LIKE', "%$search%")
                ->orWhere('customers.phone', 'LIKE', "%$search%")
                ->where('customers.user_id', '=', auth()->user()->id)
                ->paginate(5);
            for ($i = 0; $i < count($customers); $i++) {
                if ($customers[$i]->user_id != auth()->user()->id) {
                    unset($customers[$i]);
                } /* elseif($customers[$i]->user_id == auth()->user()->id) {

                } */
            }


            return view('my-customers.index', [
                'customers' => $customers
            ]);
        }
    }

    //Generar PDF con los clientes
    public function pdfCustomers(Customer $customers)
    {
        view()->share('customers', Customer::all());
        $pdf = PDF::loadView('customers.pdf-grid', Customer::all());
        return $pdf->download('Customers.pdf');
    }
    //Generar PDF con los clientes del usuario
    public function pdfMyCustomers(Customer $customers)
    {
        view()->share('customers', Customer::where('customers.user_id', '=', auth()->user()->id)->get());
        $pdf = PDF::loadView('customers.pdf-grid', Customer::where('customers.user_id', '=', auth()->user()->id)->get());
        return $pdf->download('My-Customers.pdf');
    }
    //Generar PDF con los datos del clientes
    public function pdfCustomer(Customer $customer)
    {
        view()->share('customer', $customer);
        $pdf = PDF::loadView('customers.pdf-single', $customer);
        return $pdf->download($customer->first_name . '-' . str_replace(' ', '-', $customer->last_name) . '.pdf');
    }

    //Mostrar vista crear cliente
    public function create()
    {
        return view('customers.create', ['customer' => new Customer(), 'users' => User::all()]);
    }
    //Crear cliente
    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'dni' => $request['dni'],
            'user_id' => auth()->user()->id,
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'city' => $request['city'],
            'status' => $request['status'],
            'birthdate' => $request['birthdate'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('customers.index')->with('status', 'Cliente creado con éxito.');
    }

    //Mostrar vista editar cliente
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer, 'users' => User::all()]);
    }

    //Editar cliente
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated() + ['updated_at' => Carbon::now()]);
        return redirect()->route('customers.edit', $customer->id)->with('status', 'Cliente actualizado con éxito.');
    }

    //Eliminar cliente
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers')->with('status', 'Cliente eliminado con éxito.');
    }
}
