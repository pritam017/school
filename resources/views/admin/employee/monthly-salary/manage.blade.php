
@extends('admin.app')
@section('title', 'Manage Employee Monthly Salary')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Employee Monthly Salary</h3>
    </div>
        <h6>Search Date Wise</h6>
        <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Date</label>
                <input type="date" name="date" id="date" class="form-control" autocomplete="off">
                </div>
              <div class="col-md-3" style="padding-top: 33px;">
                  <a id="searchems" class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i></a>
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
                                    @{{#each this }}
                                    <tr>
                                        @{{{tdsource}}}
                                    </tr>
                                    @{{/each}}
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
    $(document).on('click','#searchems', function(){
        var date = $('#date').val();
        $.ajax({
            url: '{{ route('ems.get') }}',
            type: 'get',
            data: {'date':date},
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
