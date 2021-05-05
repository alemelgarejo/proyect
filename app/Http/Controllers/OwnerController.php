<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Owner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class OwnerController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckAdminRole', ['only' => ['index']]);
        $this->middleware('CheckNormalRole');
    }

    //Mostar los propietarios
    public function index(Owner $owners, Request $request)
    {
        if ($request['search'] == null) {
            return view('owners.index', ['owners' => $owners->orderBy('status', 'DESC')->paginate(5)]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            return view('owners.index', [
                'owners' => Owner::where('owners.first_name', 'LIKE', "%$search%")
                    ->orWhere('owners.last_name', 'LIKE', "%$search%")
                    ->orWhere('owners.email', 'LIKE', "%$search%")
                    ->orWhere('owners.dni', 'LIKE', "%$search%")
                    ->orWhere('owners.phone', 'LIKE', "%$search%")
                    ->paginate(5)
            ]);
        }
    }
    //Mostar los propietarios del usuario actual
    public function index2(Owner $owners, Request $request)
    {
        if ($request['search'] == null) {
            return view('my-owners.index', [
                'owners' => Owner::where('owners.user_id', '=', auth()->user()->id)
                    ->orderBy('status', 'DESC')
                    ->select('owners.*')
                    ->paginate(5),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            $owners = Owner::where('owners.first_name', 'LIKE', "%$search%")
                ->orWhere('owners.last_name', 'LIKE', "%$search%")
                ->orWhere('owners.email', 'LIKE', "%$search%")
                ->orWhere('owners.dni', 'LIKE', "%$search%")
                ->orWhere('owners.phone', 'LIKE', "%$search%")
                ->where('owners.user_id', '=', auth()->user()->id)
                ->paginate(5);

            for ($i = 0; $i < count($owners); $i++) {
                if ($owners[$i]->user_id != auth()->user()->id) {
                    unset($owners[$i]);
                }
            }

            return view('my-owners.index', [
                'owners' => $owners,
            ]);
        }
    }

    //Generar PDF con los propietarios
    public function pdfOwners(Owner $owners)
    {
        view()->share('owners', Owner::all());
        $pdf = PDF::loadView('owners.pdf-grid', Owner::all());
        return $pdf->download('Owners.pdf');
    }
    //Generar PDF con los propietarios del usuario
    public function pdfMyOwners(Owner $owners)
    {
        view()->share('owners', Owner::where('owners.user_id', '=', auth()->user()->id)->get());
        $pdf = PDF::loadView('owners.pdf-grid', Owner::where('owners.user_id', '=', auth()->user()->id)->get());
        return $pdf->download('My-Owners.pdf');
    }
    //Generar PDF con los datos del propietarios
    public function pdfOwner(Owner $owner)
    {
        view()->share('owner', $owner);
        $pdf = PDF::loadView('owners.pdf-single', $owner);
        return $pdf->download($owner->first_name . '-' . str_replace(' ', '-', $owner->last_name) . '.pdf');
    }

    //Mostrar vista crear propietarios
    public function create()
    {
        return view('owners.create', ['owner' => new Owner(), 'users' => User::all()]);
    }
    //Crear propietarios
    public function store(StoreOwnerRequest $request)
    {
        Owner::create([
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
            'observations' => $request['observations'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('owners.index')->with('status', 'Propietario creado con éxito.');
    }

    //Mostrar vista editar propietarios
    public function edit(Owner $owner)
    {
        return view('owners.edit', ['owner' => $owner, 'users' => User::all()]);
    }
    //Editar propietario
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $owner->update($request->validated() + ['updated_at' => Carbon::now()]);
        return redirect()->route('owners.edit', $owner->id)->with('status', 'Propietario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
