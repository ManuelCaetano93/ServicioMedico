<?php

namespace App\Http\Controllers;

use App\Medicines;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Validator;
use Auth;

class MedicinesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
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
        $medicines = Medicines::paginate();
        return view('medicines.index', ['medicines' => $medicines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Medicines.create');
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
            'name' => 'required|max:255|alpha',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            Medicines::create([
                'name' => $request->input('name'),
            ]);

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/medicines')->with('mensaje', 'Medicine ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicines::findOrFail($id);
        return view('Medicines.show', ['Medicine' => $medicine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicines::findOrFail($id);
        return view('medicines.edit', ['medicines' => $medicine]);
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
            'name' => 'required|max:255|alpha',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $medicine = Medicines::findOrFail($id);
            $medicine->update([
                'name' => $request->input('name'),
            ]);

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/medicines')->with('mensaje', 'Medicine ha sido editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicines::destroy($id);
        return redirect('/medicines')->with('mensaje', 'Medicinas eliminado satisfactoriamente');
    }

    public function permissions($id)
    {
        if (!Auth::user()->can('PermissionsMedicine'))
            abort(403);

        $medicine = Medicines::findOrFail($id);
        $permissions = Permission::all();
        return view('medicines.permissions', ['medicine' => $medicine, 'permissions' => $permissions]);
    }

    public function asignpermissions(Request $request, $id)
    {
        $medicine = Medicines::findOrFail($id);
        $medicine->revokePermissionTo(Permission::all());
        if ($request->input('permissions'))
            $medicine->givePermissionTo($request->input('permissions'));
        return redirect('/medicines')->with('mensaje', 'Permisos Asignados Satisfactoriamente');
    }
}
