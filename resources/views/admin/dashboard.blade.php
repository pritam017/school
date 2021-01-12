
@extends('admin.app')
@section('title', 'Admin Dashboard')

@section('content')
<div id="content">

    <!-- Topbar -->

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800 m-auto">Welcome to Pacific School Dashboard</h2>

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img src="{{ asset('uploads/school.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-4"></div>
            <!-- Earnings (Monthly) Card Example -->


        </div>

    </div>


</div>
@endsection

