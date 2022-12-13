@extends('layouts.app')

@section('content')
<main>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Post</h5>
                            <p class="card-text">Share</p>
                            <a href="{{route('posts')}}" class="btn btn-primary">Create Posts!</a>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body"">
                            <h5 class="card-title">Change Photo Profile</h5>
                            <p class="card-text">Renew your photo</p>
                            <a href="{{ url('/account/edit') }}" class="btn btn-primary">Change Photo!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row row-cols-1 g-3">
                        @foreach($users as $user)
                            @foreach($user->Posts as $post)
                            <div class="col">
                                <div class="card shadow-sm">
                                    <div class="card-header"  style="background-color: #FFFF75;">
                                        {{$post->title}}
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-text">{{$post->content}}</h6>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <p> <i class="bi bi-chat-dots"></i>
                                                    <button class="btn " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                                                        <x-bi-chat class="text-primary" /> {{count($comments->where('post_id',$post->id))}}
                                                    </button>
                                                </p>
                                            </div>
                                            <small class="text-muted">{{$user->name}}</small>
                                        </div>
                                        <div class="collapse" id="collapseExample{{$post->id}}">
                                            @foreach ($comments as $comentario)
                                                @if ($comentario->post_id == $post->id)
                                                    <h6 class="text-muted">{{ $comentario->User->name }}</h6>
                                                    <div class="row">
                                                        <div class="col-1">
                                                            <picture>
                                                                <img src="/picProfile/{{$comentario->User->pictureProfile}}" class="rounded-circle img-fluid" alt="..." width="40em">
                                                            </picture>
                                                        </div>
                                                        <div class="col-9">   
                                                            <div class="card card-body">
                                                                {{ $comentario->comment }}
                                                            </div>
                                                            <div class="text-muted">
                                                                {{ $comentario->created_at->longAbsoluteDiffForHumans(now()) }}
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <br>
                                                @endif
                                            @endforeach
                                            <form method="POST" action="{{ route('uploadComment') }}" >
                                            @csrf
                                                <div class="form-group">
                                                    <div class="mt-2 row g-3">
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" name="comment" aria-describedby="emailHelp" placeholder="Ingrese su comentario">
                                                        </div>
                                                        <div class="col-2">
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                            <button type="submit" class="btn btn-primary">
                                                                <x-bi-send />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Posted ago: {{ $post->created_at->longAbsoluteDiffForHumans(now()) }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-3">    
                        <div class="card">
                            <img src="{{$animal}}" class="rounded mx-auto d-block" alt="" style="max-height: 10em;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
