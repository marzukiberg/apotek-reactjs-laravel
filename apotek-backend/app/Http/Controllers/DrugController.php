<?php

namespace App\Http\Controllers;

use App\Models\Drug as ModelsDrug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    //
    public function index()
    {
        $data = ModelsDrug::all();
        return response()->json($data, 200);
    }

    public function show($id = null)
    {
        $cek = ModelsDrug::find($id);
        if ($cek == null || $id == null) {
            return response()->json(["message" => "bad request"], 400);
        }
        return response()->json($cek, 200);
    }

    public function store(Request $request)
    {
        $drug = ModelsDrug::create([
            'code' => $request->code,
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'purchases_price' => $request->purchases_price,
            'selling_price' => $request->selling_price
        ]);

        if ($drug) {
            return response()->json([
                'message' => 'data created successfully',
                'data' => $drug
            ], 201);
        }
    }

    public function last_row()
    {
        $drug = ModelsDrug::latest()->first();
        return response()->json($drug, 200);
    }
}
