@extends('layouts.adminApp')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Number of questions') }}</div>

            <div class="card-body">
            @if (  !isset($_GET['detected']) )
            
            <form method="GET"  >
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Number of questions') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="number" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="solution" class="col-md-4 col-form-label text-md-end">{{ __('Select solution') }}</label>

                    <div class="col-md-6">
                        <select name="solution" class="form-control">
                            @foreach ($sols as $sol)
                            <option value="{{$sol->id}}">{{$sol->name}}</option>                                  
                            @endforeach
                          </select>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button name="detected" value="1" type="submit" class="btn btn-primary">
                            {{ __('Done') }}
                        </button>
                    </div>
                </div>
            </form> 

                @else
                <form method="POST" action="{{route('admin.store_questionnaire')}}" >

                    @csrf
                    @for ($i = 0; $i < $_GET['number']; $i++)
                    
                        <div class="row mb-4" >
                          <div class="col">
                            <input name="question[{{$i}}]" type="text" class="form-control" placeholder="Question {{$i+1}}">
                          </div>
                          <div class="col">
                            <select class="form-control" name="type[{{$i}}]" id="">
                                <option value="text">text</option>
                                <option value="number">number</option>
                                <option value="dropdown">dropdown</option>
                                <option value="checkbox">checkbox</option>
                                <option value="radio">radio</option>
                                
                            </select>
                          </div>
                          <div class="col">
                            <input name="option[{{$i}}]" type="text" class="form-control" placeholder="options with '-' seperator">
                          </div>
                        </div>
                      @endfor
                      <input type="hidden" name="sol_id" value="{{$_GET['solution']}}">
                      <input type="hidden" name="all_number" value="{{$_GET['number']}}">
                   <button type="submit">Done</button>
                </form>
                
            @endif
        
               
               
              
            </div>
        </div>
    </div>
</div>
   
@endsection