@extends('layouts.adminApp')
@section('content')
<div class="container">

    <h3 class="text-center mb-4">Sales members</h3>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $i => $sale)
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$sale->name}}</td>
                <td>{{$sale->email}}</td>
                <td>
                    <a href="{{route('admin.delete_user',['id'=>$sale->id])}}"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-center mt-5 mb-4">Presales members</h3>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Solution</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presales as $i => $presale)
            <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$presale->name}}</td>
                <td>{{$presale->email}}</td>
                <td>{{$presale->solution->name}}</td>
                <td>
                    <a href="{{route('admin.delete_user',['id'=>$presale->id])}}"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
