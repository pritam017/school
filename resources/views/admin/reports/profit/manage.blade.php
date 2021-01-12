
@extends('admin.app')
@section('title', 'Manage Employee Monthly Salary')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Employee Monthly Salary</h3>
    </div>
        <h6>Search Date Wise</h6>
        <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" autocomplete="off">
                </div>
                <div class="form-group col-md-5">
                    <label for="">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" autocomplete="off">
                </div>
              <div class="col-md-2" style="padding-top: 33px;">
                  <a id="searchreport" class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i></a>
              </div>
<div class="col-md-12">
                  <div id="DocumentResults">
                      <script id="document-template" type="text/x-handlebars-template" >
                            <table class="table-sm table-borderd" style="width: 100%">
                                <thead>
                                <tr>
                                    @{{{thsource}}}
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @{{{tdsource}}}
                                    </tr>
                                </tbody>
                            </table>
                      </script>
                  </div>
                </div>
        </div>
</div>


@endsection
@push('js')
<script>
    $(document).on('click','#searchreport', function(){
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        $.ajax({
            url: '{{ route('profit.get') }}',
            type: 'get',
            data: {'start_date':start_date,'end_date':end_date},
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

