  <!-- Main Sidebar Container -->
   <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="{{ route('home')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('ebook.index')}}"> <i class="menu-icon fa fa-book"></i>Books</a>
                    </li>
                    <li>
                        <a href="{{ route('chapter.index')}}"> <i class="menu-icon fa fa-file"></i>Chapters</a>
                    </li>
                    <li>
                        <a href="{{ route('data.index')}}"> <i class="menu-icon fa fa-database"></i>Data</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('content.index')}}"> <i class="menu-icon fa fa-database"></i>Contents</a>
                    </li>

                    <li>
                        <a href="{{ route('student-purchase.index')}}"> <i class="menu-icon fa fa-shopping-bag"></i>Student Purchases</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
