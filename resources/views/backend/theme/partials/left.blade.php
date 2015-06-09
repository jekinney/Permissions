<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User Management</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.user.all') }}"><i class="fa fa-circle-o"></i> User List</a></li>
                    <li><a href="{{ route('admin.group.all') }}"><i class="fa fa-circle-o"></i> Groups</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>