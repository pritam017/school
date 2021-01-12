
@extends('admin.app')
@section('title', 'Manage Student Fee')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Student Fee <a href="{{ route('studentFee.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Student Fee</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>ID No</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Class</th>
                    <th>Fee Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr class="{{ $value->id }}">
                    <td>{{ $key+1 }}</td>
                    <td> {{ $value->student->id_no}}</td>
                    <td> {{ $value->student->name}}</td>
                    <td> {{ $value->year->name}}</td>
                    <td> {{ $value->class->name}}</td>
                    <td> {{ $value->fee_category->name}}</td>
                    <td> {{ $value->amount}}</td>
                    <td> {{date('M Y', strtotime( $value->date))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection

