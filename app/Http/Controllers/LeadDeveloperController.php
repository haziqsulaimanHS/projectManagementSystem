<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\LeadDeveloper;
use Illuminate\Http\Request;

class LeadDeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leadDevelopers = LeadDeveloper::all(); // select * from students
        return view('leadDeveloper.index',compact('leadDevelopers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leadDeveloper.create');
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

        $leadDeveloper = new LeadDeveloper;
        $leadDeveloper ->name = $request->name;
        $leadDeveloper ->staffID = $request->staffID;
        $leadDeveloper ->department = $request -> department;
        $leadDeveloper ->save();

        return redirect()->route('leadDeveloper.index')
            ->withSuccess('New LeadDeveloper added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(LeadDeveloper $leadDeveloper)
    {
        $projects = $leadDeveloper->projects;
        return view('leadDeveloper.show', compact('leadDeveloper', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeadDeveloper $leadDeveloper)
    {
        return view('leadDeveloper.edit',compact('leadDeveloper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeadDeveloper $leadDeveloper)
    {
        $validated = $request->validate([
            'name' =>'required|min:4|string|max:255',
            'staffID'=>'required|min:4|string|max:255',
            'department' => 'required|min:4|string|max:255',
        ]);

        $leadDeveloper = new LeadDeveloper;
        $leadDeveloper ->name = $request->name;
        $leadDeveloper ->staffID = $request->staffID;
        $leadDeveloper ->department = $request -> department;
        $leadDeveloper ->save();

        return redirect()->route('lecturer.index')
            ->withSuccess('LeadDeveloper record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeadDeveloper $leadDeveloper)
    {
        $leadDeveloper->delete();
        return redirect()->route('leadDeveloper.index');
    }

    public function addToProject(Request $request, LeadDeveloper $leadDeveloper){
        $leadDeveloper->projects()->attach($request->project_id);
        return redirect('/developer/'.$leadDeveloper->id);
    }

    public function dropProject(Request $request, LeadDeveloper $leadDeveloper) {
        $leadDeveloper->projects()->sync([2,3]);
        return redirect('/developer/'.$leadDeveloper->id);
    }
}
