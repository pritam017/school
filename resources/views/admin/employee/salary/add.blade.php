
@extends('admin.app')
@section('title', 'Add Employee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Employee <a href="{{ route('employeeReg.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Employee List</a></h3>
    </div>
    <form action="{{ route('employeeReg.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="form-group col-md-3">
          <label for="exampleFormControlInput1">Employee Name <font style="color: red;">*</font></label>
          <input type="text" required  name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Employee Email <font style="color: red;">*</font></label>
            <input type="email" required  name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('email')) ? ($errors->first('email')): '' }}
            </font>
          </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Father's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="fname" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('fname')) ? ($errors->first('fname')): '' }}
            </font>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Mother's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="mname" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mname')) ? ($errors->first('mname')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Mobile No <font style="color: red;">*</font></label>
            <input type="text"required  name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mobile')) ? ($errors->first('mobile')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Address <font style="color: red;">*</font></label>
            <input type="text" required name="address" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('address')) ? ($errors->first('address')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Gender <font style="color: red;">*</font></label>
            <select name="gender" class="form-control" id="">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Religion <font style="color: red;">*</font></label>
            <select name="religion" class="form-control" id="">
                <option value="">Select Religion</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Christain">Christain</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Date of birth <font style="color: red;">*</font></label>
            <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" placeholder="" autocomplete="off">
            <font style="color: red">
              {{ ($errors->has('date')) ? ($errors->first('date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Degignation <font style="color: red;">*</font></label>
            <select name="degignation_id" class="form-control" id="" required>
                <option value="">Select Degignation</option>
                @foreach ($degignation as $deg)
                <option value="{{ $deg->id }}">{{ $deg->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Join Date <font style="color: red;">*</font></label>
            <input type="date" required name="join_date" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('join_date')) ? ($errors->first('join_date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Salary <font style="color: red;">*</font></label>
            <input type="text" required name="salary" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('salary')) ? ($errors->first('salary')): '' }}
            </font>
          </div>

          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
        </div>
        <div class="form-group col-md-3">
            <img src="{{ asset('uploads/default.jpg') }}" id="showImage" style="width: 150px; height: 80px" alt="">
        </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Employee" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

