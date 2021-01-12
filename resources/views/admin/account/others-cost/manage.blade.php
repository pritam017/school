
@extends('admin.app')
@section('title', 'Manage Others Cost')
@section('content')
<div class="container">
    <div class="card-header">
        <h3>All Others Cost <a href="{{ route('othersCost.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i> Add Others Cost</a></h3>
    </div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allData as $key =>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                    <td>{{ $value->amount }}</td>
                    <td>{{ $value->description }}</td>
                    <td>
                        <img src="{{ (!empty($value->image))?asset('uploads/cost_images/'.$value->image):asset('uploads/default.jpg') }}" width="90px" height="60px" alt="">
                    </td>
                    <td>
                        <div class="btn-group">
                         <a title="Edit" href="{{ route('othersCost.edit', $value->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection

