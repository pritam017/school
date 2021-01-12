
@extends('admin.app')
@section('title', 'Add Others Cost')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Others Cost <a href="{{ route('othersCost.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Others Cost List</a></h3>
    </div>
    <form action="{{ route('othersCost.store') }}" method="POST" id="quickForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Join Date <font style="color: red;">*</font></label>
                <input type="date" required name="date" class="form-control" id="exampleFormControlInput1" placeholder="">
                <font style="color: red">
                  {{ ($errors->has('date')) ? ($errors->first('date')): '' }}
                </font>
              </div>

          <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Amount <font style="color: red;">*</font></label>
            <input type="number"required  name="amount" class="form-control" id="exampleFormControlInput1" placeholder="">
            <font style="color: red">
              {{ ($errors->has('amount')) ? ($errors->first('amount')): '' }}
            </font>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Cost Details <font style="color: red;">*</font></label>
           <textarea name="description" required class="form-control" id="" cols="30" rows="10"></textarea>
            <font style="color: red">
              {{ ($errors->has('description')) ? ($errors->first('description')): '' }}
            </font>
          </div>

          <div class="form-group col-md-3">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
        </div>
        <div class="form-group col-md-3">
            <img src="{{ asset('uploads/default.jpg') }}" id="showImage" style="width: 150px; height: 80px" alt="">
        </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Add Others Cost" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#quickForm').validate({
        rules: {
            date: {
            required: true,
            email: true,
          },
          amount: {
            required: true,
            minlength: 5
          },
          description: {
            required: true
          },
          image: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endpush
