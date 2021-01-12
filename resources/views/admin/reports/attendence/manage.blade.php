
@extends('admin.app')
@section('title', 'Employee Attendence')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Employee Attendence</h3>
    </div>

    <form action="{{ route('attendence.get') }}" id="myForm" method="GET" target="_blank">
        <div class="add_item">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Employee Name</label>
                    <select name="employee_id" id="employee_id" class="form-control" required id="">
                        <option value="">Select Employee</option>
                        @foreach ($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-5">
                    <label for="">Date</label>
                    <input type="date" required name="date" id="date" class="form-control">
                </div>
                <div class="form-group col-md-1" style="padding-top: 35px">
                    <button type="submit" id="searchattn" class="btn btn-primary"> <i class="fa fa-search"></i></button>
                </div>
        </div>
    </div>
      </form>
</div>


@endsection
@push('js')
<script>
    $(document).on('click','#searchattn', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var exam_type = $('#exam_type').val();


        $.ajax({
            url: '{{ route('student.exam.fee.get-student') }}',
            type: 'get',
            data: {'year_id': year_id, 'class_id': class_id,'exam_type':exam_type},
            beforeSend: function () {
            },
            success: function (data){
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html= template(data);
                $("#DocumentResults").html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
@endpush

