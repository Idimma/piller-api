<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Validator;

class SupplierController extends Controller
{

    public function create(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required',
            'city' => 'required', 'state' => 'required', 'country' => 'required', 'note' => 'sometimes',
        ]);

        if ($request->id) {
            $material = Supplier::find($request->id);
            $material->update($request->all());
            return back()->with('success', 'Successfully Updated ');
        }
        Supplier::create($request->all());
        return back()->with('success', 'Successfully Added ');
    }

    public function update(Request $request)
    {
        Validator::validate($request->all(), [
            'name' => 'required|string|max:255',
            'local' => 'required',
            'international' => 'required'
        ]);
        $material = Supplier::find($request->id);
        $material->update($request->all());
        return back()->with('success', 'Successfully Updated');
    }

    public function search()
    {
        $suppliers = Supplier::where('name', 'LIKE', "%" . request()->search . "%")->get();
        return view('pages.admin.suppliers', compact('suppliers'));
    }

    public function delete($id)
    {
        $material = Supplier::findOrFail($id);
        $material->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
