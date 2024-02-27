<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("message.index", [
            "data" => Message::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("message.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "message" => ['required', 'min:2'],
            "receiver_id" => ['required', 'exists:users,id'],

        ]);

        $data["sender_id"] = Auth::id();
        Message::create($data);
        return redirect(route("message.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view("message.show", [
            "message" => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        return view("message.edit", [
            "message" => $message
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        $data = $request->validate([
            "message" => ['required', 'min:2'],
            "receiver_id" => ['required', 'exists:users,id'],
        ]);
        $data["sender_id"] = Auth::id();

        $message->update($data);
        return redirect(route("message.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route("message.index"));
    }
}
