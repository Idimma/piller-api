<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Validator;

class MaterialController extends Controller
{
    public function create(Request $request){
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required'
        ]);

        Material::create($request->all());
        return back()->with('success', 'Successfully added ');


    }
}
