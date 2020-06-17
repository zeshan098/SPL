<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("bower_components/admin-lte/dist/img/user-512-160x160.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} / PM</p>
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
            <!-- Optionally, you can add icons to the links -->
<!--            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Users Management</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->
            <!-- <li class="{{ ($controller_name == "FmController" && $action_name == "index") ? 'active' : '' }}">
                <a href="{{ url('fm/unapproved_list') }}"><i class="fa fa-group"></i> <span>Pending Cases</span>
                    
                </a>
            </li> -->
            <li class="{{ $controller_name == "PmController" && $action_name == "case_lists" ? 'active' : '' }}">
                <a href="{{ url('pm/case_lists') }}"><i class="fa fa-group"></i> <span>Assigned Cases</span>
                    
                </a>
                <a href="{{ url('pm/approved_case_lists') }}"><i class="fa fa-group"></i> <span>Approved Cases</span></a>
                <a href="{{ url('pm/reject_case_lists') }}"><i class="fa fa-group"></i> <span>Rejected / Returned Cases</span></a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>