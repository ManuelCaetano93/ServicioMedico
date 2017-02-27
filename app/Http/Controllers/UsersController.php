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
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
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
            'identification' => 'required|max:10',
            'birthday' => 'required',
            'age' => 'required|max:255',
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
            \DB::BeginTransaction();

            $user = User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'identification' => $request->input('identification'),
                'birthday' => $request->input('birthday'),
                'age' => $request->input('age'),
                'sex' => $request->input('sex'),
                'phone' => $request->input('phone'),
                'cellphone' => $request->input('cellphone'),
                'residence' => $request->input('residence'),
                'email' => $request->input('email'),

            ]);

            $user->assignRole($request->input('role'));

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Usuario ha sido creado con exito');
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
        $v = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'identification' => 'required|max:10',
            'birthday' => 'required',
            'age' => 'required|max:255',
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
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'identification' => $request->input('identification'),
                'birthday' => $request->input('birthday'),
                'age' => $request->input('age'),
                'sex' => $request->input('sex'),
                'phone' => $request->input('phone'),
                'cellphone' => $request->input('cellphone'),
                'residence' => $request->input('residence'),
                'email' => $request->input('email'),

            ]);
            if ($request->input('password')) {
                $v = Validator::make($request->all(),
                    [
                        'password' => 'requider|min:6|confirmed',
                    ]);
            }

            $user->syncRoles($request->input('role'));

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Usuario editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::detroy($id);
        return redirect('/users')->with('mensaje', 'Usuario eliminado satisfactoriamente');
    }
}
