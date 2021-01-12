
@extends('admin.app')
@section('title', 'Register Student')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Register Student <a href="{{ route('studentRegistration.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Student</a></h3>
    </div>
    <div class="card">
        <form method="GET" action="{{ route('search.student') }}" id="myForm">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Year <font style="color: red;">*</font></label>
                    <select name="year_id" class="form-control" id="" required>
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                        <option value="{{ $year->id }}"{{ (@$year_id==$year->id?'selected':'') }}>{{ $year->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Class <font style="color: red;">*</font></label>
                    <select name="class_id" class="form-control" required id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $cls)
                        <option value="{{ $cls->id }}"{{ (@$class_id==$cls->id?'selected':'') }}>{{ $cls->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-4" style="padding-top: 33px;">
                      <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i></button>
                  </div>
            </div>
        </form>
    </div>
    @if(!@$search)
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>ID No</th>
                <th>Roll</th>
                <th>Year</th>
                <th>Class</th>
                @if (Auth::user()->user_role == 1)
                <th>Code</th>
                @endif
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $key =>$std)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $std->student->name }}</td>
                <td>{{ $std->id_no }}</td>
                <td>{{ $std->roll }}</td>
                <td>{{ $std->year->name }}</td>
                <td>{{ $std->class->name }}</td>
                @if (Auth::user()->user_role == 1)
                <td>{{ $std->student->code }}</td>
                @endif
                <td><img src="{{ asset('uploads/student/'. $std->student->image) }}" id="showImage" style="width: 50px; height: 40px;" alt=""></td>
                <td>
                    <div class="btn-group">
                     <a title="Edit" href="{{ route('regStudent.edit', $std->student_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                     <a title="Promotion" href="{{ route('regStudent.promotion', $std->student_id) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                     <a target="_blank" title="Details" href="{{ route('regStudent.details', $std->student_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                    </div>
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Name</th>
                <th>ID No</th>
                <th>Roll</th>
                <th>Year</th>
                <th>Class</th>
                @if (Auth::user()->user_role == 1)
                <th>Code</th>
                @endif
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $key =>$std)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $std->student->name }}</td>
                <td>{{ $std->id_no }}</td>
                <td>{{ $std->roll }}</td>
                <td>{{ $std->year->name }}</td>
                <td>{{ $std->class->name }}</td>
                @if (Auth::user()->user_role == 1)
                <td>{{ $std->student->code }}</td>
                @endif
                <td><img src="{{ asset('uploads/student/'. $std->image) }}" id="showImage" style="width: 50px; height: 40px;" alt=""></td>
                <td>
                    <div class="btn-group">
                     <a href="{{ route('regStudent.edit', $std->student_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                     <a title="Promotion" href="{{ route('regStudent.promotion', $std->student_id) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                     <a target="_blank" title="Details" href="{{ route('regStudent.details', $std->student_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                    </div>
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>
@endsection

