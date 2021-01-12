
@extends('admin.app')
@section('title', 'Manage ')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Increment Employee Salary,Current Salary {{ $editData->salary }} <a href="{{ route('employeeSalary.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Employee Salary List</a></h3>
    </div>
    <form action="{{ route('employeeSalary.update', $editData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Salary Amount</label>
          <input type="text" name="increment_salary"  class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('increment_salary')) ? ($errors->first('increment_salary')): '' }}
          </font>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Effected Date</label>
            <input type="date" name="effected_date"  class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('effected_date')) ? ($errors->first('effected_date')): '' }}
            </font>
          </div>
        <div class="form-group">
          <input type="submit" value="Submit" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

