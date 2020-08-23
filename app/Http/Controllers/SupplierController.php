<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Validator;

class SupplierController extends Controller
{
    public function create(Request $request){
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required'
        ]);

        Supplier::create($request->all());
        return back()->with('success', 'Successfully added ');


    }
}
