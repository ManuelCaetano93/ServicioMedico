<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Specialization;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Validator;

class AppointmentsController extends Controller

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
        $roles = Role::all();
        $user = Auth::id();
        $appointments = appointment::paginate();
        return view('appointments.index', ['appointments' => $appointments, 'roles' => $roles, 'user' => $user]);
    }
	
	public function deleted()
	{
        $roles = Role::all();
		$appointments = Appointment::withTrashed()->paginate();
        return view('appointments.deleted', ['appointments' => $appointments, 'roles' => $roles]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        $specializations = Specialization::all();
        $doctor = User::all();
        return view('appointments.create', ['roles' => $roles, 'user' => $user, 'specializations' => $specializations, 'doctor' => $doctor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'date' => 'required|max:255',
            'id_user_doctor' => 'required|exists:users,id',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::BeginTransaction();
            $user = User::findOrFail($request->input('id_user_patient'));
            $specialization = Specialization::findOrFail($request->input('specialization'));
            $doctor = $request->input('id_user_doctor');
            if (User::findOrFail($doctor)->specializations->contains($specialization)){
                $user->appointments()->attach($doctor, ['date' => $request->input('date'), 'status' => 'Active',]);
            }
            else{
                return redirect('/appointments')->with('mensaje', 'Cita no pudo ser creada');
            }



        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->withErrors($v)->withInput();
        } finally {
            \DB::commit();
        }
        return redirect('/appointments')->with('mensaje', 'Cita ha sido creada con exito');
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
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', ['appointment' => $appointment, 'roles' => $roles]);
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
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();
            $appointment = Appointment::findOrFail($id);
            $appointment->update([
                'name' => $request->input('name'),
            ]);
            

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/users')->with('mensaje', 'Especializacion editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::where('id', $id)->update(array('status'=>'Canceled'));
        Appointment::find($id)->delete();
        return redirect('/appointments')->with('message', 'Cita eliminada satisfactoriamente');
    }
	
	public function restore($id)
	{
        Appointment::withTrashed($id)->where('id', $id)->update(array('status'=>'Active'));
		Appointment::withTrashed($id)->find($id)->restore();
		return redirect ('/appointment/deleted')->with('message', 'Cita restaurada exitosamente');
	}

    // Get and Post to create appointment for a user

    public function createappointment($id){

        $roles = Role::all();
        $user = User::findOrFail($id);
        $specializations = Specialization::all();
        $doctors = User::all();
        return view('appointments.create', ['roles' => $roles, 'user' => $user, 'specializations' => $specializations, 'doctors' => $doctors]);
    }
}