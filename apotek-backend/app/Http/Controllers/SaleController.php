<?php

namespace App\Http\Controllers;

use App\Models\Sale as ModelsSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    //
    public function index()
    {
        $data = DB::table("sales")->join("drugs", "sales.drug_id", "drugs.id")->select("sales.*", "drugs.name as dname")->get();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $create = ModelsSale::create([
            'nota_num' => $request->nota_num,
            'drug_id' => $request->drug_id,
            'qty' => $request->qty,
            'date' => $request->date,
            'total' => $request->total,
        ]);

        if ($create) {
            return response()->json([
                'message' => 'data created successfully',
                'data' => $create
            ], 201);
        }
    }
}
