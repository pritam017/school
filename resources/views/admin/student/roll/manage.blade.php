
@extends('admin.app')
@section('title', 'Manage Roll')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Roll </h3>
    </div>

        <h6>Search Criteria</h6>
        <form method="POST" action="{{ route('studentRoll.store') }}" id="myForm">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Year <font style="color: red;">*</font></label>
                    <select name="year_id" id="year_id" class="form-control" id="" required>
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Class <font style="color: red;">*</font></label>
                    <select name="class_id" id="class_id" class="form-control" required id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $cls)
                        <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-4" style="padding-top: 33px;">
                      <a id="searchroll" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                  </div>
            </div>
            <div class="row d-none" id="roll-genarate">
                <div class="col-md-12">
                    <table class="table table-bordered dt-responsive" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Student Name</th>
                                <th>Father's Name</th>
                                <th>Gender</th>
                                <th>Roll No</th>
                            </tr>
                        </thead>
                        <tbody id="roll-genarate-tr">

                        </tbody>
                    </table>
                </div>

            <button type="submit" class="btn btn-info">Roll Genarate</button>
        </div>
        </form>
</div>



@endsection

