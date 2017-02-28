<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $appointments = appointment::paginate();
        return view('appointments.index', ['appointments' => $appointments]);
    }
	
	public function deleted()
	{
		$appointments = appointment::withTrashed()->paginate();
        return view('appointments.deleted', ['appointments' => $appointments]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('appointments.create', ['roles' => $roles]);
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
            'date' => 'required|max:255',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::BeginTransaction();

            $appointment = Appointment::create([
                'date' => $request->input('date'),
                'status' => 'Active',
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/appointments')->with('mensaje', 'Especializacion ha sido creado con exito');
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
            $appointment = appointment::findOrFail($id);
            $appointment->update([
                'name' => $request->input('name'),
            ]);
            

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/appointments')->with('mensaje', 'Especializacion editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect('/appointments')->with('message', 'Cita eliminada satisfactoriamente');
    }
	
	public function restore($id)
	{
		Appointment::withTrashed($id)->find($id)->restore();
		return redirect ('/appointments/deleted')->with('message', 'Cita restaurada exitosamente');
	}
}