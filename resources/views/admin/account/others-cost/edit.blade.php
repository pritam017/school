
@extends('admin.app')
@section('title', 'Add Others Cost')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Others Cost <a href="{{ route('othersCost.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Others Cost List</a></h3>
    </div>
    <form action="{{ route('othersCost.update', $editData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Join Date <font style="color: red;">*</font></label>
                <input type="date" required name="date" value="{{ $editData->date }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                <font style="color: red">
                  {{ ($errors->has('date')) ? ($errors->first('date')): '' }}
                </font>
              </div>

          <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Amount <font style="color: red;">*</font></label>
            <input type="number"required  name="amount" value="{{ $editData->amount }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('amount')) ? ($errors->first('amount')): '' }}
            </font>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Cost Details <font style="color: red;">*</font></label>
           <textarea name="description" required class="form-control"  id="" cols="30" rows="10">{{ $editData->description }}</textarea>
            <font style="color: red">
              {{ ($errors->has('description')) ? ($errors->first('description')): '' }}
            </font>
          </div>

          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
        </div>
        <div class="form-group col-md-3">
            <img src="{{ (!empty($value->image))?asset('uploads/cost_images/'.$value->image):asset('uploads/default.jpg') }}" width="90px" height="60px" alt="">
        </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Others Cost" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

