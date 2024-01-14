@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Lead Developers</h1>
        </div>
        <div class="card-body">
            <a class="btn btn-primary float-end" href="{{route('leadDeveloper.create')}}">Add New</a>
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Name</th><th>Staff ID</th><th>Department</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($leadDevelopers as $l)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$l->name}}</td>
                        <td>{{$l->staffID}}</td>
                        <td>{{$l->department}}</td>
                        <td>
                            <form action="{{route('leadDeveloper.destroy',$l)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('leadDeveloper.show',$l->id)}}">Details</a>
                                <a class="btn btn-warning" href="{{route('leadDeveloper.edit',$l->id)}}">Edit</a>
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
