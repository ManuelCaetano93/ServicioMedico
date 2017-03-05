<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialization;
use App\User;

class SpecializationsUserController extends Controller
{

    // Post for the specialization creation relevant to the pivot table.

    public function associatespecialization(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->specializations()->detach(Specialization::all());
        $specialization = $request->input('specializations');
        $user->specializations()->attach($specialization);
        return redirect('/users')->with('mensaje', 'Especializacion asignada satisfactoriamente');
    }
}
