@extends('partials.main')
    @section('content')

    <div class="page-wrapper">
			
        <!-- Page Content -->
        <div class="content container-fluid">
        
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Users</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if(session()->has('status'))
                        <div class="alert alert-{{ session()->get('status') }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x </button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable" id="user-log-table">
                            <thead>
                                <tr>
                                    <td> S/n</td>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- <th>Role</th> --}}
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee )

                                <tr>
                                    <td> {{$employee->id}}</td>
                                    <td> {{$employee->username}}</td>
                                    <td> {{ $employee->firstname }}</td>
                                    <td> {{ $employee->lastname }}</td>
                                    <td> {{ $employee->email }}</td>
                                    <td> {{ $employee->phone }}</td>

                                    {{-- @if(is_null($userRole)) 
                                        <td> </td>
                                    @else
                                        <td class="text-left"><span
                                            class="{{$userRole->role->name == 'admin' ? 'badge bg-inverse-danger' :  ( $userRole->role->name  == 'employee' ? 'badge bg-inverse-success' : 'badge bg-inverse-info')}}" > {{optional($userRole)->role->name }} </span>
                                        </td>
                                    @endif --}}

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit-user-button" href="#" data-toggle="modal" data-target="#edit_user_{{$employee->id}}" id="editUser"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="{{URL('employee/'.$employee->id)}}"  id="viewUser"><i class="fa fa-pencil m-r-5"></i> View</a>
                                            </div>
                                        </div>
                                    </td>

                                    
                                </tr>
                                    <div id="edit_user_{{$employee->id}}" class="modal custom-modal fade" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('employee.update') }}" method="POST">
                                                        @csrf
                                                    {{-- <form employee.update> --}}
                                                        <div class="row">
                                                                <input type="hidden" value="{{$employee->GenEntityID}}" name="GenEntityID" />

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>First Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control" name="firstname" value="{{  $employee->firstname }}" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input class="form-control" name="lastname" value="{{  $employee->lastname }}" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Username <span class="text-danger">*</span></label>
                                                                    <input class="form-control" name="username" value="{{  $employee->username }}" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email <span class="text-danger">*</span></label>
                                                                    <input class="form-control" name="email" value="{{  $employee->email }}" type="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Phone </label>
                                                                    <input class="form-control" name="phone" value="{{  $employee->phone }}" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select  name="role_id" id="role_id" required class="select1">
                                                                        <option></option>
                                                                        @foreach($roles as $role)
                                                                            <option value={{ $role->id }}>{{\Str::ucfirst($role->name) }}</option>
                                                                        @endforeach
                                                                    </select> 
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    @php $fetchRole = $userRole ? optional($userRole)->role->name : '' @endphp
                                                                    <label>Assign Supervisor</label>
                                                                    <select  name="supervisor_id" id="supervisor_id" required class="select2">
                                                                        <option></option>
                                                                        @if($fetchRole === 'supervisor')
                                                                            @foreach($supervisors as $supervisor)
                                                                                @php
                                                                                    $getUser = \App\Models\User::entity($supervisor->GenEntityID);
                                                                                @endphp

                                                                                <option value={{ $supervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                            @endforeach
                                                                         @elseif($fetchRole === 'admin')
                                                                            @foreach($adminSupervisors as $adminSupervisor)
                                                                                @php
                                                                                    $getUser = \App\Models\User::entity($adminSupervisor->GenEntityID);
                                                                                @endphp

                                                                                <option value={{ $adminSupervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                            @endforeach
                                                                        @elseif($fetchRole === 'employee')
                                                                            @foreach($userSupervisors as $userSupervisor)
                                                                                @php
                                                                                    $getUser = \App\Models\User::entity($userSupervisor->GenEntityID);
                                                                                @endphp

                                                                                <option value={{ $userSupervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            @foreach ($allSupervisor as $supervisor)
                                                                                @php
                                                                                    $getUser = \App\Models\User::entity($supervisor->GenEntityID);
                                                                                @endphp
                                                                                <option value={{ $supervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                     </select> 
                                                                </div>
                                                            </div> --}}

                                                            {{-- <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="temp_supervisor" class="temp_supervisor" id= "temp_supervisor" value="1" onchange="valueChanged()" /> Assign Temporary Supervisor  <br>
                                                                <br>
                                                                
                                                                <div class="show_supervisor"  style="display:none;">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <label>Supervisors</label>
                                                                            <select id="secondary_supervisor_id"  name="secondary_supervisor_id"  class="select">
                                                                                <option></option>
                                                                                @if($fetchRole === 'supervisor')
                                                                                    @foreach($supervisors as $supervisor)
                                                                                        @php
                                                                                            $getUser = \App\Models\User::entity($supervisor->GenEntityID);
                                                                                        @endphp

                                                                                        <option value={{ $supervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                                    @endforeach
                                                                                    @elseif($fetchRole === 'admin')
                                                                                        @foreach($adminSupervisors as $adminSupervisor)
                                                                                            @php
                                                                                                $getUser = \App\Models\User::entity($adminSupervisor->GenEntityID);
                                                                                            @endphp
                                                                                            <option value={{ $adminSupervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                                        @endforeach
                                                                                    @elseif($fetchRole === 'employee')
                                                                                        @foreach($userSupervisors as $userSupervisor)
                                                                                            @php
                                                                                                $getUser = \App\Models\User::entity($userSupervisor->GenEntityID);
                                                                                            @endphp

                                                                                            <option value={{ $userSupervisor->GenEntityID }}>{{optional($getUser)->DisplayName }}</option>
                                                                                        @endforeach
                                                                                    @endif
                                                                            </select> 
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label>From <span class="text-danger">*</span></label>
                                                                            <div class="cal-icon">
                                                                                <input class="form-control datetimepicker" name="date_from" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-sm-6">
                                                                            <label>To <span class="text-danger">*</span></label>
                                                                            <div class="cal-icon">
                                                                                <input class="form-control datetimepicker" name="date_to" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        
                                                        <div class="submit-section">
                                                            <button class="btn btn-primary submit-btn">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- @if($export == 'false' || $export == '')
                            {{
                                $employees->appends([
                                    'export' => $export,
                                    // 'status' => $status_filter,
                                    // 'start_date' => $dateStart,
                                    // 'end_date' => $dateEnd,
                                ])->links()
                            }}
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
       
        <!-- Delete User Modal -->
        <div class="modal custom-modal fade" id="delete_user" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete User</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection  
    @section('scripts')
        <script type="text/javascript">
            function valueChanged()
            {
                if($('.temp_supervisor').is(":checked"))   
                    $(".show_supervisor").show();
                else
                    $(".show_supervisor").hide();
            }
            $(document).ready( function() {
                $('#user-log-table').DataTable({
                    dom: 'Bfrtip',
                    paging: true,
                    searching: true,
                    ordering: false,
                    // stateSave: true,
                    // bDestroy: true,
                    colReorder: {
                        enable: false
                    },
                    buttons: [
                        {
                            extend: 'pdfHtml5',
                        },
                        ,{
                            extend: 'excelHtml5',
                        }, 
                        {
                            extend: 'csv',
                        },
                        'copyHtml5',
                        'print',
                    ]
                });
    } );
        </script>
    @endsection