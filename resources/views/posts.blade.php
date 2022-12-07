@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="container">
            <form style="font-size: 1em;"  method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <label for="staticEmail2">Subir libro</label>
                {{-- Autor --}}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Autor</label>
                    <input style="font-size:0.8em;" type="text" class="form-control" name="autor" placeholder="Ingrese el nombre del Autor">
                </div>
                {{-- Nombre del libro --}}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre del libro</label>
                    <input style="font-size:0.8em;" type="text" class="form-control" name="nomlibro" placeholder="Ingrese el nombre del libro">
                </div>
                {{-- Ruta de descarga --}}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ruta de descarga</label>
                    <input style="font-size:0.8em;" type="text" class="form-control" name="rutadescarga" placeholder="Link para descargar libro">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Descripcion</label>
                    <input style="font-size:0.8em;" type="text" class="form-control" name="descripcion" placeholder="Agregue una descripcion">
                </div>
                {{-- Subir Portada --}}
                <div class="col-auto">
                    <input style="font-size:0.8em;" class="form-control" type="file" name="foto">
                </div>
                {{-- Boton para subir los datos  --}}
                <div class="col-auto">
                    <button style="font-size: 0.8em;" type="submit" class="btn btn-primary mb-3">Subir</button>
                </div>
            </form>
        </div>
    </div>
<br>   
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
            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
            </div>
        </div>
  </div>
</div>
@endsection
