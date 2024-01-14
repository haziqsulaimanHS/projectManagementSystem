@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">
                {{ session('success') }}
            </h6>
        @endif
        <div class="card-header">
            <h1>List of Developers</h1>
        </div>
        <div class="card-body">
            @if(auth()->user()->user_level == 0)
            <a class="btn btn-primary float-end" href="{{route('developer.create')}}">Add New</a>
            @endif
            <table class="table">
                <thead>
                <tr><th>No.</th><th>Name</th><th>Staff ID</th><th>Department</th></tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($developers as $d)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->staffID}}</td>
                        <td>{{$d->department}}</td>
                        <td>
                            <form action="{{route('developer.destroy',$d)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{route('developer.show',$d->id)}}">Details</a>
                                @if(auth()->user()->user_level == 0)
                                <a class="btn btn-warning" href="{{route('developer.edit',$d->id)}}">Edit</a>
                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
