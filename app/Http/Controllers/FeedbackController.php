<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("feedback.index", [
            "feedbacks" => Feedback::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("feedback.create", [
            "users" => User::all(),
            "items" => Item::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'item_id' => ['required', 'exists:items,id'],
            'rating' => ['required', 'min:1'],
            'comment' => ['nullable', 'min:0'],
        ]);

//        $data["user_id"] = Auth::id();
        Feedback::create($data);
        return redirect(route("feedbacks.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return view("feedback.show", [
            "feedback" => $feedback
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view("feedback.edit", [
            "feedback" => $feedback,
            "users" => User::all(),
            "items" => Item::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $data = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'item_id' => ['required', 'exists:items,id'],
            'rating' => ['required', 'min:1'],
            'comment' => ['nullable', 'min:0'],
        ]);
        $data["user_id"] = Auth::id();

        $feedback->update($data);
        return redirect(route("feedbacks.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect(route("feedbacks.index"));
    }
}
