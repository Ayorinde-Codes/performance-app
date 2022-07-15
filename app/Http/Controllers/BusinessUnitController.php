<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;

class BusinessUnitController extends Controller
{
    /**
     * get all business units
     *
     * @return response()
     */
    public function index()
    {
        $businessUnits = BusinessUnit::all();

        return view('businessUnits', compact('businessUnits'));
    }

    /**
     * create business unit
     *
     * @return response()
     */
    public function create(Request $request)
    {
        $businessUnit = [
            'name' => $request->name,
        ];

        $createBusinessUnit = BusinessUnit::create($businessUnit);

        if ($createBusinessUnit) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Successfully created business unit'
            ]);
        }

        return redirect()->back()->with([
            'status' => 'danger',
            'message' => 'business unit not created'
        ]);
    }

    public function update(Request $request)
    {
        $businessUnit = BusinessUnit::where('id', $request->business_unit_id)->first();

        if (is_null($businessUnit)) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'business unit not found'
            ]);
        }

        $businessUnit->name = $request->name;
        $businessUnit->save();

        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Successfully updated business unit'
        ]);
    }
}
