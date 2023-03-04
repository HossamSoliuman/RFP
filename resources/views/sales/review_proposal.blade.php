@extends('layouts.salesApp')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">{{ __('Create Proposal') }}</div>
                 <div class="card-body">
                    @forelse ($previous_modfs as $previous_modf)
                        @if ($previous_modf->type=='proposal')
                        <div class="row">
                          <div class="col-sm-6 ">
                            <div class="card">
                              <div class="card-body">                              
                                <div class="m-4">
                                  <p> Proposal file </p> 
                                  <embed src="{{ asset('proposals') }}/{{ $previous_modf->proposal }}"  width="400" height="400">
                                  <p>{{$previous_modf->comment}} </p> 
                                  <p>{{$previous_modf->created_at}} </p> 
                              </div>
                              </div>
                            </div>
                          </div>                       
                     </div>
                        @else
                        <div class="row d-flex justify-content-end">
                          <div class="col-sm-6 ">
                            <div class="card">
                              <div class="card-body">                              
                                <div class="m-4">                                  
                                  <h6>{{$previous_modf->request_review}}</h6> 
                                  <p>{{$previous_modf->created_at}} </p> 
                              </div>
                              </div>
                            </div>
                          </div>                       
                     </div> 
                        @endif
                    @empty
                        
                    @endforelse
                    <div class="row d-flex justify-content-end">
                      <div class="col-sm-6 ">
                        <div class="card">
                          <div class="card-body">
                            @if ($is_closed)
                            <div class="alert alert-danger" role="alert">
                              Closed
                            </div> 
                         
                            @elseif ($is_approved)
                            <div class="alert alert-success" role="alert">
                              Approved
                            </div>  
                            @else
                            <form method="POST" enctype="multipart/form-data" action="{{route('sales.store_review')}}">
                              @csrf   
                              <input type="hidden" name="ticket_name" value="{{$ticket_name}}">                       
                                
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Review</label>
                                  <input name="review" type="text" style="height:50px" class="form-control" >
                                </div>  
                                <div class="">
                                    <button type="submit" class="btn btn-primary">Send</button>                            
                                        
                                    </div>  
                                                      
                            </form> 
                            <div class="card">
                                
                            <div class="d-flex mt-4 justify-content-around"> 
                                  
                                    <div class="">
                                        <form method="POST" action="{{route('sales.approve',['ticket_name'=>$ticket_name])}}">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Approve</button>                                    
                                        </form>
                                    </div>
                                    <div class="">
                                        <form method="POST" action="{{route('sales.close',['ticket_name'=>$ticket_name])}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Close</button>                                                                   
                                        </form>
                                    </div>
                                </div>    
                            </div>   
                           
                          </div>
                            @endif
                           
                          </div>
                        </div>
                      </div>
                     
                    
                 </div>
        </div>
    </div>
</div>
@endsection