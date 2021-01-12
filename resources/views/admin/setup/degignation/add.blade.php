
@extends('admin.app')
@section('title', 'Add Degignation')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Degignation <a href="{{ route('setupDegignation.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Degignation List</a></h3>
    </div>
    <form action="{{ route('setupDegignation.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Degignation Name</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Degignation" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

