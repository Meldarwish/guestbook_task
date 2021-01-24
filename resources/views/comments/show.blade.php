
@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@php

    $comments=App\Comment::where(['post_id' => $post->id])->get();
@endphp
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p> title :<b>{{  $post->title  }}</b></p>
                        <p>
                            Body:
                            {{ $post->body }}
                        </p>
                        <hr />
                        <h4>Comments</h4>
                                               @foreach($comments as $comment)
                            <div class="display-comment">
                                <strong>{{ $comment->user->name }}</strong>
                                <p>{{ $comment->body }}</p>

                            </div>
                        @endforeach
                        <hr />
                        <h4>Add comment</h4>
                        <form method="post" action="{{ route('comments.store',$post->id) }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="body" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection