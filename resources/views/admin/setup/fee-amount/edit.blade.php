
@extends('admin.app')
@section('title', 'Add Fee Amount')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Fee Amount <a href="{{ route('setupStudentFeeAmount.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Fee Amount List</a></h3>
    </div>
    <form action="{{ route('setupStudentFeeAmount.update', $fee_amount[0]->fee_category_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="add_item">
            <div class="from-row">
                <div class="form-group">
                    <label for="">Fee Category</label>
                    <select name="fee" class="form-control" required id="">
                        <option value="">Select Fee Category</option>
                        @foreach ($fees as $fee)
                            <option value="{{ $fee->id }}" {{ $fee->id == $fee_amount[0]->fee_category_id?'selected':'' }}>{{ $fee->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @foreach ($fee_amount as $item)
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Select Class</label>
                    <select name="class_id[]" required class="form-control" id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ $class->id == $item->class_id?'selected':'' }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="">Amount</label>
                    <input type="number" required name="amount[]" value="{{ $item->amount }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="form-group btn-group col-md-1" style="padding-top: 35px">
                    <span class="btn btn-info btn-sm addeventmore"> <i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-sm btn-danger removeeventmore" ><i class="fa fa-minus-circle"></i></span>
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
                <div class="form-group col-md-5">
                    <label for="exampleFormControlInput1">Class</label>
                      <select name="class_id[]" required class="form-control" id="">
                          <option value="">Select Class</option>
                          @foreach ($classes as $class)
                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleFormControlInput1">Amount</label>
                    <input type="text" required name="amount[]" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                <div class="from-group col-md-1" style="padding-top: 30px">
                    <div class="row">
                        <span class="btn btn-sm btn-info addeventmore" ><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-sm btn-danger removeeventmore" ><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>

@endsection

