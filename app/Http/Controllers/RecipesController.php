<?php

namespace App\Http\Controllers;

use App\User;
use App\Recipe;
use App\Medicines;
use Illuminate\Http\Request;
use Validator;
use Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate();
        return view('recipes.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = User::all();
        $medicines = Medicines::all();
        return view('recipes.create', ['medicines' => $medicines, 'patients' => $patients]);
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
            'patient' => 'required',
            'description' => 'required|max:400',
            'medicines' => 'required|min:1|max:3',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput();
        }
        try{
            \DB::beginTransaction();

            $recipe = Recipe::create([
                'description' => $request->input('description'),
                'status' => 'Active',
            ]);
            foreach($request->input('medicines') as $medicine){
                $recipe->medicine()->attach($medicine);
            }
            $patient = User::findOrFail($request->input('patient'));
            $patient->recipesUser()->save($recipe);
            $doctor = Auth::user();
            $doctor->recipesDoctor()->save($recipe);


        }catch (\Exception $e){
            \DB::rollback();
        }finally{
            \DB::commit();
        }
        return redirect('/recipes')->with('mensaje', 'Recipe creado satisfactoriamente');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
