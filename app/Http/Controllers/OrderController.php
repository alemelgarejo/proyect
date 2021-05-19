<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Estate;
use App\Models\Message;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckAdminRole', ['only' => ['index']]);
        $this->middleware('CheckNormalRole');
    }

    //Mostar las órdenes
    public function index(Order $orders, Request $request)
    {
        if ($request['search'] == null) {
            return view('orders.index', [
                'orders' => $orders->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            return view('orders.index', [
                'orders' => Order::where('orders.type', 'LIKE', "%$search%")
                    ->orWhere('orders.city', 'LIKE', "%$search%")
                    ->orWhere('orders.max_value', 'LIKE', "%$search%")
                    ->orWhere('orders.min_surface', 'LIKE', "%$search%")
                    ->orWhere('orders.min_rooms', 'LIKE', "%$search%")
                    ->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        }
    }

    //Mostar las órdenes de los clientes del usuario
    public function index2(Order $orders, Request $request)
    {
        if ($request['search'] == null) {
            return view('my-orders.index', [
                'orders' => Order::join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->where('customers.user_id', '=', auth()->user()->id)
                    ->select('orders.*')
                    ->paginate(5),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            $orders = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
                ->where('customers.user_id', '=', auth()->user()->id)
                ->where('orders.type', 'LIKE', "%$search%")
                ->orWhere('orders.city', 'LIKE', "%$search%")
                ->orWhere('orders.max_value', 'LIKE', "%$search%")
                ->orWhere('orders.min_surface', 'LIKE', "%$search%")
                ->orWhere('orders.min_rooms', 'LIKE', "%$search%")
                ->paginate(5);
            for ($i = 0; $i < count($orders); $i++) {
                if ($orders[$i]->customer->user_id != auth()->user()->id) {
                    unset($orders[$i]);
                }
            }

            return view('my-orders.index', [
                'orders' => $orders,
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        }
    }

    //Generar PDF con los clientes
    public function pdfOrders(Order $orders)
    {
        view()->share('orders', Order::all());
        $pdf = PDF::loadView('orders.pdf-grid', Order::all());
        return $pdf->download('Orders.pdf');
    }
    //Generar PDF con los clientes del usuario
    public function pdfMyOrders(Order $orders)
    {
        view()->share(['orders', Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('customers.user_id', '=', auth()->user()->id)->get()]);
        $pdf = PDF::loadView('orders.pdf-grid', Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->where('customers.user_id', '=', auth()->user()->id)->get());
        return $pdf->download('My-Orders.pdf');
    }
    //Generar PDF con los datos del clientes
    public function pdfOrder(Order $order)
    {
        view()->share([
            'order' => $order,
            'estates' => Estate::where('estates.interest_type', 'LIKE', "%$order->type%")
                ->orWhere('estates.city', 'LIKE', "%$order->city%")
                ->orWhere('estates.value', '<', "%$order->max_value%")
                ->orWhere('estates.value', 'LIKE', "%$order->max_value%")
                ->orWhere('estates.surface', '>', "%$order->min_surface%")
                ->orWhere('estates.surface', 'LIKE', "%$order->min_surface%")
                ->orWhere('estates.rooms', '>', "%$order->min_rooms%")
                ->orWhere('estates.rooms', 'LIKE', "%$order->min_rooms%")
                ->orWhere('estates.furnished', 'LIKE', "%$order->furnished%")
                ->paginate(5),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
        $pdf = PDF::loadView('orders.pdf-single', $order);
        return $pdf->download($order->id . '-' . $order->customer->first_name . '-' . str_replace(' ', '-', $order->customer->last_name) . '-Order' . '.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Customer::all());
        return view('orders.create', [
            'order' => new Order(),
            'customers' => Customer::all(),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
    public function create2(Customer $customer)
    {
        return view('orders.create', [
            'order' => new Order(),
            'customer' => $customer,
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /* public function searchOrder(Order $order, Estate $estates) {
        return view('orders.result', [
            'estates' => Estate::where('estates.interest_type', 'LIKE', "%$order->type%")
                    ->orWhere('estates.address', 'LIKE', "%$order->address%")
                    ->orWhere('estates.city', 'LIKE', "%$order->city%")
                    ->orWhere('estates.value', '<=', "%$order->max_value%")
                    ->orWhere('estates.surface', '>=', "%$order->min_surface%")
                    ->orWhere('estates.rooms', '>=', "%$order->min_rooms%")
                    ->orWhere('estates.furnished', 'LIKE', "%$order->furnished%")
                    ->orWhere('estates.wardrobe', 'LIKE', "%$order->wardrobe%")
                    ->paginate(5),
            ]);
    } */

    public function store(StoreOrderRequest $request, Order $order)
    {

        Order::create([
            'customer_id' => $request['customer_id'],
            'type' => $request['type'],
            'city' => $request['city'],
            'estate_type' => $request['estate_type'],
            'min_value' => $request['min_value'],
            'max_value' => $request['max_value'],
            'min_surface' => $request['min_surface'],
            'max_surface' => $request['max_surface'],
            'min_rooms' => $request['min_rooms'],
            'max_rooms' => $request['max_rooms'],
            'furnished' => $request['furnished'],
            'elevator' => $request['elevator'],
            'garage' => $request['garage'],
            'terraces' => $request['terraces'],
            'courtyard' => $request['courtyard'],
            'heating' => $request['heating'],
            'air_conditioning' => $request['air_conditioning'],
            'garden' => $request['garden'],
            'pool' => $request['pool'],
            'situation' => $request['situation'],
            'conservation_state' => $request['conservation_state'],
            'need_loan' => $request['need_loan'],
            'observations' => $request['observations'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('orders.index')->with('status', 'Órden creada con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order, Customer $customer, Estate $estates)
    {
        return view('orders.edit', [
            'order' => $order,
            'customer' => $customer,
            'estates' => Estate::where('estates.interest_type', 'LIKE', "%$order->type%")
                ->orWhere('estates.city', 'LIKE', "%$order->city%")
                ->orWhere('estates.value', '<', "%$order->max_value%")
                ->orWhere('estates.value', 'LIKE', "%$order->max_value%")
                ->orWhere('estates.surface', '>', "%$order->min_surface%")
                ->orWhere('estates.surface', 'LIKE', "%$order->min_surface%")
                ->orWhere('estates.rooms', '>', "%$order->min_rooms%")
                ->orWhere('estates.rooms', 'LIKE', "%$order->min_rooms%")
                ->orWhere('estates.furnished', 'LIKE', "%$order->furnished%")
                ->paginate(5),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated() + ['updated_at' => Carbon::now()]);
        return redirect()->route('orders.edit', $order->id)->with('status', 'Órden actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders')->with('status', 'Órden eliminada con éxito.');
    }
}
