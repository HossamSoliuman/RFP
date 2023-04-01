@extends('layouts.adminApp')

@section('content')
<div class="container">

    <h1>Request Details</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($request_answers as $i => $request_answer)
                <tr>
                    <td>{{ $request_answer->question }}</td>
                    <td>{{ $request_answer->answer }}</td>
                </tr>
            @endforeach
            <tr>
                <td>Company name</td>
                <td>{{ $request->cname }}</td>
            </tr>
            <tr>
                <td>Company phone</td>
                <td>{{ $request->cphone }}</td>
            </tr>
            <tr>
                <td>Company email</td>
                <td>{{ $request->cemail }}</td>
            </tr>
            <tr>
                <td>Company address</td>
                <td>{{ $request->caddress }}</td>
            </tr>
            <tr>
                <td>Person name</td>
                <td>{{ $request->pname }}</td>
            </tr>
            <tr>
                <td>Person title</td>
                <td>{{ $request->ptitle }}</td>
            </tr>
            <tr>
                <td>Person email</td>
                <td>{{ $request->pemail }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $request->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6">
            <h2>CR File</h2>
            <embed src="{{ asset('sales/cr') }}/{{ $request->cr }}" width="100%" height="600">
        </div>
        <div class="col-md-6">
            <h2>GOSI File</h2>
            <embed src="{{ asset('sales/gosi') }}/{{ $request->gosi }}" width="100%" height="600">
        </div>
    </div>

</div>
@endsection

@section('styles')
<style>
    table {
        margin-top: 2rem;
        margin-bottom: 2rem;
    }
    th {
        background-color: #f5f5f5;
        font-weight: bold;
    }
</style>
@endsection