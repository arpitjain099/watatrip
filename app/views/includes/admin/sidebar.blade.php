<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <!-- <img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->

        </div>
        <div class="pull-left info">
            <p>Hello, {{ Session::get('airline_name') }}</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="treeview">
            <a href="{{{ URL::to('/airlines') }}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <!--<li>
            <a href="{{{ URL::to('/airlines/add-flights') }}}">
                <i class="fa fa-th"></i> <span>Add Flights</span> 
            </a>
        </li>-->

        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Flights</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{{ URL::to('/airlines/add-flights') }}}"><i class="fa fa-circle-o"></i> Add Flights</a></li>
                <li><a href="{{{ URL::to('/airlines/list-flights') }}}"><i class="fa fa-circle-o"></i> List Flights</a></li>

            </ul>
        </li>
        
        <li>
            <a href="{{{ URL::to('/airlines/browse') }}}">
                <i class="fa fa-laptop"></i>
                <span>Approve Bookings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>

        </li>
        <li>
            <a href="{{{ URL::to('/airlines/search') }}}">
                <i class="fa fa-edit"></i> <span>Search Bookings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Account</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
        </li>
        
        <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Pricing</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="/setting"><i class="fa fa-circle-o"></i> Global Setting</a></li>
                <li><a href="/setting/flight-setting"><i class="fa fa-circle-o"></i> Flight Setting</a></li>

            </ul>
        </li>
        
    </ul>
</section>
