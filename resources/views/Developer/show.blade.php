@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><h1>Developer Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Staff ID</td>
                        <td>{{$developer->staffID}}</td>
                    </tr>
                    <tr>
                        <td>Staff Name</td>
                        <td>{{$developer->name}}</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>{{$developer->department}}</td>
                    </tr>
                    <tr>
                        <td>Project(s) Assigned</td>
                        <td>

                            <table class="table table-bordered">
                                @php($i=1)
                                <tr><th>No.</th><th>Project Name</th><th>Project Start Date</th><th>Project Status</th></tr>
                                @foreach($developer->projects as $d)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->projectStartDate}}</td>
                                        <td>{{$d->projectStatus}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        @if(auth()->user()->user_level == 0)
                        <td>Assign new Project </td>
                        <td>
                            <form method="post" action="{{route('addToProject',$developer)}}">
                                @csrf
                                <select name="project_id" class="form-select mb-3" multiple>
                                    @foreach($projects as $d)
                                        <option value="{{$d->id}}">{{$d->name}} </option>
                                    @endforeach
                                </select>
                                <input type="submit" value="Add Project" class="btn btn-warning"/>
                                <a class="btn btn-danger" href="{{route('dropProject',$developer)}}">Drop All</a>
                            </form>

                        </td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning " href="{{route('developer.index')}}">Back</a>
            @if(auth()->user()->user_level == 0)
            <a class="btn btn-primary" href="{{route('developer.edit',$developer->id)}}">Edit Details</a>
            @endif
        </div>

    </div>
@endsection
