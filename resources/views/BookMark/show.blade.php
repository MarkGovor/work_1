@extends('layouts')

@section('content')
    <div class="row">
        <div class="col-lg-6 m-auto">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('book-marks.index')}}" title="Go back"> Go back </a>
                </div>
                <br>
                <h2>{{$mark->title}}</h2>
                <img style="width: 50px" src="{{\Illuminate\Support\Facades\Storage::url($mark->favicon)}}" alt="{{$mark->title}}">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Meta keywords: {{$mark->meta_keywords}}</li>
                    <li class="list-group-item">Meta description: {{$mark->meta_description}}</li>
                    <li class="list-group-item">Created at: {{$mark->created_at->format('d.m.Y H:i')}}</li>
                </ul>
        </div>
    </div>

@endsection
