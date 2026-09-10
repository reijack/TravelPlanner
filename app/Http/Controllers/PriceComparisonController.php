<?php

namespace App\Http\Controllers;

use App\Models\PriceComparison;
use App\Models\Trip;
use Illuminate\Http\Request;

class PriceComparisonController extends Controller
{
    public function store(Request $request, Trip $trip)
    {
        $request->validate([
            'category'    => 'required|in:hotel,transportasi',
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'price'       => 'required|integer|min:0',
            'link'        => 'nullable|url|max:255',
            'notes'       => 'nullable|string|max:150',
        ]);

        $trip->priceComparisons()->create([
            'category'    => $request->category,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'link'        => $request->link,
            'notes'       => $request->notes,
        ]);

        return back()->with('success', 'Opsi perbandingan harga berhasil ditambahkan!');
    }

    public function update(Request $request, PriceComparison $priceComparison)
    {
        $request->validate([
            'category'    => 'required|in:hotel,transportasi',
            'name'        => 'required|string|max:100',
            'description' => 'nullable|string|max:100',
            'price'       => 'required|integer|min:0',
            'link'        => 'nullable|url|max:255',
            'notes'       => 'nullable|string|max:150',
        ]);

        $priceComparison->update([
            'category'    => $request->category,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'link'        => $request->link,
            'notes'       => $request->notes,
        ]);

        return back()->with('success', 'Opsi perbandingan harga berhasil diupdate!');
    }

    public function destroy(PriceComparison $priceComparison)
    {
        $priceComparison->delete();

        return back()->with('success', 'Opsi dihapus.');
    }
}
