<?php

namespace App\Http\Controllers;

use App\Models\Supplier as ModelsSupplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //
    public function index()
    {
        $data = ModelsSupplier::get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $create = ModelsSupplier::create([
            'name' => $request->name,
            'hp' => $request->hp,
            'address' => $request->address
        ]);

        if ($create) {
            return response()->json([
                'message' => 'data created successfully',
                'data' => $create
            ], 201);
        }
    }
}
