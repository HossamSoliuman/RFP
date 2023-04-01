
@extends('layouts.salesApp')
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
        @foreach ($tickets as $i => $ticket)
        <tr>
            <th scope="row">{{$i+1}}</th>
            <td> <a href=" {{route('prsales.create_proposal',['ticket_name'=>$ticket->ticket_name])}}">{{$ticket->ticket_name}}</a> </td>
            <td>
                @if ($ticket->ticket_status==0)
                <span class="btn btn-warning">Presales did not review it yet</span>
                @endif
                @if ($ticket->ticket_status==1)
                <span class="btn btn-primary">In reviewing</span>
                @endif
                @if ($ticket->ticket_status==2)
                <span class=" btn btn-success">Approved</span>
                @endif
                @if ($ticket->ticket_status==-1)
                <span class="btn btn-danger">Closed</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 
{!! $tickets->links() !!}
@endsection
