@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}
                    </a> posted {{ $thread->title }}
                </div>
                <div class="card-body">
                    <article>
                        <div class="body">{{ $thread->body }}</div>
                    </article>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card-header mb-2">Replies</div>
            @foreach($thread->replies as $reply)
                @include('thread.reply')
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        @if(auth()->check())
        <div class="col-md-8 mb-5">
            <form method="POST" action="/threads/{{ $thread->channel->slug }}/{{ $thread->id }}/reply">
                @csrf
                <div class="form-group">
                    <label for="body">Reply</label>
                    <textarea type="text" class="form-control" id="body" name="body" placeholder="Comment here..." rows='5'></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
            </form>
        </div>
    </div>
    @else
    <div>
        <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in the discussion</p>
    </div>
    @endif
</div>
@endsection
