@extends('layouts.salesApp')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">{{ __('Select Solution') }}</div>
                 <div class="card-body">
                    <form method="POST" action="{{route('sales.show_questions')}}">
                        @csrf
                        @foreach ($solutions as $solution)
                        <div class="form-check">
                            <input name="solution" value="{{$solution->id}}" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            {{$solution->name}}
                            </label>
                        </div>
                        @endforeach
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Show questions') }}
                                </button>
                            </div>
                        </div>
                    </form>
                   
                    
                </div>
            </div>
        </div>
    </div>
        
   
   

@endsection