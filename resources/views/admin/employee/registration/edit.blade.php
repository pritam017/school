
@extends('admin.app')
@section('title', 'Edit Employee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Edit Employee <a href="{{ route('employeeReg.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Employee List</a></h3>
    </div>
    <form action="{{ route('employeeReg.update', $editData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="form-group col-md-3">
          <label for="exampleFormControlInput1">Employee Name <font style="color: red;">*</font></label>
          <input type="text" required  name="name" value="{{ $editData->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Employee Email <font style="color: red;">*</font></label>
            <input type="email" required  name="email" class="form-control" value="{{ $editData->email }}" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('email')) ? ($errors->first('email')): '' }}
            </font>
          </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Father's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="fname" value="{{ $editData->fname }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('fname')) ? ($errors->first('fname')): '' }}
            </font>
        </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Mother's Name <font style="color: red;">*</font></label>
            <input type="text"required  name="mname" value="{{ $editData->mname }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mname')) ? ($errors->first('mname')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Mobile No <font style="color: red;">*</font></label>
            <input type="text"required  name="mobile" value="{{ $editData->mobile }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('mobile')) ? ($errors->first('mobile')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Address <font style="color: red;">*</font></label>
            <input type="text" required name="address" value="{{ $editData->address }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('address')) ? ($errors->first('address')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Gender <font style="color: red;">*</font></label>
            <select name="gender" class="form-control" id="">
                <option value="">Select Gender</option>
                <option value="Male"{{ $editData->gender == 'Male'?'selected':'' }}>Male</option>
                <option value="Female"{{ $editData->gender == 'Female'?'selected':'' }}>Female</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Religion <font style="color: red;">*</font></label>
            <select name="religion" class="form-control" id="">
                <option value="">Select Religion</option>
                <option value="Islam"{{ $editData->religion == 'Islam'?'selected':'' }}>Islam</option>
                <option value="Hindu"{{ $editData->religion == 'Hindu'?'selected':'' }}>Hindu</option>
                <option value="Christain"{{ $editData->religion == 'Christain'?'selected':'' }}>Christain</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Date of birth <font style="color: red;">*</font></label>
            <input type="date" name="dob" value="{{ $editData->dob  }}" class="form-control" id="exampleFormControlInput1" placeholder="" autocomplete="off">
            <font style="color: red">
              {{ ($errors->has('date')) ? ($errors->first('date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Degignation <font style="color: red;">*</font></label>
            <select name="degignation_id" class="form-control" id="" required>
                <option value="">Select Degignation</option>
                @foreach ($degignation as $deg)
                <option value="{{ $deg->id }}" {{  $editData->degignation_id == $deg->id ? 'selected':'' }}>{{ $deg->name }}</option>
                @endforeach
            </select>
          </div>


          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
        </div>
        <div class="form-group col-md-3">
            <img src="{{ asset('uploads/employee/'. $editData->image) }}" id="showImage" style="width: 150px; height: 80px" alt="">
        </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Employee" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

