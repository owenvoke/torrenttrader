@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-2">
        @if (!$torrents->isEmpty())
            @include('torrents._table')
        @endif
    </div>
@endsection