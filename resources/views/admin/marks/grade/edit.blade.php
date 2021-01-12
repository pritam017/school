
@extends('admin.app')
@section('title',  'Update Grade Point' )
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Grade Point <a href="{{ route('grade.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Grade Point List</a></h3>
    </div>
    <form action="{{ route('grade.update', $editData->id) }}" method="POST" id="myForm">
        @csrf
        @method('PUT')
       <div class="card-body">
           <div class="row">
               <div class="form-group col-md-4">
                   <label for="">Grade Name</label>
                   <input type="text" name="grade_name"required value="{{ $editData->grade_name }}" class="form-control" id="">
               </div>
               <div class="form-group col-md-4">
                <label for="">Grade Point</label>
                <input type="text" name="grade_point"required value="{{ $editData->grade_point }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <label for="">Start Marks</label>
                <input type="text" name="start_marks"required value="{{ $editData->start_marks }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <label for="">End Marks</label>
                <input type="text" name="end_marks"required value="{{ $editData->end_marks }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <label for="">Start Point</label>
                <input type="text" name="start_point"required value="{{ $editData->start_point }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <label for="">End Point</label>
                <input type="text" name="end_point"required value="{{ $editData->end_point }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <label for="">Remarks</label>
                <input type="text" name="remarks"required value="{{ $editData->remarks }}" class="form-control" id="">
            </div>
            <div class="form-group col-md-4">
                <button class="btn btn-sm btn-success" type="submit">Update</button>
            </div>
           </div>
       </div>
      </form>
</div>

@endsection

@push('js')

@endpush
