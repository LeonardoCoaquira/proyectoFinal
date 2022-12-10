@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('uploadPost') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="col-auto">
                            <input class="form-control" type="file" name="picture">
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="button">Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">    
            <div class="card">
                <img src="{{$animal}}" class="rounded mx-auto d-block" alt="" style="max-height: 10em;">
            </div>
        </div>
    </div>
</div>
@endsection
