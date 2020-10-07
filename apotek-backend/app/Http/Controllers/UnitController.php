<?php

namespace App\Http\Controllers;

use App\Models\Unit as ModelsUnit;
use Carbon\Traits\Units;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function index()
    {
        $data = ModelsUnit::get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $unit = new ModelsUnit;
        $unit->name = $request->name;
        $unit->save();

        return response()->json([
            'message' => 'data created successfully',
            'data' => $unit
        ]);
    }
}
