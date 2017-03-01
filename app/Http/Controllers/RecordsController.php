<?php

namespace App\Http\Controllers;

use App\Records;
use Illuminate\Http\Request;
use Validator;
use Auth;

class RecordsController extends Controller
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
        $records = Records:: paginate(10);
        return view('records.index', ['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
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
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'suffering' => 'required',
            'doctor' => 'required',
            'pretreatments' => 'required|max:255',
            'medicines' => 'required|max:255',
            'status' => 'required',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();

            Records::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'suffering' => $request->input('suffering'),
                'doctor' => $request->input('doctor'),
                'pretreatments' => $request->input('pretreatments'),
                'medicines' => $request->input('medicines'),
                'status' => $request->input('status'),
            ]);

        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/records')->with('mensaje', 'Historia creada satisfactoriamente');
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
        $record = Records::findOrFail($id);
        return view('records.edit', ['record'=>$record]);
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
        $v = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required|max:400',
            'suffering' => 'required',
            'doctor' => 'required',
            'pretreatments' => 'required|max:255',
            'medicines' => 'required|max:255',
            'status' => 'required',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }

        try{
            \DB::beginTransaction();
            $record = Records::findOrFail($id);
            $record->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'suffering' => $request->input('suffering'),
                'doctor' => $request->input('doctor'),
                'pretreatments' => $request->input('pretreatments'),
                'medicines' => $request->input('medicines'),
                'status' => $request->input('status'),
            ]);
        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }

        return redirect('/records')->with('mensaje', 'Historia actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Records::findOrFail($id);
        $record->destroy($record->id);

        record::destroy($id);
        return redirect('/records')->with('mensaje', 'Historia eliminado satisfactoriamente');
    }

    public function postular($id){
        Auth::user()->record()->attach($id);
        return redirect('/records')->with('mensaje', 'Postulado satisfactoriamente');
    }

}