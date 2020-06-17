<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("bower_components/admin-lte/dist/img/user-512-160x160.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} / ZM</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
             
            <li class="{{ $controller_name == "ZmController" && $action_name == "case_lists" ? 'active' : '' }}">
                <a href="{{ url('zm/case_lists') }}"><i class="fa fa-group"></i> <span>Assigned Cases</span></a>
                <a href="{{ url('zm/my_cases') }}"><i class="fa fa-group"></i> <span>Processed Cases</span></a>
                <a href="{{ url('zm/reject_case_lists') }}"><i class="fa fa-group"></i> <span>Rejected / Returned Cases</span> </a>
                <a href="{{ url('zm/zm_escalation_record') }}"><i class="fa fa-group"></i> <span>Absence</span></a>
                 
            </li>
            @if($fmccrsid != 0)
            <li class="{{ $controller_name == "ZmController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>FM Cases</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li class="{{ $action_name == "zm_case_lists" ? 'active' : '' }}">
                     <a href="{{ url('zm/create_case') }}">Create Case</a></li>
                </ul>
            </li>
            @else
                 
            @endif
            @if($nsmccrsid != 0)
            <li class="{{ $controller_name == "FmController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>NSM Cases</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                     <li class="{{ $action_name == "zm_case_lists" ? 'active' : '' }}">
                     <a href="{{ url('zm/nsm_case_lists') }}">Assigned Cases</a></li>
                </ul>
            </li>
            @else
                 
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>