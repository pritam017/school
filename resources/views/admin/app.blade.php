
@include('admin.partial.header')
<body id="page-top">
        @include('admin.partial.topbar')

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            @include('admin.partial.sidebar')
            <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @include('flash')
            <!-- Main Content -->
          @yield('content')
@include('admin.partial.footer')

