<?php

namespace App\Http\Controllers;

use App\Records;
use App\Medicines;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::id();
        $user_records = Records::all();
        $records = array();
        foreach($user_records as $record){
            if($record->user->id == $user){
                $records[] = $record;
            }
        }
        return view('records.index', ['records'=>$records, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $record = Records::findOrFail($id);
        $medicines = Medicines::all();
        return view('records.create', ['medicines' => $medicines, 'record' => $record]);
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
        $medicines = Medicines::all();
        return view('records.edit', ['medicines' => $medicines, 'record' => $record]);

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

        return redirect('/records')->with('mensaje', 'Historia actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Records::destroy($id);
        return redirect('/records')->with('mensaje', 'Historia eliminada satisfactoriamente');
    }

    public function postular($id){
        Auth::user()->record()->attach($id);
        return redirect('/records')->with('mensaje', 'Postulado satisfactoriamente');
    }

    /**
     * @return string
     */
    public function medicines ()
    {
        $record = Records::findOrFail($id);
        $medicine = Medicines::all();
        return view('records.edit', ['medicine' => $medicine, 'record' => $record]);
    }
}
