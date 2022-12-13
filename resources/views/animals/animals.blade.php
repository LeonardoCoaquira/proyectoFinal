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
            <div class="row g-3">
                <form action="{{ route('searchAnimal') }}" class="d-flex" role="search" style="max-width: 90%; align-items: center;">
                    <input name="animal" class="form-control me-2" type="search" placeholder="Search an Animal" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <br>
            <div class="row row-cols-sm-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
                @foreach($animals as $animal)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$animal["name"]}}</h5>
                                <p class="card-text">{{$animal["characteristics"]["diet"]}}</p>
                                <p class="card-text">{{$animal["locations"][0]}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</main>

@endsection