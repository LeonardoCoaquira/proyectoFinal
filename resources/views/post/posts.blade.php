@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row">
        <div class="row gy-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                            {{ __('Dashboard') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('uploadPicture') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <img src="/picProfile/{{auth()->user()->pictureProfile}}" alt="avatar" class="rounded-circle img-fluid" style="max-width: 3em;">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    ¿Qué nuevas noticias sobre animales traes?
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                            {{ __('Dashboard') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('uploadPicture') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-auto">
                                <img src="/picProfile/{{auth()->user()->pictureProfile}}" srcset="/picProfile/default_icon.png" alt="avatar" class="rounded-circle img-fluid" style="max-width: 3em;">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    ¿Qué nuevas noticias sobre animales traes?
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row gy-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('uploadPost') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="content" class="form-control" placeholder="Content" aria-label="Content" aria-describedby="basic-addon1">
            </div>
            <br>
            <div class="col">
                <button type="submit" class="btn btn-primary">Post!</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
