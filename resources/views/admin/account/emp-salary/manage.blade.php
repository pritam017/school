
@extends('admin.app')
@section('title', 'Manage Employee salary')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>Manage Employee salary <a href="{{ route('empSalary.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Employee salary</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>ID No</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr class="{{ $value->id }}">
                    <td>{{ $key+1 }}</td>
                    <td> {{ $value->user->id_no}}</td>
                    <td> {{ $value->user->name}}</td>
                    <td> {{ $value->amount}}</td>
                    <td> {{date('M Y', strtotime( $value->date))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection

