<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Message;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use PDF;

class UserController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckAdminRole');
    }

    //Mostar los usuarios
    public function index(User $users, Request $request)
    {
        if ($request['search'] == null) {
            return view('users.index', [
                'users' => $users->paginate(6),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        } elseif ($request['search'] != null) {
            $search = $request->input('search');
            return view('users.index', [
                'users' => User::where('users.first_name', 'LIKE', "%$search%")
                    ->orWhere('users.last_name', 'LIKE', "%$search%")
                    ->orWhere('users.email', 'LIKE', "%$search%")
                    ->orWhere('users.dni', 'LIKE', "%$search%")
                    ->orWhere('users.phone', 'LIKE', "%$search%")
                    ->paginate(6),
                'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
            ]);
        }
    }

    //Generar PDF con los usuarios
    public function pdfUsers(User $users)
    {
        view()->share('users', User::all());
        $pdf = PDF::loadView('users.pdf-grid', User::all());
        return $pdf->download('Users.pdf');
    }
    //Generar PDF con los datos del usuario
    public function pdfUser(User $user)
    {
        view()->share('user', $user);
        $pdf = PDF::loadView('users.pdf-single', $user);
        return $pdf->download($user->first_name . '-' . str_replace(' ', '-', $user->last_name) . '.pdf');
    }

    //Mostrar vista crear usuario
    public function create()
    {
        return view('users.create', [
            'user' => new User(),
            'roles' => Role::all(),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
    //Crear usuario
    public function store(StoreUserRequest $request)
    {
        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'dni' => $request['dni'],
            'role_id' => $request['role_id'],
            'comertial' => $request['comertial'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'birthdate' => $request['birthdate'],
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('user.index')->with('status', 'Usuario creado con éxito.');
    }

    //Mostrar vista editar usuario
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'messages' => Message::where('messages.to_user_id', auth()->user()->id)->where('messages.readed', 'no')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
    //Editar usuario
    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated() + ['updated_at' => Carbon::now()]);
        return redirect()->route('user.edit', $user->id)->with('status', 'Usuario actualizado con éxito.');
    }

    //Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('status', 'Usuario eliminado con éxito.');

        if ($user->customers->count() >= 1 or $user->owners->count() >= 1) {
            return redirect()->route('users.edit', $user->id)->with('status', 'No puedes eliminar un usuario que tenga clientes y propieitarios en el sistema.');
        } elseif ($user->owners->count() == 0 and $user->customers->count() == 0) {
            $user->delete();
            return redirect('users')->with('status', 'Usuario eliminado con éxito.');
        }
    }
}
