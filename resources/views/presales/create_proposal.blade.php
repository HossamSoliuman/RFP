@extends('layouts.presalesApp')
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
                                  <p> GOSI file </p> 
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
                                  <h6>{{$previous_modf->request_review}} </h6> 
                                  <p>{{$previous_modf->created_at}} </p> 
                              </div>
                              </div>
                            </div>
                          </div>                       
                     </div> 
                        @endif
                    @empty
                        
                    @endforelse
                    <div class="row">
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
                            <form method="POST" enctype="multipart/form-data" action="{{route('presales.store_proposal')}}">
                              @csrf   
                              <input type="hidden" name="ticket_name" value="{{$ticket_name}}">                       
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Upload proposal (must be .pdf )</label>
                                  <input type="file" name="proposal" class="form-control" accept=".pdf">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Comment</label>
                                  <input name="comment" type="text" class="form-control" >
                                </div>                               
                                <button type="submit" class="btn btn-primary">Send</button>                            
                            </form> 
                            @endif
                           
                          </div>
                        </div>
                      </div>
                     
                    
                 </div>
        </div>
    </div>
</div>
@endsection