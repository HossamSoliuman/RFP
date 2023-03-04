@extends('layouts.adminApp')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">{{ __(' Proposal history') }}</div>
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
                            @endif
                                                   
                         </div>
                        </div>
                      </div>
                     
                    
                 </div>
        </div>
    </div>
</div>
@endsection