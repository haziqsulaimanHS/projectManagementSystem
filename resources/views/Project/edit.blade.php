@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{route('project.update',$project)}}">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-header">Update Project Information</div>
                <div class="card-body">
                    <div class="form-group  row mb-3">
                        <label for="code" class="col-sm-2 col-form-label">System Owner</label>
                        <div class="col-sm-10">

                            <input type="text" name="systemOwner" class="form-control" id="systemOwner">
                            @error('systemOwner')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">System PIC</label>
                        <div class="col-sm-10">
                            <input type="text" name="systemPIC" class="form-control" id="systemPIC">
                            @error('systemPIC')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="credit" class="col-sm-2 col-form-label">Project Duration</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectDuration" class="form-control" id="projectDuration">
                            @error('projectDuration')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="credit" class="col-sm-2 col-form-label">Project Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectStatus" class="form-control" id="projectStatus">
                            @error('projectStatus')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="credit" class="col-sm-2 col-form-label">Project Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="projectStartDate" class="form-control" id="projectStartDate">
                            @error('projectStartDate')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  row mb-3">
                        <label for="credit" class="col-sm-2 col-form-label">Project End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="projectEndDate" class="form-control" id="projectEndDate">
                            @error('projectEndDate')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="developmentMethodology" class="col-sm-2 col-form-label">Development Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="developmentMethodology" class="form-control" id="developmentMethodology">
                            @error('developmentMethodology')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="systemPlatform" class="col-sm-2 col-form-label">System Platform</label>
                        <div class="col-sm-10">
                            <input type="text" name="systemPlatform" class="form-control" id="systemPlatform">
                            @error('systemPlatform')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="projectDeploymentType" class="col-sm-2 col-form-label">Project Deployment Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="projectDeploymentType" class="form-control" id="projectDeploymentType">
                            @error('projectDeploymentType')
                            <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%;color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-warning " href="{{route('project.index')}}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
