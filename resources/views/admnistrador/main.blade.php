@extends('templates.app')

@section('title')
    Admnistrador
@endsection

@section('style')
    {{ url('style/admnistrador/main.css') }}
@endsection


@section('content')
  <main class="bg-secondary w-100 h-100 position-absolute">
    <section class="bg-warning">
        <div class="d-flex flex-column align-items-center justify-content-center h-100">
            <h1 class="mt-5">Gerenciar Restaurante</h1>
            <div id="buttons-container" class="m-5 w-75 d-flex flex-column align-items-center justify-content-center">
                <a class="p-4 mb-4 w-50 btn btn-danger" href={{route('administrador.produtos')}}>Produtos</a>
                <a class="p-4 mb-4 w-50 btn btn-danger">Combos</a>
                <a class="p-4 w-50 btn btn-danger">Ingredientes</a>
            </div>
        </div>
    </section>
  </main>
@endsection

@section('script')
    {{ url('js/admnistrador/main.js')}}
@endsection
