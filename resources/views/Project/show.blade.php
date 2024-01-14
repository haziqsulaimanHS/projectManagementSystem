@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Project Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Project Name</td>
                        <td>{{$project->name}}</td>
                    </tr>
                    <tr>
                        <td>System Owner</td>
                        <td>{{$project->systemOwner}}</td>
                    </tr>
                    <tr>
                        <td>System PIC</td>
                        <td>{{$project->systemPIC}}</td>
                    </tr>
                    <tr>
                        <td>Project Duration</td>
                        <td>{{$project->projectDuration}}</td>
                    </tr>
                    <tr>
                        <td>Project Status</td>
                        <td>{{$project->projectStatus}}</td>
                    </tr>
                    <tr>
                        <td>Project Start Date</td>
                        <td>{{$project->projectStartDate}}</td>
                    </tr>
                    <tr>
                        <td>Project End Date</td>
                        <td>{{$project->projectEndDate}}</td>
                    </tr>
                    <tr>
                        <td>Development Methodology</td>
                        <td>{{$project->developmentMethodology}}</td>
                    </tr>
                    <tr>
                        <td>System Platform</td>
                        <td>{{$project->systemPlatform}}</td>
                    </tr>
                    <tr>
                        <td>Project Deployment Type</td>
                        <td>{{$project->projectDeploymentType}}</td>
                    </tr>
                    <tr>
                        <td>Project Lead</td>
                        <td>{{ $leadDeveloper->name ?? 'No Lead Developer'  }}</td>
                    </tr>
                    <tr>
                        <td>This Project Assigned to:</td>
                        <td>
                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Name</th><th>Staff ID</th><th>Department</th></tr>
                                @foreach($project->developers as $p)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->staffID}}</td>
                                        <td>{{$p->department}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('project.edit',$project->id)}}">Edit Details</a>
        </div>
@endsection
