
@extends('admin.app')
@section('title', 'Manage Marksheet')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Marksheet Generate</h3>
    </div>

    <form action="{{ route('marksheet.get') }}" id="myForm" method="GET" target="_blank">
        <div class="add_item">
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="">Year</label>
                    <select name="year_id" id="year_id" class="form-control" required id="">
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for=""> Class</label>
                    <select name="class_id" id="class_id" required class="form-control" id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for=""> Exam Type</label>
                    <select name="exam_type_id" id="exam_type_id" required class="form-control" id="">
                        <option value="">Select Exam Type</option>
                        @foreach ($exam_types as $type)
                            <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">ID No</label>
                    <input type="text" required name="id_no" class="form-control">
                </div>
                <div class="form-group col-md-1" style="padding-top: 35px">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>
                </div>
        </div>
    </div>
      </form>

</div>


@endsection
@push('js')

@endpush

