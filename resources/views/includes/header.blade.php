<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body>

<!-- ##### SIDEBAR LOGO ##### -->
<div class="kt-sideleft-header">
    <div class="kt-logo"><a href="index.html">katniss</a></div>
    <div id="ktDate" class="kt-date-today"></div>
    <div class="input-group kt-input-search">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn mg-0">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span>
    </div><!-- input-group -->
</div><!-- kt-sideleft-header -->

<!-- ##### SIDEBAR MENU ##### -->
<div class="kt-sideleft">
    <label class="kt-sidebar-label">Navigation</label>
    <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
            <a href="index.html" class="nav-link active">
                <i class="icon ion-ios-home-outline"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-gear-outline"></i>
                <span>Forms</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
                <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
                <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
                <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
                <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-filing-outline"></i>
                <span>UI Elements</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="accordion.html" class="nav-link">Accordion</a></li>
                <li class="nav-item"><a href="alerts.html" class="nav-link">Alerts</a></li>
                <li class="nav-item"><a href="buttons.html" class="nav-link">Buttons</a></li>
                <li class="nav-item"><a href="cards.html" class="nav-link">Cards</a></li>
                <li class="nav-item"><a href="icons.html" class="nav-link">Icons</a></li>
                <li class="nav-item"><a href="modal.html" class="nav-link">Modal</a></li>
                <li class="nav-item"><a href="navigation.html" class="nav-link">Navigation</a></li>
                <li class="nav-item"><a href="pagination.html" class="nav-link">Pagination</a></li>
                <li class="nav-item"><a href="popups.html" class="nav-link">Tooltip &amp; Popover</a></li>
                <li class="nav-item"><a href="progress.html" class="nav-link">Progress</a></li>
                <li class="nav-item"><a href="spinners.html" class="nav-link">Spinners</a></li>
                <li class="nav-item"><a href="typography.html" class="nav-link">Typography</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-analytics-outline"></i>
                <span>Charts</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
                <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
                <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
                <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
                <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-navigate-outline"></i>
                <span>Maps</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
                <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-list-outline"></i>
                <span>Tables</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
                <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="" class="nav-link with-sub">
                <i class="icon ion-ios-bookmarks-outline"></i>
                <span>Pages</span>
            </a>
            <ul class="nav-sub">
                <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
                <li class="nav-item"><a href="mailbox.html" class="nav-link">Mailbox</a></li>
                <li class="nav-item"><a href="chat.html" class="nav-link">Chat Page</a></li>
                <li class="nav-item"><a href="calendar.html" class="nav-link">Calendar</a></li>
                <li class="nav-item"><a href="edit-profile.html" class="nav-link">Edit Profile</a></li>
                <li class="nav-item"><a href="file-manager.html" class="nav-link">File Manager</a></li>
                <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
                <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
                <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
            </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
            <a href="widgets.html" class="nav-link">
                <i class="icon ion-ios-briefcase-outline"></i>
                <span>Widgets</span>
            </a>
        </li><!-- nav-item -->
    </ul>
</div><!-- kt-sideleft -->

<!-- ##### HEAD PANEL ##### -->
<div class="kt-headpanel">
    <div class="kt-headpanel-left">
        <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
    </div><!-- kt-headpanel-left -->

    <div class="kt-headpanel-right">
        <div class="dropdown dropdown-notification">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                <i class="icon ion-ios-bell-outline tx-24"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                <!-- end: if statement -->
            </a>
            <div class="dropdown-menu wd-300 pd-0-force">
                <div class="dropdown-menu-header">
                    <label>Notifications</label>
                    <a href="">Mark All as Read</a>
                </div><!-- d-flex -->

                <div class="media-list">
                    <!-- loop starts here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="/imgages/img8.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                <span class="tx-12">October 03, 2017 8:45am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="/imgages/img9.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Mellisa Brown</strong> appreciated your work <strong class="tx-medium">The Social Network</strong></p>
                                <span class="tx-12">October 02, 2017 12:44am</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="/imgages/img10.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0">20+ new items added are for sale in your <strong class="tx-medium">Sale Group</strong></p>
                                <span class="tx-12">October 01, 2017 10:20pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <a href="" class="media-list-link read">
                        <div class="media pd-x-20 pd-y-15">
                            <img src="/imgages/img5.jpg" class="wd-40 rounded-circle" alt="">
                            <div class="media-body">
                                <p class="tx-13 mg-b-0"><strong class="tx-medium">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium">Ronnie Mara</strong></p>
                                <span class="tx-12">October 01, 2017 6:08pm</span>
                            </div>
                        </div><!-- media -->
                    </a>
                    <div class="media-list-footer">
                        <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                    </div>
                </div><!-- media-list -->
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <div class="dropdown dropdown-profile">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <img src="/imgages/img3.jpg" class="wd-32 rounded-circle" alt="">
                <span class="logged-name"><span class="hidden-xs-down">Jane Doe</span> <i class="fa fa-angle-down mg-l-3"></i></span>
            </a>
            <div class="dropdown-menu wd-200">
                <ul class="list-unstyled user-profile-nav">
                    <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                    <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                    <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                    <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                    <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                    <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
                </ul>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </div><!-- kt-headpanel-right -->
</div><!-- kt-headpanel -->
<div class="kt-breadcrumb">
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="index.html">Katniss</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>
</div><!-- kt-breadcrumb -->

<!-- ##### MAIN PANEL ##### -->
<div class="kt-mainpanel">