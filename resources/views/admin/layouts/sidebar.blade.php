 <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('assets/img/logo-admin.png')}}" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">{{env('APP_NAME')}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Office Section
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Administrative Office</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.office.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.office.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Other Offices</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.other-office.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.other-office.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Section
            </div>
             <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Create / Manage Category</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Events & notice Section
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#event"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-calendar"></i>
                    <span>Events</span>
                </a>
                <div id="event" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.event.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.event.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notice"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-bell"></i>
                    <span>Notice</span>
                </a>
                <div id="notice" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.notice.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.notice.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>
          
           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#download"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-download"></i>
                    <span>Download</span>
                </a>
                <div id="download" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.download.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.download.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#link"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-download"></i>
                    <span>Link</span>
                </a>
                <div id="link" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.link.create')}}">Add New</a>
                        <a class="collapse-item" href="{{route('admin.link.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Banner</span>
                </a>
                <div id="collapseBanner" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                       <a class="collapse-item" href="{{route('admin.banner.create')}}">Add New Banner</a>
                        <a class="collapse-item" href="{{route('admin.banner.index')}}">Manage / Edit</a>
                    </div>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.my-activity')}}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>My activity</span></a>
            </li>


        </ul>