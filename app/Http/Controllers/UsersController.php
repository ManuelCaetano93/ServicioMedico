<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;
use Auth;

use App\Specialization;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __contruct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'identification' => 'required|unique:users|numeric',
            'birthday' => 'required',
            'sex' => 'required',
            'phone' => 'required|max:10',
            'cellphone' => 'required|max:10',
            'residence' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
      }

        try {
            \DB::beginTransaction();
           User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'identification' => $request->input('identification'),
                'birthday' => $request->input('birthday'),
                'sex' => $request->input('sex'),
                'phone' => $request->input('phone'),
                'cellphone' => $request->input('cellphone'),
                'residence' => $request->input('residence'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/users')->with('mensaje', 'Usuario creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'identification' => 'required|max:8|unique:users,identification,' . $id . ',id',
                'birthday' => 'required',
                'sex' => 'required',
                'phone' => 'required|max:10',
                'cellphone' => 'required|max:10',
                'residence' => 'required|max:255',
                'email' => 'required|max:255',
            ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        try {
            // Iniciamos un proceso de transaccion
            \DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'identification' => $request->input('identification'),
                'birthday' => $request->input('birthday'),
                'sex' => $request->input('sex'),
                'phone' => $request->input('phone'),
                'cellphone' => $request->input('cellphone'),
                'residence' => $request->input('residence'),
                'email' => $request->input('email'),
            ]);
            if ($request->input('password')) {
                $v = Validator::make($request->all(),
                    [
                        'password' => 'required|min:6|confirmed',
                    ]);
                if ($v->fails()) {
                    return redirect()->back()->withErrors($v)->withInput();
                }
                $user->update([
                    'password' => bcrypt($request->input('password')),
                ]);
            }
            // $user->removeRole(Role::all());
            // $user->assignRole($request->input('role'));
            // $user->syncRoles($request->input('role'));
        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Usuario actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users')->with('mensaje', 'Usuario eliminado satisfactoriamente');
    }


    public function permissions($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $permissions = Permission::all();
        return view('users.permissions', ['roles' => $roles, 'user' => $user, 'permissions' => $permissions]);
    }

    public function asignpermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->revokePermissionTo(Permission::all());
        if ($request->input('permissions'))
            $user->givePermissionTo($request->input('permissions'));
        return redirect('/users')->with('mensaje', 'Permisos Asignados Satisfactoriamente');
    }

    // Get to create the view to associate a specialization

    public function associate($id){
        $roles = Role::all();
        $user = User::findOrFail($id);
        $specializations = Specialization::all();
        return view('users.associate', ['roles' => $roles, 'user' => $user, 'specializations' => $specializations]);
    }
}

// TODO: FINISH CREATING THE SPECIALIZATIONS TABLE

