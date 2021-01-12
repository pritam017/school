
@extends('admin.app')
@section('title', 'Student Fee Amount')
@section('content')
<div class="container">
    <div class="card-header">
        <h4><strong>Fee Types: {{ $fee_amount[0]->fee->name }}</strong></h4>
        <h3>All Fee Amount<a href="{{ route('setupStudentFeeAmount.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> All Type Fee</a></h3>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>#SL</th>
                <th>Class Name</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($fee_amount as $key =>$fee)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fee->class->name }}</td>
                    <td>{{ $fee->amount }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection

