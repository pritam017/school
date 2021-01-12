
@extends('admin.app')
@section('title', 'Assign Subject')
@section('content')
<div class="container">
    <div class="card-header">
        <h4><strong>Class: {{ $assign_subject[0]->class->name }}</strong></h4>
        <h3>All Assign Subject<a href="{{ route('setupAssignSubject.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>Assign Subject List</a></h3>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Subject Name</th>
                <th>Full Mark</th>
                <th>Pass Mark</th>
                <th>Subjective Mark</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($assign_subject as $key =>$sub)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $sub->subject->name }}</td>
                    <td>{{ $sub->full_mark }}</td>
                    <td>{{ $sub->pass_mark }}</td>
                    <td>{{ $sub->get_mark }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection

