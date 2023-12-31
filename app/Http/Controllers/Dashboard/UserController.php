<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Laratrust\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('accessToDashboard');
        $this->middleware('permission:users_create')->only('index');
    }
    public function index()
    {
        $data = User::paginate(4);

        return view('dashboardA.users.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Role::all();
        $data2 = Permission::all();
        return view('dashboardA.users.create', compact('data', 'data2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:20',
            'role' => 'required',
            'perm' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg|max:3000',
        ]);

        // dd($request);
        $request_except = $request->except('password', 'role', 'img', '_token', 'perm');
        $request_except['password'] = Hash::make($request->password);
        if ($request->img) {
            $imageName = uniqid() . $request->file('img')->getClientOriginalName();
        }
        $user = User::create($request_except);


        $user->addRole($request->role);
        // dd($request->perm);
        $user->givePermissions($request->perm);
        toast('The new user was added', 'success');

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        // $user_role = $user->roles;
        // $user_perm = $user->allPermissions();

        $data = Role::all();
        $data2 = Permission::all();

        return view('dashboardA.users.edit', compact('user', 'data', 'data2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'required|min:8|max:20',
            'role' => 'required',
            'perm' => 'required',
        ]);

        // dd($request);
        $request_except = $request->except('password', 'role', '_token', 'perm');

        if (!$request->Password == '') {
            return $request_except;
        } else {
            $request_except['password'] = Hash::make($request->password);
        }
        $user->removeRoles();
        $user->addRole($request->role);

        $user->removePermissions();
        $user->givePermissions($request->perm);
        $user->update($request_except);

        toast('user edited', 'info');

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // dd($id);
        $user = User::findOrFail($id);
        $user->removeRoles();
        $user->removePermissions();
        $user->delete();

        toast('user deleted', 'success');

        return redirect()->route('dashboard.users.index');
    }
}
