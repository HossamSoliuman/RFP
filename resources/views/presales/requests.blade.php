@extends('layouts.presalesApp')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ticket name</th>
        <th scope="col">Sales team member title</th>
        <th scope="col">Contact</th>
        <th scope="col">Request date</th>
        <th scope="col">Request details</th>
      </tr>
    </thead>
    <tbody>
       
        @forelse ($requests as $i=> $request)
        <tr>
            <th scope="row">{{$i+1}}</th>
            <td>{{$request->ticket_name}}</td>
            <td>{{$request->sales->name}}</td>
            <td>{{$request->sales->email}}</td>
            <td>{{$request->request->created_at}}</td>
            <td> <a href="{{route('presales.request_details',['ticket_name'=>$request->ticket_name])}}">show details</a></td>
          </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">You have no requests at this time</td>
           
        </tr>
          @endforelse
     
      
    </tbody>
  </table>
@endsection