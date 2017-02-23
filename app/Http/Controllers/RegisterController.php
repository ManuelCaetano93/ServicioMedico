<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'identification' => 'required|max:10',
            'birthday' => 'required',
            'age' => 'required|max:255',
            'sex' => 'required',
            'phone_number' => 'required|max:10',
            'cellphone' => 'required|max:10',
            'residence' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'identification' => $data['identification'],
            'birthday' => $data['birthday'],
            'sex' => $data['sex'],
            'phone_number' => $data['phone_number'],
            'cellphone' => $data['cellphone'],
            'residence' => $data['residence'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    //ble
}
=======
<?phpnamespace App\Http\Controllers;use App\User;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Spatie\Permission\Models\Role;use Spatie\Permission\Models\Permission;use Validator;class UsersController extends Controller{    /**     * Create a new controller instance.     *     * @return void     */    public function __contruct()    {        $this->middleware('auth');    }    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */    public function index()    {        $users = User::paginate();        return view('users.index', ['users'=>$users]);    }    /**     * Show the form for creating a new resource.     *     * @return \Illuminate\Http\Response     */    public function create()    {        if (!Auth::user()->can('CrearUsuario'))            abort(403, 'Acceso Prohibido');        $roles = Role::all();        return view('user.create', ['roles'=>$roles]);    }    /**     * Store a newly created resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @return \Illuminate\Http\Response     */    public function store(Request $request)    {        $v = Validator::make($request->all(),[            'name' => 'required|max:255',            'surname' => 'required|max:255',            'identification' => 'required|max:10',            'birthday' => 'required',            'age' => 'required|max:255',            'sex' => 'required',            'phone' => 'required|max:10',            'cellphone' => 'required|max:10',            'residence' => 'required|max:255',            'email' => 'required|email|max:255|unique:users',            'password' => 'required|min:6|confirmed',        ]);        if ($v ->fails()){            return redirect()->back()->withErrors($v)->withInput();        }        try{            \DB::BeginTransaction();            $user = User::create([                'name'=>$request->input('name'),                'surname'=>$request->input('surname'),                'identification'=>$request->input('identification'),                'birthday'=>$request->input('birthday'),                'age'=>$request->input('age'),                'sex'=>$request->input('sex'),                'phone'=>$request->input('phone'),                'cellphone'=>$request->input('cellphone'),                'residence'=>$request->input('residence'),                'email'=>$request->input('email'),            ]);            $user->assignRole($request->input('role'));        }catch (\Exception $e){            \DB::rollback();        }finally{            \DB::commit();        }        return redirect('/users')->with('mensaje', 'Usuario ha sido creado con exito');    }    /**     * Display the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function show($id)    {        //    }    /**     * Show the form for editing the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function edit($id)    {        if (! Auth::user()->can('EditarUsuario'))            abort(403);        $roles = Role::all();        $user = User::findOrFail($id);        return view('users.edit', ['user'=>$user, 'roles'=>$roles]);    }    /**     * Update the specified resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function update(Request $request, $id)    {        $v = Validator::make($request->all(), [            'name' => 'required|max:255',            'surname' => 'required|max:255',            'identification' => 'required|max:10',            'birthday' => 'required',            'age' => 'required|max:255',            'sex' => 'required',            'phone' => 'required|max:10',            'cellphone' => 'required|max:10',            'residence' => 'required|max:255',            'email' => 'required|email|max:255|unique:users',            'password' => 'required|min:6|confirmed',        ]);        if ($v->fails()) {            return redirect()->back()->withErrors($v)->withInput();        }        try {            \DB::beginTransaction();            $user = User::findOrFail($id);            $user->update([                'name'=>$request->input('name'),                'surname'=>$request->input('surname'),                'identification'=>$request->input('identification'),                'birthday'=>$request->input('birthday'),                'age'=>$request->input('age'),                'sex'=>$request->input('sex'),                'phone'=>$request->input('phone'),                'cellphone'=>$request->input('cellphone'),                'residence'=>$request->input('residence'),                'email'=>$request->input('email'),            ]);            if ($request->input('password')) {                $v = Validator::make($request->all(),                    [                        'password' => 'requider|min:6|confirmed',                    ]);            }            $user->syncRoles ($request->input('role'));        } catch (\Exception $e) {            echo $e->getMessage();            \DB::rollback();        } finally {            \DB::commit();        }        return redirect('/users')->with('mensaje', 'Usuario editado satisfactoriamente');    }    /**     * Remove the specified resource from storage.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function destroy($id)    {        if(! Auth::user()->can('EliminarUsuario'))            abort(403, 'Permiso Denegado');        User::detroy($id);        return redirect('/users')->with('mensaje', 'Usuario eliminado satisfactoriamente');    }    public function permisos($id)    {        if (! Auth::user()->can('PermisosUsuario'))            abort(403, 'Permiso Denegado');        $user = User::findOrFail($id);        $permisos = Permission::all();        return view('users.permisos',['user'=>$user, 'permisos'=>$permisos]);    }    public function asignarPermisos(Request $request, $id)    {        $user = User::findOrFail($id);        $user->revokePermissionTo(Permission::all());        if( $request->input('permisos'))            $user->givePermissionTo($request->input('permisos'));        return redirect('/users')->with('mensaje','Permisos Asignados Satisfactoriamente');    }}
>>>>>>> df15b75ca4d1de45d3f771c2e8ed270e4224ffc7
