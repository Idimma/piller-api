<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Validator;

class MaterialController extends Controller
{
    public function create(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required'
        ]);

        if ($request->id) {
            $material = Material::find($request->id);
            $material->update($request->all());
            return back()->with('success', 'Successfully Updated ');
        }
        Material::create($request->all());
        return back()->with('success', 'Successfully added ');
    }

    public function update(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required'
        ]);
        $material = Material::find($request->id);
        $material->update($request->all());
        return back()->with('success', 'Successfully Updated');
    }

    public function search()
    {
        $materials = Material::where('name', 'LIKE', "%" . request()->search . "%")->get();
        return view('pages.admin.Materials', compact('materials'));
    }

    public function delete($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
