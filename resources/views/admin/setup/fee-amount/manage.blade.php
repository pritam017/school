
@extends('admin.app')
@section('title', 'Student Fee Amount')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Fee Amount<a href="{{ route('setupStudentFeeAmount.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Fee Amount</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Fee Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fee_amounts as $key =>$fee)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fee->fee->name }}</td>
                    <td>
                        <div class="btn-group">
                         <a href="{{ route('fee.show', $fee->fee_category_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                         <a href="{{ route('fee.edit', $fee->fee_category_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection

