<?php

namespace App\Http\Controllers;

use App\Models\Purchase as ModelsPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    //
    public function index()
    {
        $data = DB::table("purchases")->join("drugs", "purchases.drug_id", "drugs.id")->join("suppliers", "purchases.supplier_id", "suppliers.id")->select("purchases.*", "drugs.name as dname", "suppliers.name as sname")->get();

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $create = ModelsPurchase::create([
            'invoice_num' => $request->invoice_num,
            'supplier_id' => $request->supplier_id,
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
