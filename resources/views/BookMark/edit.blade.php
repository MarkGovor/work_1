@extends('layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-4">
            <div class="pull-left">
                <h2>Add new page</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('book-marks.index')}}" title="Go back"> Go back </a>
            </div>
        </div>
    </div>

    <form action="{{route('book-marks.update', ['book_mark' => $mark->id])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <strong>Favicon:</strong>
                    <input type="file" name="favicon" class="form-control-file">
                    @if ($errors->has('favicon'))
                        <span class="text-danger">{{ $errors->first('favicon') }}</span>
                    @endif
                    <img style="width: 50px" src="{{\Illuminate\Support\Facades\Storage::url($mark->favicon)}}" alt="{{$mark->title}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Url:</strong>
                    <input type="text" name="url" value="{{ old('url') ?? $mark->url }}" class="form-control {{($errors->has('url') ? "is-invalid" : "")}}" placeholder="url">
                    @if ($errors->has('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ old('title') ?? $mark->title }}" class="form-control {{($errors->has('title') ? "is-invalid" : "")}}" placeholder="title">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Meta keywords:</strong>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') ?? $mark->meta_keywords }}" class="form-control {{($errors->has('meta_keywords') ? "is-invalid" : "")}}" placeholder="meta keywords">
                    @if ($errors->has('meta_keywords'))
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <strong>Meta description:</strong>
                    <input type="text" name="meta_description" value="{{ old('meta_description') ?? $mark->meta_description }}" class="form-control {{($errors->has('meta_description') ? "is-invalid" : "")}}" placeholder="meta description">
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
