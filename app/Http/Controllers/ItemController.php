<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("item.index", [
            "items" => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("item.create", [
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ['required', 'min:2'],
            "category_id" => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            "description" => ['required', 'min:2'],
            "bidding_start" => ['required', 'date'],
            "bidding_end" => ['required', 'date']

        ]);

        $data["user_id"] = Auth::id();
        Item::create($data);
        return redirect(route("items.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view("item.show", [
            "item" => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view("item.edit", [
            "item" => $item,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            "name" => ['required', 'min:2'],
            "category_id" => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            "description" => ['required', 'min:2'],
            "bidding_start" => ['required', 'date'],
            "bidding_end" => ['required', 'date']
        ]);
        $data["user_id"] = Auth::id();

        $item->update($data);
        return redirect(route("items.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route("items.index"));
    }
}
