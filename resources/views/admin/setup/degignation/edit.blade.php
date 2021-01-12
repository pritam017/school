
@extends('admin.app')
@section('title', 'Update Degignation')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Degignation <a href="{{ route('setupDegignation.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Degignation List</a></h3>
    </div>
    <form action="{{ route('setupDegignation.update', $degignation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Degignation Name</label>
          <input type="text" name="name" value="{{ $degignation->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('name')) ? ($errors->first('name')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Degignation" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

