
@extends('admin.app')
@section('title', 'Manage Student ID Card')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Student ID Card</h3>
    </div>

    <form action="{{ route('id_card.get') }}" id="myForm" method="GET" target="_blank">
        <div class="add_item">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Year</label>
                    <select name="year_id" id="year_id" class="form-control" required id="">
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for=""> Class</label>
                    <select name="class_id" id="class_id" required class="form-control" id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
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

