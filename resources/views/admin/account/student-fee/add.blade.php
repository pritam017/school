
@extends('admin.app')
@section('title',  'Add/Edit Student Fee' )
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add/Edit Student Fee <a href="{{ route('studentFee.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Student Fee List</a></h3>
    </div>
       <div class="card-body">
           <div class="row">
               <div class="form-group col-md-3">
                   <label for=""> Year</label>
                   <select name="year_id" id="year_id" class="form-control" id="">
                    <option value="">Select Year</option>
                    @foreach ($years as $year)
                    <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                   </select>
               </div>
               <div class="form-group col-md-3">
                <label for=""> Class</label>
                <select name="class_id" id="class_id" class="form-control" id="">
                 <option value="">Select Class</option>
                 @foreach ($classes as $cls)
                 <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                 @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Fee Category</label>
                <select name="fee_category_id" id="fee_category_id" class="form-control" id="">
                 <option value="">Select Fee Category</option>
                 @foreach ($fee_categories as $fee)
                 <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                 @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <a class="btn btn-sm btn-success" id="searchfee"><i class="fa fa-search"></i></a>
            </div>
           </div>
       </div>
       <div class="card">
        <div id="DocumentResults">
            <script id="document-template" type="text/x-handlebars-template" >
                 <form action="{{ route('studentFee.store') }}" method="POST">
                     @csrf
                     <table class="table-sm table-borderd" style="width: 100%">
                        <thead>
                            <tr>
                            @{{{thsource}}}
                        </tr>
                        </thead>
                        <tbody>
                            @{{#each this }}
                            <tr>
                                @{{{tdsource}}}
                            </tr>
                            @{{/each}}
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 10px">Submit</button>
                 </form>
            </script>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $(document).on('click','#searchfee', function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var fee_category_id = $('#fee_category_id').val();
        var date = $('#date').val();


        $.ajax({
            url: '{{ route('student.account.fee.get-student') }}',
            type: 'get',
            data: {'year_id': year_id, 'class_id': class_id,'fee_category_id':fee_category_id,'date':date},
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
