
@extends('admin.app')
@section('title',  'Add Employee Salary' )
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Add Employee Salary <a href="{{ route('empSalary.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Employee Salary List</a></h3>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="">Date</label>
        <input type="date" name="date" id="date" class="form-control" autocomplete="off">
        </div>
      <div class="col-md-3" style="padding-top: 33px;">
          <a id="searches" class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i></a>
      </div>
      <div class="col-md-12">
        <div id="DocumentResults">
            <script id="document-template" type="text/x-handlebars-template" >
                 <form action="{{ route('empSalary.store') }}" method="POST">
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
</div>

@endsection

@push('js')
<script>
    $(document).on('click','#searches', function(){

        var date = $('#date').val();


        $.ajax({
            url: '{{ route('account.salary.get-employee') }}',
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
<script type="text/javascript">
    $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          alert( "Form successful submitted!" );
        }
      });
      $('#quickForm').validate({
        rules: {
            date: {
            required: true,

          },

        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endpush
