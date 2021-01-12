
@extends('admin.app')
@section('title', 'Update Fee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Fee <a href="{{ route('setupStudentFee.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Fee List</a></h3>
    </div>
    <form action="{{ route('setupStudentFee.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Fee Name</label>
          <input type="text" name="name" value="{{ $fee->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Fee" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

