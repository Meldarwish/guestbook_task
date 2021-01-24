@extends('posts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Body</th>
           {{-- <th>Created by</th>--}}
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }} </td>
                {{--<td>{{ $post->user_id['name'] }}</td>--}}
                @if($post->user_id == Auth::user()->id)
                    <td>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                @else
                    <td>  <a class="btn btn-info" href="{{ route('comments.create') }}">Comment</a></td>
                @endif
            </tr>
        @endforeach
    </table>

    {!! $posts->links() !!}

@endsection