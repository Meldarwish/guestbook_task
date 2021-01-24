@extends('posts.layout')

{{--
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Comment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="body"></textarea>
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{ Auth::user()->id}}">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection--}}
<h3>Comments</h3>
@if (Auth::check())

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="body"></textarea>
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endif
@forelse ($post->comments as $comment)
    <p>{{ $comment->user->name }} {{$comment->created_at}}</p>
    <p>{{ $comment->body }}</p>
    <hr>
@empty
    <p>This post has no comments</p>
@endforelse
