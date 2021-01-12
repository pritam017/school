
@extends('admin.app')
@section('title', 'Exam Type')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Exam Type <a href="{{ route('setupStudentExamType.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Exam Type List</a></h3>
    </div>
    <form action="{{ route('setupStudentExamType.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Exam Type</label>
          <input type="text" name="exam_type" class="form-control" id="exampleFormControlInput1" placeholder="">
          <font style="color: red">
            {{ ($errors->has('exam_type')) ? ($errors->first('exam_type')): '' }}
          </font>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Exam Type" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

