<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("bower_components/admin-lte/dist/img/user-512-160x160.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }} / Admin</p>
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
            <li class="{{ $controller_name == "UserController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Users Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "add_user_view" ? 'active' : '' }}"><a href="{{ url('admin/add_user') }}">Add New</a></li>
                    <li class="{{ $action_name == "users" ? 'active' : '' }}"><a href="{{ url('admin/users') }}">Approved Users</a></li>
                    <li class="{{ $action_name == "pending_user" ? 'active' : '' }}"><a href="{{ url('admin/pending_user') }}">Pending User</a></li>
                    <li class="{{ $action_name == "add_escalation_detail" ? 'active' : '' }}"><a href="{{ url('admin/add_escalation_detail') }}">Add Escalation</a></li>
                    <li class="{{ $action_name == "escalation_list" ? 'active' : '' }}"><a href="{{ url('admin/escalation_list') }}">Escalation List</a></li>
                    <li class="{{ $action_name == "fm_zone_station_detail" ? 'active' : '' }}"><a href="{{ url('admin/fm_zone_station_detail') }}">Add Zone Detail</a></li>
                    <li class="{{ $action_name == "zone_station_list" ? 'active' : '' }}"><a href="{{ url('admin/zone_station_list') }}">Zone List</a></li>
                   
                    <!-- <li class="{{ $action_name == "approved_product_list" ? 'active' : '' }}"><a href="{{ url('admin/approved_product_list') }}">Approved Product Lists</a></li> -->
                    <!-- <li class="{{ $action_name == "product_list" ? 'active' : '' }}"><a href="{{ url('admin/product_list') }}">Unapproved Product Lists</a></li> -->
                </ul>
            </li>
            <li class="{{ $controller_name == "UserController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Assign Role</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "fm_escalation_record" ? 'active' : '' }}"><a href="{{ url('admin/fm_escalation_record') }}">FM attandance</a></li> 
                    <li class="{{ $action_name == "zm_escalation_record" ? 'active' : '' }}"><a href="{{ url('admin/zm_escalation_record') }}">ZM attandance</a></li>
                    <li class="{{ $action_name == "nsm_escalation_record" ? 'active' : '' }}"><a href="{{ url('admin/nsm_escalation_record') }}">NSM attandance</a></li>
                </ul>
            </li>
            <li class="{{ $controller_name == "ItemController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Item</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "add_item_post" ? 'active' : '' }}"><a href="{{ url('admin/add_item_post') }}">Add Item</a></li> 
                    <li class="{{ $action_name == "item_list" ? 'active' : '' }}"><a href="{{ url('admin/item_list') }}">Item List</a></li> 
                    <li class="{{ $action_name == "item_team_list" ? 'active' : '' }}"><a href="{{ url('admin/item_team_list') }}">Item Team Mapping</a></li> 
                    <li class="{{ $action_name == "add_station_detail" ? 'active' : '' }}"><a href="{{ url('admin/add_station_detail') }}">Add Station</a></li> 
                </ul>
            </li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>