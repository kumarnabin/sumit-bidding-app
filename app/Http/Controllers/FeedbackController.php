<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
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
            "data" => Feedback::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("feedback.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => ['required', 'exists:items,id'],
            'comment' => ['required', 'min:0'],
        ]);

        $data["user_id"] = Auth::id();
        Feedback::create($data);
        return redirect(route("feedback.index"));
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
            "feedback" => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $data = $request->validate([
            'item_id' => ['required', 'exists:items,id'],
            'comment' => ['required', 'min:0'],
        ]);
        $data["user_id"] = Auth::id();

        $feedback->update($data);
        return redirect(route("feedback.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect(route("feedback.index"));
    }
}
