<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("message.index", [
            "messages" => Message::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("message.create", [
            "users" => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "message" => ['required', 'min:2'],
            "receiver_id" => ['required', 'exists:users,id'],
            "sender_id" => ['required', 'exists:users,id'],

        ]);
        Message::create($data);
        return redirect(route("messages.index"));
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
            "users" => User::all(),
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
            "sender_id" => ['required', 'exists:users,id'],
            "receiver_id" => ['required', 'exists:users,id'],
        ]);

        $message->update($data);
        return redirect(route("messages.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route("messages.index"));
    }
}
