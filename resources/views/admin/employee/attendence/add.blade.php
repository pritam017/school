
@extends('admin.app')
@section('title',  'Add Employee Attendence' )
@section('content')
<style>
    .switch-toggle{
        width: auto;
    }
    .switch-toggle label:not(.disabled){
        cursor: pointer;
    }
    .switch-candy a{
        border: 1px solid #333;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0, 2), inset 0 1px 1px rgba(255, 255, 255, 0.45);
        background-color: white;
        background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.2), transparent);
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.2), transparent);
    }
    .switch-toggle.switch-candy, .switch-light.switch-candy > span{
        background-color: #5a6268;
        border-radius: 3px;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0,0.3),0.1px 0 rgba(255, 255, 255, 0.2);
    }
</style>
<div class="container">
    <div class="card-header">
        <h3>Add Employee Attendence <a href="{{ route('employeeAttendence.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"></i> Employee Leave List</a></h3>
    </div>
    <form action="{{ route('employeeAttendence.store') }}" method="POST" id="myForm">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
               <label for="exampleFormControlInput1">Attendence Date</label>
               <input type="date" required name="date" id="date" class="form-control checkdate" autocomplete="off">
            </div>
            <table class="table-borderd table-sm dt-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name</th>
                    <th colspan="3" class="text-center" style="vertical-align: middle;">Attendence Status</th>
                    </tr>
                    <tr>
                        <th  class="text-center btn present_all" style="display: table-cell; background-color: #114190">Present</th>
                    <th  class="text-center btn leave_all" style="display: table-cell; background-color: #f3e415">Leave</th>
                    <th  class="text-center btn absent_all" style="display: table-cell; background-color: #ec0808">Absent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key=>$emp)
                        <tr id="div{{ $emp->id }}" class="text-center">
                            <input type="hidden" name="employee_id[]" value="{{ $emp->id }}" class="employee_id">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $emp->name }}</td>
                            <td colspan="3">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input type="radio" class="present" id="present{{ $key }}" name="attend_status{{ $key }}" value="Present">
                                    <label style="color: #000" for="present{{ $key }}">Present</label>&nbsp;&nbsp;
                                    <input  type="radio" class="leave" id="leave{{ $key }}" name="attend_status{{ $key }}" value="Leave">
                                    <label style="color: #000" for="leave{{ $key }}">Leave</label>&nbsp;&nbsp;
                                    <input type="radio" class="absent" id="absent{{ $key }}" name="attend_status{{ $key }}" value="Absent">
                                    <label style="color: #000" for="absent{{ $key }}">Absent</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="form-group py-4">
          <input type="submit" value="Add Leave" class="btn btn-primary btn-sm ml-3">
        </div>
    </div>
      </form>
</div>

@endsection

@push('js')
<script>
    $(document).on('click','.present', function(){
        $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });
    $(document).on('click','.leave', function(){
        $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','#fff').css('color','#495057');
    });
    $(document).on('click','.absent', function(){
        $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
    });
</script>
<script>
    $(document).on('click','.present_all', function(){
       $("input[value=Present]").prop('checked', true);
       $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
    });
    $(document).on('click','.leave_all', function(){
        $("input[value=Leave]").prop('checked', true);
        $('.datetime').css('pointer-events','').css('background-color','#fff').css('color','#495057');
     });
     $(document).on('click','.absent_all', function(){
        $("input[value=Present]").prop('checked', true);
        $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6 ');
     });
</script>
<script type="text/javascript">
    $(document).ready(function () {

      $('#myForm').validate({
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
