<?php

namespace App\Http\Controllers;

use App\specialization;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

class SpecializationController extends Controller

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
        $specializations = Specialization::paginate();
        return view('specializations.index', ['specializations' => $specializations]);
    }
	
	public function deleted()
	{
		$specializations = Specialization::withTrashed()->paginate();
        return view('specializations.deleted', ['specializations' => $specializations]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('specializations.create', ['roles' => $roles]);
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
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::BeginTransaction();

            Specialization::create([
                'name' => $request->input('name'),
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/specializations')->with('mensaje', 'Especializacion ha sido creado con exito');
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
        $specialization = Specialization::findOrFail($id);
        return view('specializations.edit', ['specialization' => $specialization, 'roles' => $roles]);
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
            $specialization = specialization::findOrFail($id);
            $specialization->update([
                'name' => $request->input('name'),
            ]);
            

        } catch (\Exception $e) {
            echo $e->getMessage();
            \DB::rollback();
        } finally {
            \DB::commit();
        }
        return redirect('/specializations')->with('mensaje', 'Especializacion editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specialization::find($id)->delete();
        return redirect('/specializations')->with('message', 'Especializacion eliminada satisfactoriamente');
    }
	
	public function restore($id)
	{
		Specialization::withTrashed($id)->find($id)->restore();
		return redirect ('/specializations/deleted')->with('message', 'Especializacion restaurada exitosamente');
	}
}