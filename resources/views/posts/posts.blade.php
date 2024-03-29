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
        <div class="card-body">
            <div class="card-body">

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nameModal">
                        Upload New Post
                    </button>
            </div>
            <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($users->Posts as $post)
                <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                {{$post->title}}
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$post->content}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="col-auto">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deltePost">
                                        Delete
                                    </button>
                                </div>    
                                    <small class="text-muted">{{$post->created_at}}</small>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                            <div class="btn-group">
                                <p> <i class="bi bi-chat-dots">Comments: </i>
                                    <button class="btn " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        <x-bi-chat class="text-primary"/>  {{count($comments->where('post_id',$post->id))}}
                                    </button>
                                </p>
                            </div>
                                <div class="collapse" id="collapseExample{{$post->id}}">
                                    @foreach ($comments as $comentario)
                                        @if ($comentario->post_id == $post->id)
                                            <h6 class="text-muted">{{ $comentario->User->name }}</h6>
                                            <div class="row">
                                                <div class="col-2">
                                                    <picture>
                                                        <img src="/picProfile/{{$comentario->User->pictureProfile}}" class="rounded-circle img-fluid" alt="..." width="50em">
                                                    </picture>
                                                </div>
                                                <div class="col-10">   
                                                    <div class="card card-body">
                                                        {{ $comentario->comment }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deltePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('deletePost') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="modal-body">
                                <p>Are you sure to delete this post?.</p>
                                <input type="hidden" name="id_post" value="{{$post->id}}">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Upload a Post</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('uploadPost') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Agregue una descripcion">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input type="text" class="form-control" name="content" placeholder="Agregue una descripcion">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Upload</button>
                    </div>
                </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>


</main>

@endsection