
@extends('admin.app')
@section('title', 'Manage Exam Fee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Exam Fee</h3>
    </div>
        <h6>Search Criteria</h6>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Year <font style="color: red;">*</font></label>
                <select name="year_id" class="form-control" id="year_id" required>
                    <option value="">Select Year</option>
                    @foreach ($years as $year)
                    <option value="{{ $year->id }}"{{ (@$year_id==$year->id?'selected':'') }}>{{ $year->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Class <font style="color: red;">*</font></label>
                <select name="class_id" class="form-control" required id="class_id">
                    <option value="">Select Class</option>
                    @foreach ($classes as $cls)
                    <option value="{{ $cls->id }}"{{ (@$class_id==$cls->id?'selected':'') }}>{{ $cls->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="exampleFormControlInput1">Exam Type <font style="color: red;">*</font></label>
                <select name="exam_type" class="form-control" required id="exam_type">
                    <option value="">Select Exam Type</option>
                    @foreach ($exam_types as $type)
                    <option value="{{ $type->id }}">{{ $type->exam_type }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-3" style="padding-top: 33px;">
                  <a id="searchexam" class="btn btn-info btn-sm" type="submit"><i class="fa fa-search"></i></a>
              </div>
              <div class="card">
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

