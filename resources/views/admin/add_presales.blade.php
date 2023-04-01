@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Adding new presales') }}</div>
                    @if (!$solutions->count())
                        <div class="card-body">
                            <p class="text-danger">There are no solutions without presales members.</p>
                        </div>
                    @else
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.create_presales') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Title') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">{{ __('User Role') }}</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="presales">Presales Member</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="solution_id" class="form-label">{{ __('Presales Solution') }}</label>
                                    <select id="solution_id" name="solution_id" class="form-control">
                                        @foreach ($solutions as $solution)
                                            <option value="{{$solution->id}}">{{$solution->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('solution_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
