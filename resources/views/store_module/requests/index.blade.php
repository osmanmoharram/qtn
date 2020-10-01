@extends('layouts.base')

@section('title', 'Request for Proposals')

@section('content')

    <h1 class="float-left"><i class="fas fa-file-alt mr-3"></i>Request for Proposals</h1>

    <a href="{{ route('requests.create') }}" class="btn btn-primary float-right">New RFP</a>

    <div class="clearfix"></div>

    <hr class="mb-5">

    <table class="table data-table">

        <thead>
            <tr>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($requests as $request)
            <tr>
                <td>
                    <a href="{{ route('requests.edit', $request->id) }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['requests.destroy', $request->id], 'class' => 'd-inline' ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endsection
