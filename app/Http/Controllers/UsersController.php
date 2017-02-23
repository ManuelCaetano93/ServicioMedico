<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Validator;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __contruct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('CrearUsuario'))
            abort(403, 'Acceso Prohibido');

        $roles = Role::all();
        return view('user.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            'nombre'=> 'required|max:255',
            'apellido'=> 'required|max:255',
            'cedula'=> 'required|max:8|unique:user',
            'telefono'=> 'max:255',
            'celular'=> 'max:255',
            'email'=> 'required|email|max:255|unique:user',
            'password'=> 'required|min:6|confirmed',
            'role'=> 'required',

        ]);

        if ($v ->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::BeginTransaction();

            $user = User::create([
                'nombre'=>$request->input('nombre'),
                'apellido'=>$request->input('apellido'),
                'cedula'=>$request->input('cedula'),
                'telefono'=>$request->input('telefono'),
                'celular'=>$request->input('celular'),
                'email'=>$request->input('email'),
                'password'=>bcrypt($request->input('password')),

            ]);

            $user->assignRole($request->input('role'));

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Usuario ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Auth::user()->can('EditarUsuario'))
            abort(403);

        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users.edit', ['user'=>$user, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'nombre'=> 'required|max:255',
            'apellido'=> 'required|max:255',
            'cedula'=> 'required|max:8|unique:users,cedula,'.$id.',id',
            'telefono'=> 'max:255',
            'celular'=> 'max:255',
            'email'=> 'required|email|max:255|unique:users, email,'.$id.'id',
            'role'=> 'required',

        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->update([
                'nombre'=>$request->input('nombre'),
                'apellido'=>$request->input('apellido'),
                'cedula'=>$request->input('cedula'),
                'telefono'=>$request->input('telefono'),
                'celular'=>$request->input('celular'),
                'email'=>$request->input('email'),

            ]);
            if ($request->input('password')) {
                $v = Validator::make($request->all(),
                    [
                        'password' => 'requider|min:6|confirmed',
                    ]);
            }

            $user->syncRoles ($request->input('role'));

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'usuario editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(! Auth::user()->can('EliminarUsuario'))
            abort(403, 'Permiso Denegado');

        User::detroy($id);
        return redirect('/users')->with('mensaje', 'usuario eliminado satisfactoriamente');
    }

    public function permisos($id)
    {
        if (! Auth::user()->can('PermisosUsuario'))
            abort(403, 'Permiso Denegado');

        $user = User::findOrFail($id);
        $permisos = Permission::all();
        return view('users.permisos',['user'=>$user, 'permisos'=>$permisos]);

    }

    public function asignarPermisos(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->revokePermissionTo(Permission::all());
        if( $request->input('permisos'))
            $user->givePermissionTo($request->input('permisos'));
        return redirect('/users')->with('mensaje','Permisos Asignados Satisfactoriamente');
    }
}
