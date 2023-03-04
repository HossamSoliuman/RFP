@extends('layouts.salesApp')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">{{ __('Ticket name : ').$ticket_name}}</div>
                 <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('sales.make_request')}}">
                       @csrf
                       <input type="hidden" name="number_of_questions" value="{{count($questions)}}">
                       <input type="hidden" name="presales_id" value="{{$presales_id}}">
                       <input type="hidden" name="sales_id" value="{{$sales_id}}">
                       <h3>Customized questions</h3>
                       @foreach ($questions as $index=>$question)
                       {{-- checkbox  --}}
                     

                       @if ($question->answer_type=='checkbox') 
                       <hr>                     
                       <div class="col-xs-4">
                        <label for="vehicle1"> {{$question->question}}</label><br>
                        <input type="hidden" name="question[{{$index}}]" value="{{$question->question}}">
                        @foreach ($question->option as $x=> $option)
                        <input required type="checkbox" id="vehicle1" name="answer[{{$index}}][{{$x}}]" value="{{$option->name}}">
                        <label for="vehicle1"> {{$option->name}}</label><br>
                        @endforeach                     
                      </div>                    
                       @endif
                       {{-- number  --}}
                     

                       @if ($question->answer_type=='number')                      
                       <div class="col-xs-4">
                        <label for="ex3">{{$question->question}}</label>
                        <input type="hidden" name="question[{{$index}}]" value="{{$question->question}}">
                        <input required name="answer[{{$index}}]" value=""  class="form-control mb-4" style="height:50px" id="ex3" type="number">
                      </div>                    
                       @endif
                       {{-- text  --}}
                     

                       @if ($question->answer_type=='text')                      
                       <div class="col-xs-4">
                        <label for="ex3">{{$question->question}}</label>
                        <input type="hidden" name="question[{{$index}}]" value="{{$question->question}}">
                        <input required name="answer[{{$index}}]"   class="form-control mb-4" style="height:50px" id="ex3" type="text">
                      </div>                    
                       @endif
                       {{-- dropdown  --}}

                       @if ($question->answer_type=='dropdown')
                     <hr>

                       <label for="ex3">{{$question->question}}</label>
                        <input type="hidden" name="question[{{$index}}]" value="{{$question->question}}">
                       <select name="answer[{{$index}}]" class="form-select" aria-label="Default select example">
                        @foreach ($question->option as $option)
                        <option value="{{$option->name}}">{{$option->name}}</option>
                        @endforeach                      
                      </select>
                       @endif
                       {{-- radio  --}}

                       @if ($question->answer_type=='radio')
                     <hr>

                       <label for="ex3">{{$question->question}}</label><br>
                       <input type="hidden" name="question[{{$index}}]" value="{{$question->question}}">
                       @foreach ($question->option as $option)
                       <input required type="radio" id="html" name="answer[{{$index}}]" value="{{$option->name}}">
                       <label for="html">{{$option->name}}</label><br>
                       @endforeach
                       @endif
                    
                       @endforeach

                     {{-- company informations --}}
                     <hr>
                     <hr>
                     <h3> Company informations</h3>
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Company name</label>
                        <input required class="form-control mb-4" type="text" name="cname" >
                      </div>  
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Company phone</label>
                        <input required class="form-control mb-4" type="text" name="cphone" >
                      </div>  
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Company offical email address</label>
                        <input required class="form-control mb-4" type="email" name="cemail" >
                      </div>  
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Company address </label>
                        <input required class="form-control mb-4" type="text" name="caddress" >
                      </div>  
                      {{-- Authorized personal information  --}}
                     <hr>
                     <hr>
                      <h3>Authorized personal information</h3>
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Person Name</label>
                        <input required class="form-control mb-4" type="text" name="pname" >
                      </div>  
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Person title</label>
                        <input required class="form-control mb-4" type="text" name="ptitle" >
                      </div>  
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">Person email address</label>
                        <input required class="form-control mb-4" type="email" name="pemail" >
                      </div>  
                      {{-- files --}}
                     <hr>
                     <hr>
                      <h3>Attached files</h3>
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">CR file</label>
                        <input required class="form-control mb-4" accept=".pdf" type="file" name="cr" >
                      </div>
                      <div class="col-xs-4 mb-4">
                        <label for="ex3">GOSI file</label>
                        <input required class="form-control mb-4" type="file" accept=".pdf" name="gosi" >
                      </div>  
                      <input required type="hidden" name="ticket_name" value="{{$ticket_name}}">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Make Request') }}
                                </button>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
        
   
   

@endsection