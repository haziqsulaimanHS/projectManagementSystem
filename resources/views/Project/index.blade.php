@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Projects</h1>
        </div>
        <div class="card-body">
            <a class="btn btn-primary float-end" href="{{route('project.create')}}">Add New</a>
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Project Name</th><th>Project Start Date</th><th>Project Status</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($projects as $d)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->projectStartDate}}</td>
                        <td>{{$d->projectStatus}}</td>
                        <td>
                            <form action="{{route('project.destroy',$d)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('project.show',$d->id)}}">Details</a>
                                <a class="btn btn-warning" href="{{route('project.edit',$d->id)}}">Edit</a>
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
