<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("role.index", [
            "data" => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("role.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
        ]);

        $data["user_id"] = Auth::id();
        Role::create($data);
        return redirect(route("role.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view("role.show", [
            "role" => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view("role.edit", [
            "role" => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
        ]);
        $data["user_id"] = Auth::id();

        $role->update($data);
        return redirect(route("role.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route("role.index"));
    }
}
