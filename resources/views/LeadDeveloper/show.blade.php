@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Lead Developer Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Staff ID</td>
                        <td>{{$leadDeveloper->staffID}}</td>
                    </tr>
                    <tr>
                        <td>Staff Name</td>
                        <td>{{$leadDeveloper->name}}</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>{{$leadDeveloper->department}}</td>
                    </tr>
                    <tr>
                        <td>Projects Registered</td>
                        <td>

                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>System Owner</th><th>System PIC</th><th>Project Duration</th></tr>
                                @foreach($leadDeveloper->projects as $l)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$l->systemOwner}}</td>
                                        <td>{{$l->systemPIC}}</td>
                                        <td>{{$l->projectDuration}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Assign to Lead Project </td>
                        <td>
                            <form method="post" action="{{route('addToProject',$leadDeveloper)}}">
                                @csrf
                                <select name="project_id" class="form-select mb-3" multiple>
                                    @foreach($projects as $l)
                                        <option value="{{$l->id}}">{{$l->name}} {{$l->projectStartDate}}{{$l->projectStatus}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Add Project" class="btn btn-warning"/>
                                <a class="btn btn-danger" href="{{route('dropProject',$leadDeveloper)}}">Drop All</a>
                            </form>

                        </td>
                    </tr>

                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('leadDeveloper.index')}}">Back</a>
            <a class="btn btn-primary" href="{{route('leadDeveloper.edit',$leadDeveloper->id)}}">Edit Details</a>
        </div>

    </div>
@endsection
