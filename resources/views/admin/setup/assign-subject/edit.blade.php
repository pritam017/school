
@extends('admin.app')
@section('title', 'Assign Subject')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Update Assign Subject<a href="{{ route('setupAssignSubject.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>Assign Subject List</a></h3>
    </div>
    <form action="{{ route('setupAssignSubject.update', $assign_subject[0]->class_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="add_item">
            <div class="from-row">
                <div class="form-group">
                    <label for="">Class Name</label>
                    <select name="class_id" class="form-control" required id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}"{{ $class->id == $assign_subject[0]->class_id?'selected':'' }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @foreach ($assign_subject as $item)
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Select Subject</label>
                    <select name="subject_id[]" required class="form-control" id="">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $sub)
                            <option value="{{ $sub->id }}"{{ $sub->id == $item->subject_id?'selected':'' }}>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Full Mark</label>
                    <input type="number" required name="full_mark[]" value="{{ $item->full_mark }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Pass Mark</label>
                    <input type="number" required name="pass_mark[]" value="{{ $item->pass_mark }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Subjective Mark</label>
                    <input type="number" required name="subject_mark[]" value="{{ $item->get_mark }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group col-md-1" style="padding-top: 35px">
                    <span class="btn btn-info btn-sm addeventmore"> <i class="fa fa-plus-circle"></i></span>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
      </form>
    <div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Select Subject</label>
                    <select name="subject_id[]" required class="form-control" id="">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Full Mark</label>
                    <input type="number" required name="full_mark[]" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Pass Mark</label>
                    <input type="number" required name="pass_mark[]" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Subjective Mark</label>
                    <input type="number" required name="subject_mark[]" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="from-group col-md-1" style="padding-top: 30px">
                    <div class="row">
                        <span class="btn btn-sm btn-success addeventmore" ><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-sm btn-danger removeeventmore" ><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>

@endsection

