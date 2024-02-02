<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tire;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with(['tire','user', 'tire.brand'])->get();
        return view('admin.inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userID = Auth::id();
        $tire = Tire::all();
        $categories = Category::all();
        $brand = Brand::all();
        return view('admin.inventories.create', 
        compact(
            'userID',
            'tire',
            'categories',
            'brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventoryRequest $request)
    {
        Inventory::create($request->validated());
        $tireID = $request->input('tire_id');
        $tireQuantity = $request->input('quantity');
        $tireUpdate = Tire::find($tireID);
        $tireUpdate->increment('quantity', $tireQuantity);
       return redirect()->route('admin.inventories.index')->with('success','Inventario almacenado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        $tireID = $inventory->tire_id;
    $tireUpdate = Tire::find($tireID);
    $tireQuantity = $inventory->quantity;
    if ($tireUpdate->quantity >= $tireQuantity) {
        $tireUpdate->decrement('quantity', $tireQuantity);
        $inventory->delete();
        return back()->with('success', 'Inventario eliminado correctamente!');
    } else {
        return back()->with('error', 'No se puede eliminar el inventario. La cantidad de producto no puede ser negativa.');
    }
    }
}
