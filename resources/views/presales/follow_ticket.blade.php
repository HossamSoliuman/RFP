@extends('layouts.presalesApp')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Ticket name</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $i=> $ticket)
        <tr>
            <th scope="row">{{$i+1}}</th>
            <td> <a href=" {{route('prsales.create_proposal',['ticket_name'=>$ticket->ticket_name])}}">{{$ticket->ticket_name}}</a> </td>
            <td>
                @if ($ticket->ticket_status==0)
                <p style="color:brown">Presales didnot review it yet</p>
                @endif
                @if ($ticket->ticket_status==1)
                <p style="color:rgb(165, 155, 42)">In reviewing</p>
                
                @endif
                @if ($ticket->ticket_status==2)
                <p style="color:rgb(42, 165, 95)">Approved</p>
                @endif
                @if ($ticket->ticket_status==-1)
                <p style="color:rgb(193, 46, 14)">Closed</p>
                @endif
                
            </td>
           
          </tr>
        @endforeach
    </tbody>
  </table> 
  {!! $tickets->links() !!}

@endsection