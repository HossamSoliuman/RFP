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
                                <div class="col-sm-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="m-4">
                                                <p class="card-text">Proposal file</p>
                                                <embed src="{{ asset('proposals') }}/{{ $previous_modf->proposal }}"  width="400" height="400">
                                                <p class="card-text mt-3">{{$previous_modf->comment}}</p>
                                                <p class="card-text"><small class="text-muted">{{$previous_modf->created_at}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row d-flex justify-content-end">
                                <div class="col-sm-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="m-4">
                                                <h6 class="card-title">{{$previous_modf->request_review}}</h6>
                                                <p class="card-text"><small class="text-muted">{{$previous_modf->created_at}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                    <div class="row d-flex justify-content-end">
                        <div class="col-sm-6">
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
                                                <textarea name="review" class="form-control" style="height: 100px;"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div>
                                        </form>
                                        <div class="card mt-4">
                                            <div class="card-body d-flex justify-content-between">
                                                <form method="POST" action="{{route('sales.approve',['ticket_name'=>$ticket_name])}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                </form>
                                                <form method="POST" action="{{route('sales.close',['ticket_name'=>$ticket_name])}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Close</button>
                                                </form>
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
    </div>
@endsection


