

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li>
                    <a href={{URL('/dashboard')}}><i class="la la-dashboard"></i> <span> Dashboard</span> </a>
                </li>


                {{-- @if (Auth()->user()->role() == 'admin') --}}
                    
                    <li> 
                        <a href="{{ URL('businessUnit') }}"><i class="la la-rocket"></i> <span>Business Units</span></a>
                    </li>  
                    <li> 
                        <a href="{{ URL('keyResultArea') }}"><i class="la la-user"></i> <span>Key Result Area</span></a>
                    </li>
                    <li> 
                        <a href="{{ URL('employee') }}"><i class="la la-user"></i> <span>Employees</span></a>
                    </li>  
                    
                {{-- @endif --}}

                {{-- @if (Auth()->user()->role() == 'admin' || Auth()->user()->role() == 'supervisor') --}}
                    {{-- <li> 
                        <a href="{{ URL('view/leave') }}"><i class="la la-user-times"></i> <span> Authorize Leave</span></a>
                    </li> --}}
                {{-- @endif --}}
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->