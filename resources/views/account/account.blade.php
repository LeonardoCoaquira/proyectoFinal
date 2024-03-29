@extends('layouts.app')

@section('content')
<div class="container">
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-5">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="/picProfile/{{auth()->user()->pictureProfile}}" alt="avatar" class="rounded-circle img-fluid" style="max-width: 150px;">
            <h5 class="my-3">{{auth()->user()->name}}</h5>
          </div>
        </div>
    </div>
      <div class="col-lg-7">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Posts</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{count(auth()->user()->Posts)}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">          
          <a href="{{ url('/account/edit') }}" class="btn btn-secondary">Edit Profile</a>
        </div>
    </div>
  </div>
</section>
</div>
@endsection
