<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/lib/img/avatar.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="{{ request()->is('sites/*/edit') ? 'active' : '' }}"><a href="javascript:;"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li> -->
            
            <!-- <li class="treeview">
                <a href="#"><i class="fa fa-star"></i><span>Stories</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/stories/member" class="stories"><i class="fa fa-group"></i> by Member</a></li>
                    <li><a href="/stories/add/2" class="stories-admin"><i class="fa fa-plus"></i> Create Story</a></li>
                    <li><a href="/stories/list" class="stories-list"><i class="fa fa-list"></i> List Story</a></li>
                </ul>
            </li> -->
            <!-- <li class="{{ request()->is('banner/*') ? 'active' : '' }}"><a href="/banner/list"><i class="fa fa-star"></i><span>Banner</span></a></li> -->
            
            
            <li class="{{ request()->is('event/*') ? 'active' : '' }}"><a href="/event/list"><i class="fa fa-star"></i><span>Log Event</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>