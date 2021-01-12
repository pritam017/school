
@extends('admin.app')
@section('title', 'Edit Profile')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Edit Profile <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger float-right">Go Back</a></h3>
    </div>
    <form action="{{ route('profile.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" name="email" value="{{ $edit->email }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" name="password" value="{{ $edit->password }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Confirm Password</label>
            <input type="password" name="conpassword" value="{{ $edit->password }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Mobile</label>
            <input type="integer" name="mobile" value="{{ $edit->mobile }}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input type="text" name="address" class="form-control" value="{{ $edit->address }}" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Gender</label>
           <select name="gender" id="" class="form-control">
               <option value="">Select Gender</option>
               <option value="male"{{ $edit->gender == 'male'?'selected':'' }}>Male</option>
               <option value="female" {{ $edit->gender == 'female'?'selected':'' }}>Female</option>
           </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Image</label> <br>
            <input type="file" id="image" name="image"> <br>
            <img src="{{ asset('uploads/user/'. $edit->image) }}" id="showImage" style="width: 150px; height: 160px" alt="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Status</label>
           <select name="status" id="" class="form-control">
               <option value="">Select Status</option>
               <option value="1" {{ $edit->status == 1?'selected':'' }}>Inactive</option>
               <option value="2" {{ $edit->status == 2?'selected':'' }}>Active</option>
           </select>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Profile" class="btn btn-primary">
        </div>
      </form>
</div>
@endsection

