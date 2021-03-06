{{-- @extends('layout') --}}
@extends('partials.main')
  
@section('content')

<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    {{-- <h3 class="page-title">Welcome {{Auth()->user()->VIPUserName}}!</h3> --}}
                    <h3 class="page-title">Welcome user!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
    
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <div class="dash-widget-info">
                            {{-- <h3>{{$allProjects}}</h3> --}}
                            <span>Projects</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            {{-- <h3>{{$allEmployees}}</h3> --}}
                            <span>Employees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics Widget -->
        <div class="row">
            {{-- <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                <div class="card flex-fill dash-statistics">
                    <div class="card-body">
                        <h5 class="card-title">Statistics</h5>
                        <div class="stats-list">
                            <div class="stats-info">
                                <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="stats-info">
                                <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        <!-- /Statistics Widget -->
        
        <div class="row">
            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Employees</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee )
                                    <tr>
                                        <td> {{ optional($employee)->username }}</td>
                                        <td> {{ optional($employee)->email }}</td>
                                        {{-- @if(is_null($userRole)) 
                                            <td> </td>
                                        @else --}}
                                            <td class="text-left">
                                                role
                                                {{-- <span class="{{$userRole->role->name == 'admin' ? 'badge bg-inverse-danger' :  ( $userRole->role->name  == 'employee' ? 'badge bg-inverse-success' : 'badge bg-inverse-info')}}" > {{optional($userRole)->role->name }} </span> --}}
                                            </td>
                                        {{-- @endif --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL('/employees')}}">View all clients</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Recent Projects</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Project Name </th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <h2><a href="project-view.html">{{$project->name}}</a></h2>
                                        </td>
                                        <td>
                                            {{-- <i class="{{$project->status ? 'fa fa-dot-circle-o text-success' : 'fa fa-dot-circle-o text-danger'}} "></i> {{$project->status ? 'Active' : 'Inactive'}}  --}}
                                       </td>
                                        
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project_{{$project->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     <!-- Edit Project Modal -->
                                {{-- <div id="edit_project_{{$project->id}}" class="modal custom-modal fade" role="dialog"> --}}
                                    <div id="edit_project_" class="modal custom-modal fade" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Project</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Project Name</label>
                                                                <input class="form-control" value="" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="select">
                                                                    {{-- <option @if ($project->status== true ) selected="selected" @endif value="1">Active</option>
                                                                    <option @if ($project->status== false ) selected="selected"  @endif value="0">Inactive</option> --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="submit-section">
                                                        <button class="btn btn-primary submit-btn">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Edit Project Modal -->
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <a href="{{URL('/projects')}}">View all projects</a> --}}
                        <a href="#">View all projects</a>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <!-- /Page Content -->

</div>
{{-- @endif --}}
@endsection