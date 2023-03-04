@extends('layouts.adminApp')
@section('content')
    <div class="container">
        
        <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ticket name</th>
                <th scope="col">Sales member title</th>
                <th scope="col">Presales title</th>
                <th scope="col">Request info</th>
                <th scope="col">Proposal</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6"><h3 class="text-center">Waiting</h3></td>
                </tr>
                @foreach ($waitings as $i=> $waiting)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$waiting->ticket_name}}</td>
                    <td>{{$waiting->sales->name}}</td>
                    <td>{{$waiting->presales->name}}</td>
                    <td> <a href="{{route('admin.request_details',['ticket_name'=>$waiting->ticket_name])}}">Show request info</a> </td>
                    <td><a href="{{route('admin.show_proposal',['ticket_name'=>$waiting->ticket_name])}}">Show proposal</a></td>
                    <td>
                        <div class=" alert-warning" role="alert">
                              Waiting
                        </div>  
                    </td>
                  </tr>
                @endforeach
                <tr>       
                    <td colspan="6">{!! $waitings->links() !!}</td>
               </tr>
                <tr>
                    <td colspan="6"><h3 class="text-center">Pending</h3></td>
                </tr>
                @foreach ($pendings as $i=> $pending)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$pending->ticket_name}}</td>
                    <td>{{$pending->sales->name}}</td>
                    <td>{{$pending->presales->name}}</td>
                    <td> <a href="{{route('admin.request_details',['ticket_name'=>$pending->ticket_name])}}">Show request info</a> </td>
                    <td><a href="{{route('admin.show_proposal',['ticket_name'=>$pending->ticket_name])}}">Show proposal</a></td>
                    <td>
                        <div class=" alert-primary" role="alert">
                              Pending
                        </div>  
                    </td>
                  </tr>
                @endforeach 
                <tr>       
                    <td colspan="6">{!! $pendings->links() !!}</td>
               </tr>
                <tr>
                    <td colspan="6"><h3 class="text-center">approved</h3></td>
                </tr> 
                @foreach ($approveds as $i=> $approved)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$approved->ticket_name}}</td>
                    <td>{{$approved->sales->name}}</td>
                    <td>{{$approved->presales->name}}</td>
                    <td> <a href="{{route('admin.request_details',['ticket_name'=>$approved->ticket_name])}}">Show request info</a> </td>
                    <td><a href="{{route('admin.show_proposal',['ticket_name'=>$approved->ticket_name])}}">Show proposal</a></td>
                    <td>
                        <div class=" alert-success" role="alert">
                              Approved
                        </div>  
                    </td>
                  </tr>
                @endforeach
                <tr>       
                     <td colspan="6">{!! $approveds->links() !!}</td>
                </tr>
                <tr>
                    <td colspan="6"><h3 class="text-center">closed</h3></td>
                </tr>  
                @foreach ($closeds as $i=> $closed)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$closed->ticket_name}}</td>
                    <td>{{$closed->sales->name}}</td>
                    <td>{{$closed->presales->name}}</td>
                    <td> <a href="{{route('admin.request_details',['ticket_name'=>$closed->ticket_name])}}">Show request info</a> </td>
                    <td><a href="{{route('admin.show_proposal',['ticket_name'=>$closed->ticket_name])}}">Show proposal</a></td>
                    <td>
                        <div class=" alert-danger" role="alert">
                             closed
                         </div>  
                    </td>
                  </tr>
                @endforeach   
                <tr>       
                    <td colspan="6">{!! $closeds->links() !!}</td>
               </tr>   
            </tbody>
          </table>

        
    </div>
@endsection