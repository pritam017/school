
@extends('admin.app')
@section('title', 'Update Employee Leave')
@section('content')
<div class="container">

    <div class="card-header">
        <h3>Update Employee Leave <a href="{{ route('employeeLeave.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Employee Leave List</a></h3>
    </div>
    <form action="{{ route('employeeLeave.update', $editData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="form-group col-md-4">
          <label for="exampleFormControlInput1">Employee Name</label>
          <select name="employee_id" class="form-control" id="" required>
            <option value="">Select Employee</option>
            @foreach ($employees as $emp)
            <option value="{{ $emp->id }}"{{ $emp->id == $editData->employee_id?'selected':'' }}>{{ $emp->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Start Date <font style="color: red;">*</font></label>
            <input type="date" name="start_date" value="{{ $editData->start_date }}" class="form-control" id="exampleFormControlInput1" placeholder="" autocomplete="off">
            <font style="color: red">
              {{ ($errors->has('start_date')) ? ($errors->first('start_date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">End Date <font style="color: red;">*</font></label>
            <input type="date" name="end_date" value="{{ $editData->end_date }}" class="form-control" id="exampleFormControlInput1" placeholder="" autocomplete="off">
            <font style="color: red">
              {{ ($errors->has('end_date')) ? ($errors->first('end_date')): '' }}
            </font>
          </div>
          <div class="form-group col-md-8">
            <label for="exampleFormControlInput1">Leave Purpose</label>
            <select name="leave_purpose_id" id="leave_purpose_id" class="form-control" id="" required>
              <option value="">Select Employee</option>
              @foreach ($leave_purpose as $purpose)
              <option value="{{ $purpose->id }}"{{ $purpose->id == $editData->leave_purpose_id?'selected':'' }}>{{ $purpose->name }}</option>
              @endforeach
              <option value="0">New Purpose</option>
          </select>
          <input type="text" name="name" class="form-control" placeholder="Write a purpose" id="add_others" style="display: none;">
          </div>
        <div class="form-group py-4">
          <input type="submit" value="Update Leave" class="btn btn-primary btn-sm">
        </div>
    </div>
      </form>
</div>

@endsection

