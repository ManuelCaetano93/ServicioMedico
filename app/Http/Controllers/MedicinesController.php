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

    public function deleted(){
        $medicines = Medicines::withTrashed()->paginate();
        return view('/medicines/deleted', ['medicines' => $medicines]);
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
            'component' => 'required|max:255|alpha',
            'presentation' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            Medicines::create([
                'name' => $request->input('name'),
                'component' => $request->input('component'),
                'presentation' => $request->input('presentation'),
            ]);

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/medicines')->with('mensaje', 'Medicina ha sido creada con exito');
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
        $medicines = Medicines::findOrFail($id);
        return view('medicines.edit', ['medicines' => $medicines]);
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
            'component' => 'required|max:255|alpha',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }

        try {
            \DB::beginTransaction();

            $medicine = Medicines::findOrFail($id);
            $medicine->update([
                'name' => $request->input('name'),
                'component' => $request->input('component'),
            ]);

        } catch (\Exception $e) {
            \DB::rollback();
        } finally {
            \DB::commit();
        }

        return redirect('/medicines')->with('mensaje', 'Medicina ha sido editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicines::find($id)->delete();
        return redirect('/medicines')->with('mensaje', 'Medicina eliminada satisfactoriamente');
    }

    public function restore($id)
    {
        Medicines::withTrashed($id)->find($id)->restore();
        return redirect('/medicines/deleted')->with('mensaje', 'Medicina recuperada exitosamente');
    }
}
