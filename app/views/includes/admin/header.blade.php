
<!-- Logo -->
<a href="/airlines" class="logo" ><!--<i class="ion ion-paper-airplane"></i>&nbsp;&nbsp; 
    WATaTRIP--><img src="/admin/img/logo_white.png" width="200">
</a>               

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 2 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="/admin/img/avatar5.png" class="img-circle" alt="User Image"/>
                                    </div>
                                    <h4>
                                        WATaTRIP Support
                                        <small><i class="fa fa-clock-o"></i> 10 hours</small>
                                    </h4>
                                    <p>New user AirIndia4 added</p>
                                </a>
                            </li><!-- end message -->
                            <li>
                                <a href="#">
                                    <div class="pull-left">
                                        <img src="/admin/img/avatar5.png" class="img-circle" alt="user image"/>
                                    </div>
                                    <h4>
                                        WATaTRIP Support
                                        <small><i class="fa fa-clock-o"></i> 12 hours</small>
                                    </h4>
                                    <p> New user AirIndia3 added </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-warning"></i>
                    <span class="label label-warning">3</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 3 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="ion ion-ios7-people info"></i> Jan 1 - 5 Revenues credited
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-warning danger"></i> Delhi - Mumbai most active sector today
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-users warning"></i> AirIndia2 approved 9 bookings for 8 Jan 
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-tasks"></i>
                    <span class="label label-danger">2</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 2 tasks</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Approve flights for 26-Dec 2014
                                        <small class="pull-right">20%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li><!-- end task item -->
                            <li><!-- Task item -->
                                <a href="#">
                                    <h3>
                                        Approve flights for 25-Dec 2014
                                        <small class="pull-right">40%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li><!-- end task item -->

                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">View all tasks</a>
                    </li>
                </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ion ion-plane"></i>
                    <span>{{ Session::get('airline_name') }} <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header bg-light-blue">
                        <!-- <img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->
                        <i class="ion ion-plane"></i>
                        <p>
                            {{ Session::get('airline_name') }}
                            <small>Member since Nov. 2014 </small>
                        </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="/airlines/logout" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
