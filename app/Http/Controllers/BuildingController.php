<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;
use Validator;

class BuildingController extends Controller
{
    public function create(Request $request)
    {
        Validator::validate($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);

        if ($request->id) {
            $material = Building::find($request->id);
            $material->update($request->all());
            return back()->with('success', 'Successfully Updated ');
        }
        Building::create($request->all());
        return back()->with('success', 'Successfully added ');
    }

    public function update(Request $request)
    {
        Validator::validate($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
        ]);
        $material = Building::find($request->id);
        $material->update($request->all());
        return back()->with('success', 'Successfully Updated');
    }

    public function search()
    {
        $builings = Building::where('title', 'LIKE', "%" . request()->search . "%")->get();
        return view('pages.admin.building', compact('builings'));
    }

    public function delete($id)
    {
        $material = Building::findOrFail($id);
        $material->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
