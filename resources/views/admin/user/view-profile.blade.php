
@extends('admin.app')
@section('title', 'User Profile')
@section('content')
<div class="container">
   <div class="card">
       <div class="card-header">
           <h4>Manage Profile</h4>
       </div>
   </div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card card-primary card-outline py-3 my-5">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" height="100" width="150" style="border-radius: 50%" src="{{  asset('uploads/user/'. $user->image)  }}" alt="User profile picture">
              </div>
              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <p class="text-muted text-center">{{ $user->address }}</p>
              <table class="table table-striped">
                  <tbody>
                      <tr>
                          <td style="width: 100%">Mobile No : </td>
                          <td>{{ $user->mobile }}</td>
                      </tr>
                      <tr>
                        <td>Email : </td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Gender : </td>
                        <td>{{ $user->gender }}</td>
                    </tr>
                  </tbody>
              </table>
              <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.card-body -->
          </div>
       </div>
       <div class="col-md-3"></div>
</div>
</div>

@endsection


