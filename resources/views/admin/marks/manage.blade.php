


@extends('admin.app')
@section('title', 'Manage Marks Entry')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Marks Entry </h3>
    </div>

        <h6>Search Criteria</h6>
        <form method="POST" action="{{ route('marksEntry.store') }}" id="myForm">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Year <font style="color: red;">*</font></label>
                    <select name="year_id" id="year_id" class="form-control" id="" required>
                        <option value="">Select Year</option>
                        @foreach ($years as $year)
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Class <font style="color: red;">*</font></label>
                    <select name="class_id" id="class_id" class="form-control" required id="">
                        <option value="">Select Class</option>
                        @foreach ($classes as $cls)
                        <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="exampleFormControlInput1">Subject <font style="color: red;">*</font></label>
                    <select name="assign_subject_id" id="assign_subject_id" class="form-control" required>
                        <option value="">Select Subject</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Exam Type <font style="color: red;">*</font></label>
                    <select name="exam_type_id" id="exam_type_id" class="form-control" required id="">
                        <option value="">Select Exam Type</option>
                        @foreach ($exam_types as $type)
                        <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-1" style="padding-top: 33px;">
                      <a id="searchmark" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                  </div>
            </div>
            <div class="row d-none" id="mark-genarate">
                <div class="col-md-12">
                    <table class="table table-bordered dt-responsive" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID No</th>
                                <th>Student Name</th>
                                <th>Fathers Name</th>
                                <th>Gender</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                        <tbody id="mark-genarate-tr">

                        </tbody>
                    </table>
                </div>

            <button type="submit" class="btn btn-info">Mark Generate</button>
        </div>
        </form>
</div>



@endsection

@push('js')
<script>
    $(document).on('click','#searchmark', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var assign_subject_id = $('#assign_subject_id').val();
        var exam_type_id = $('#exam_type_id').val();
        $.ajax({
            url: '{{ route('get-student') }}',
            type: 'GET',
            data: {'year_id': year_id, 'class_id': class_id},
            success: function (data) {
                $('#mark-genarate').removeClass('d-none');
                var html = '';
                $.each(data, function( key,v){
                    html+=
                    '<tr>'+
                    '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
                    '<td>'+v.student.name+'</td>'+
                    '<td>'+v.student.fname+'</td>'+
                    '<td>'+v.student.gender+'</td>'+
                    '<td><input type="text" required class="form-control form-control-sm" name="marks[]"></td>'+
                    '</tr>';
                });
                html = $('#mark-genarate-tr').html(html);
            }

        });

    });
</script>
<script>
    $(function(){
        $(document).on('change','#class_id', function(){
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{ route('get-subject') }}",
                type: 'GET',
                data: {class_id:class_id},
                success:function(data){
                    var html = "<option>Select Subject</option>";
                    $.each(data, function(key,v){
                        html += '<option value="'+v.id+'">'+v.subject.name+'</option>'
                    });
                    $('#assign_subject_id').html(html);
                }
            });
        });
    });
</script>
@endpush
