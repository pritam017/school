
@extends('admin.app')
@section('title', 'Add Student')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Student <a href="{{ route('studentRegistration.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Student List</a></h3>
    </div>
    <form action="{{ route('studentRegistration.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
        <div class="form-group col-md-4">
          <label for="exampleFormControlInput1">Student Name <font style="color: red;">*</font></label>
          <input type="text" required  name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Father's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="fname" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('fname')) ? ($errors->first('fname')): '' }}
            </font>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Mother's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="mname" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mname')) ? ($errors->first('mname')): '' }}
            </font>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Mobile No <font style="color: red;">*</font></label>
            <input type="text"required  name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mobile')) ? ($errors->first('mobile')): '' }}
            </font>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Address <font style="color: red;">*</font></label>
            <input type="text" required name="address" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('address')) ? ($errors->first('address')): '' }}
            </font>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Gender <font style="color: red;">*</font></label>
            <select name="gender" class="form-control" id="">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Religion <font style="color: red;">*</font></label>
            <select name="religion" class="form-control" id="">
                <option value="">Select Religion</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Christain">Christain</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Date of birth <font style="color: red;">*</font></label>
            <input type="date" name="dob" class="form-control" id="exampleFormControlInput1" placeholder="" autocomplete="off">
            <font style="color: red">
              {{ ($errors->has('date')) ? ($errors->first('date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Discount <font style="color: red;">*</font></label>
            <input type="text" name="discount" required class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Year <font style="color: red;">*</font></label>
            <select name="year_id" class="form-control" id="" required>
                <option value="">Select Year</option>
                @foreach ($years as $year)
                <option value="{{ $year->id }}">{{ $year->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Class <font style="color: red;">*</font></label>
            <select name="class_id" class="form-control" required id="">
                <option value="">Select Class</option>
                @foreach ($classes as $cls)
                <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Group</label>
            <select name="group_id" class="form-control" id="">
                <option value="">Select Group</option>
                @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Shift</label>
            <select name="shift_id" class="form-control" id="">
                <option value="">Select Shift</option>
                @foreach ($shifts as $shift)
                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
        </div>
        <div class="form-group col-md-4">
            <img src="{{ asset('uploads/default.jpg') }}" id="showImage" style="width: 100px; height: 80px" alt="">
        </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Student" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

