<?php

namespace App\Http\Controllers;

use App\Models\LeadDeveloper;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Gate::allows('isManager')) {
            $projects = Project::all(); // select * from students
            return view('project.index', compact('projects'));
        }
         else{
           abort(403);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //if(auth()->user()->can('create')){
            return view('project.create');
       // }
       // else
         //   abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validated = $request->validate([
            'systemOwner' =>'required|min:1|string|max:255',
            'systemPIC'=>'required|min:1|string|max:255',
            'projectStatus'=>'required|min:1|string|max:255',
            'projectDuration'=>'required|min:1|string|max:255',
            'projectStartDate'=>'required',
            'projectEndDate' => 'required',
                'developmentMethodology' => 'nullable|string|max:255',
                'systemPlatform' => 'nullable|string|max:255',
                'projectDeploymentType' => 'nullable|string|max:255',
        ]);
        $projectStartDate = date('Y - m - d', strtotime($request->projectStartDate));
        $projectEndDate = date('Y -m - d', strtotime($request->projectEndDate));
        $project = new Project;
        $project->name = $request->name;
        $project->systemOwner = $request->systemOwner;
        $project->systemPIC = $request->systemPIC;
        $project->projectStatus = $request->projectStatus;
        $project->projectDuration = $request->projectDuration;
        $project->projectStartDate = $request->projectStartDate;
        $project->projectEndDate = $request->projectEndDate;
        $project->developmentMethodology = $request->developmentMethodology;
        $project->systemPlatform = $request->systemPlatform;
        $project->projectDeploymentType = $request->projectDeploymentType;
        $project->save();

        return redirect()->route('project.index')
            ->withSuccess('New project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $leadDeveloper = LeadDeveloper::find($project->lead_developer_id);
        return view('project.show',compact('project','leadDeveloper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'systemOwner' =>'required|min:1|string|max:255',
            'systemPIC'=>'required|min:1|string|max:255',
            'projectStatus'=>'required|min:1|string|max:255',
            'projectDuration'=>'required|min:1|string|max:255',
            'projectStartDate'=>'required',
            'projectEndDate' => 'required',
            'developmentMethodology' => 'nullable|string|max:255',
            'systemPlatform' => 'nullable|string|max:255',
            'projectDeploymentType' => 'nullable|string|max:255',
        ]);
        $projectStartDate = date('Y - m - d', strtotime($request->projectStartDate));
        $projectEndDate = date('Y -m - d', strtotime($request->projectEndDate));
        $project = new Project;
        $project->name = $request->name;
        $project->systemOwner = $request->systemOwner;
        $project->systemPIC = $request->systemPIC;
        $project->projectStatus = $request->projectStatus;
        $project->projectDuration = $request->projectDuration;
        $project->projectStartDate = $request->projectStartDate;
        $project->projectEndDate = $request->projectEndDate;
        $project->developmentMethodology = $request->developmentMethodology;
        $project->systemPlatform = $request->systemPlatform;
        $project->projectDeploymentType = $request->projectDeploymentType;
        $project->save();

        return redirect()->route('project.index')
            ->withSuccess('Project record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
}
