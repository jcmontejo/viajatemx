<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'lastname' => 'required', 'email' => 'required|string|email|max:255|unique:users', 'password' => 'required|string|min:6', 'roles' => 'required|min:1']);
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ($user = User::create($request->except('roles', 'permissions'))) {
            $this->syncPermissions($request, $user);

            Session::flash('message', 'Usuario agregado.');
            Session::flash('status', 'success');
        } else {
            Session::flash('message', 'Usuario agregado.');
            Session::flash('status', 'success');
        }
        return redirect('/empleados');

    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (!$user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'id', 'roles', 'permissions'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email|unique:users,email,' . $request->input('id'), 'roles' => 'required|min:1']);

        // Get the user
        $user = User::findOrFail($request->input('id'));

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password', 'status'));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // check for status change
        if ($request->get('status')) {
            $user->status = 0;
        }else {
            $user->status = 1;
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        return redirect('/empleados')->with('success', 'Registro editado satisfactoriamente.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/empleados')->with('success', 'Registro eliminado satisfactoriamente.');
    }
}
