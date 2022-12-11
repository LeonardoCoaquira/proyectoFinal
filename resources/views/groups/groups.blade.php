@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Groups!') }}
                </div>
            </div>
        </div>
        <div class="col-md-2">    
            <div class="card" style="width: 12rem;">
                <div class="card-body">
                    <h5 class="card-title">Group News</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <br>
            <div class="card" style="width: 12rem;">
                <div class="card-body">
                    <h5 class="card-title">Create Groups</h5>
                    <p class="card-text">Make group to invite your friends</p>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create
                    </button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Group</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('createGroup') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="description" class="form-control" placeholder="Content" aria-label="Content" aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group mb-3">
                <input name="picture" class="form-control" type="file" id="formFile">
            </div>
            <div class="input-group mb-3">
                <label for="exampleColorInput" class="form-label">Font Color</label>
                <input name="bgColor" type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
            </div>
            <br>
            <div class="col">
                <button type="submit" class="btn btn-primary">Create!</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
