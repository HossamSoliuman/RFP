@extends('layouts.adminApp')
@section('content')
<div class="container">

her
<table class="table">
    <thead>
      <tr>
        
        <th scope="col">Question</th>
        <th scope="col">======></th>
        <th scope="col">Answer</th>
        
      </tr>
    </thead>
    <tbody>
      
        @forelse ($request_answers as $i=> $request_answer)
            <tr>            
                <td>{{$request_answer->question}}</td>
                <td>======></td>
                <td>{{$request_answer->answer}}</td>            
             </tr>
         @empty         
         @endforelse    
         <tr>
            <td>Company name</td>
            <td>======></td>
            <td> {{$request->cname}} </td>
        </tr> 
        <tr>
            <td>Company phone</td>
            <td>======></td>
            <td> {{$request->cphone}}  </td>
        </tr> 
        <tr>
            <td>Company email</td>
            <td>======></td>
            <td> {{$request->cemail}}  </td>
        </tr> 
        <tr>
            <td>Company address</td>
            <td>======></td>
            <td> {{$request->caddress}}  </td>
        </tr> 
        <tr>
            <td>Person name </td>
            <td>======></td>
            <td> {{$request->pname}}  </td>
        </tr> 
        <tr>
            <td>Person title</td>
            <td>======></td>
            <td> {{$request->ptitle}}  </td>
        </tr> 
        <tr>
            <td>Person email</td>
            <td>======></td>
            <td> {{$request->pemail}}  </td>
        </tr> 
        <tr>
    
            <td>Created at</td>
            <td>======></td>
            <td> {{$request->created_at}} </td>
        </tr> 
        <tr>
            <td></td>
            <td>======></td>
            <td></td>
        </tr> 
        
    </tbody>
  </table>
  <div class="d-flex">
    <div class="m-4">
        <p>CR file</p>
        <embed src="{{ asset('sales/cr') }}/{{ $request->cr }}"  width="400" height="400">
    </div>
    <div class="m-4">
        <p> GOSI file </p> 
        <embed src="{{ asset('sales/gosi') }}/{{ $request->gosi }}"  width="400" height="400">
    </div>
  </div>
  
</div>
@endsection