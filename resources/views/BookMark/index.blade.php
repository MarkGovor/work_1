@extends('layouts')

@section('content')

    <div class="row pl-3 pr-3">
        <a class="btn btn-success" href="{{route('book-marks.export')}}">Export to excel</a>
    </div>

    {{ $table }}

@endsection

