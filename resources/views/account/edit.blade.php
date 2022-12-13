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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pictureModal">
                        Change Photo
                    </button>
                </div>
                
                <p class="card-text">
                      {{auth()->user()->name}}
                </p>
                <div class="card-body">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nameModal">
                        Change Name
                    </button>
                </div>
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
<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Name</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('changeName') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-auto">
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Change</button>
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
