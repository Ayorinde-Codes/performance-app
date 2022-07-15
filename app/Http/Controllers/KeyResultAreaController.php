<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeyResultArea;

class KeyResultAreaController extends Controller
{
    /**
     * get all key result areas
     *
     * @return response()
     */
    public function index()
    {
        $keyResultAreas = KeyResultArea::all();

        return view('keyResultArea', compact('keyResultAreas'));
    }

    /**
     * create business unit
     *
     * @return response()
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|min:6|unique:key_result_areas',
            'objective'  =>  'required|string',
            'weight'  =>  'required|integer',
        ]);

        $keyResultArea = [
            'name' => $request->name,
            'objective' => $request->objective,
            'weight' => $request->weight,
        ];

        $createKeyResultArea = KeyResultArea::create($keyResultArea);

        if ($createKeyResultArea) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Successfully created key result area'
            ]);
        }

        return redirect()->back()->with([
            'status' => 'danger',
            'message' => 'key result area not created'
        ]);
    }

    public function update(Request $request)
    {
        $keyResultArea = KeyResultArea::where('id', $request->key_result_area_id)->first();

        if (is_null($keyResultArea)) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'key result area not found'
            ]);
        }

        $data = array_filter($request->only('name', 'objective', 'weight'));

        $keyResultArea->update($data);

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Successfully updated result area'
        ]);
    }
}
