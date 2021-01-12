
@extends('admin.app')
@section('title', 'Degignation')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Degignation <a href="{{ route('setupDegignation.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Degignation</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Degignation Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($degignation as $key =>$deg)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $deg->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('setupDegignation.edit', $deg->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection

