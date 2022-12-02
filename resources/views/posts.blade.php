@extends('layouts.app')

@section('content')
<div class="container text-center">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Dashboard') }}
            </div>
            <div class="card-body">
                {{ __('Groups!') }}
            </div>
        </div>
    </div>
    <div class="col-md-2">
      Column
    </div>
  </div>
</div>
@endsection
