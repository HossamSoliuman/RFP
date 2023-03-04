@extends('layouts.adminApp')
@section('content')
<div class="container">


<h3 class="text-center">Sales members</h3>
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($sales as $i=> $sale)
        <tr>
            <th scope="row">{{$i+1}} </th>
            <td>{{$sale->name}}</td>
            <td>{{$sale->email}}</td>
            <td class="btn-danger btn">  <a  href="{{route('admin.delete_user',['id'=>$sale->id])}}">Delete</a> </td>
          </tr>
        @endforeach  
    </tbody>
  </table>
  <h3 class="text-center">Presales members</h3>
<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Email</th>
        <th scope="col">Solution</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($presales as $i=> $presale)
        <tr>
            <th scope="row">{{$i+1}} </th>
            <td>{{$presale->name}}</td>
            <td>{{$presale->email}}</td>
            <td>{{$presale->solution->name}}</td>
            <td class="btn-danger btn ">  <a  href="{{route('admin.delete_user',['id'=>$sale->id])}}">Delete</a> </td>            
            
          </tr>
        @endforeach  
    </tbody>
  </table>
</div>
@endsection