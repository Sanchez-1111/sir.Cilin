<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SalesController extends Controller
{
    // Get all sales with related user and vehicle info
    public function getSales()
    {
        // Load relations user and vehicle (adjust if you have payment model or not)
        $sales = Sale::with(['user', 'vehicle'])->get();

        return response()->json(['sales' => $sales]);
    }

    // Add a new sale
    public function addSales(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'status' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'payment' => ['required', 'string', 'max:255'],
            'sale_date' => ['required', 'date'],
            'image' => ['nullable', 'string', 'max:255'],  // If storing image path or url
        ]);

        $sale = Sale::create($request->only([
            'user_id',
            'vehicle_id',
            'status',
            'price',
            'payment',
            'sale_date',
            'image',
        ]));

        return response()->json(['message' => 'Sale added successfully', 'sale' => $sale]);
    }

    // Edit existing sale
    public function editSales(Request $request, $id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'status' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'payment' => ['required', 'string', 'max:255'],
            'sale_date' => ['required', 'date'],
        ]);

        $sale->update($request->only([
            'user_id',
            'vehicle_id',
            'status',
            'price',
            'payment',
            'sale_date',
        ]));

        return response()->json(['message' => 'Sale updated successfully', 'sale' => $sale]);
    }

    // Delete a sale
    public function deleteSales($id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['message' => 'Sale not found'], 404);
        }

        $sale->delete();

        return response()->json(['message' => 'Sale deleted successfully']);
    }
}
