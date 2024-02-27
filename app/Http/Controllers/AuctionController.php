<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auction.index", [
            "auctions" => Auction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auction.create", [
            "items" => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => ['required', 'exists:items,id'], // Assuming "items" is the table name
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $data["user_id"] = Auth::id();
        Auction::create($data);
        return redirect(route("auctions.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Auction $auction)
    {
        return view("auction.show", [
            "auction" => $auction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auction $auction)
    {
        return view("auction.edit", [
            "items" => Item::all(),
            "auction" => $auction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auction $auction)
    {
        $data = $request->validate([
            'item_id' => ['required', 'exists:items,id'], // Assuming "items" is the table name
            'price' => ['required', 'numeric', 'min:0'],
        ]);
        $data["user_id"] = Auth::id();

        $auction->update($data);
        return redirect(route("auctions.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();
        return redirect(route("auctions.index"));
    }
}
