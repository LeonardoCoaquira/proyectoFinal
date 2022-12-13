@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-6">
            <div class="card">
                <br>
              <div class="card-img-top">
                <img src="/picProfile/{{auth()->user()->pictureProfile}}" class="rounded-circle img-fluid" style="max-width: 150px;" alt="...">
              </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Change Photo
                    </button>
                </div>
                <ul class="list-group">
                    <a class="list-group-item">{{auth()->user()->name}}</li>
                    <li class="list-group-item">{{auth()->user()->pictureProfile }}</li>
                    <li class="list-group-item">{{auth()->user()->description}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ url('/account') }}" class="btn btn-primary">Account</a>
                </div>
            </div>
        </div>
        <div class="col">
        </div>
        
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Picture</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('uploadPicture') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-auto">
                    <input class="form-control" type="file" name="picture">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection
