<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::all();
        return view('developer.index',compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('developer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Student::create($request->all());

        // include validation
        $validated = $request->validate([
            'name' =>'required|min:4|string|max:255',
            'staffID'=>'required|min:4|string|max:255',
            'department' => 'required|min:4|string|max:255',
        ]);

        $developer = new Developer;
        $developer->name = $request->name;
        $developer->staffID = $request->staffID;
        $developer->department = $request->department;
        $developer->save();

        return redirect()->route('developer.index')
            ->withSuccess('New developer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        $projects = Project::all();
        return view('developer.show',compact('developer', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        return view('developer.edit',compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        //return $request;
        // method 1 - take all fields
        //$student->update($request->all());

        // method 2 - do some checking
        $validated = $request->validate([
            'name' =>'required|min:4|string|max:255',
            'staffID'=>'required|min:4|string|max:255',
            'department' => 'required|min:4|string|max:255',
        ]);

        $developer->update($request->all());

        return redirect()->route('developer.index')
            ->withSuccess('Developer record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {

        $developer->delete();
        return redirect()->route('developer.index');
    }

    public function addToProject(Request $request, Developer $developer){
        $developer->projects()->attach($request->project_id);
        return redirect('/developer/'.$developer->id);
    }

    public function dropProject(Request $request, Developer $developer) {
        $developer->projects()->sync([2,3]);
        return redirect('/developer/'.$developer->id);
    }
}
