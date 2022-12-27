@extends('templates.app')

@section('title')
    Hamburger helper
@endsection

@section('style')
    {{ url('style/home.css') }}
@endsection


@section('content')
  <main class="bg-secondary w-100 h-100 position-absolute">
    <section class="bg-warning">
        <div class="d-flex flex-column align-items-center justify-content-center h-100">
            <h1 class="mt-5">Hamburger Helper</h1>
            <div id="buttons-container" class="m-5 w-75 d-flex flex-column">
                <a class="p-4 mb-4 w-100 btn btn-danger" href={{route('atendente')}}>Atendente</a>
                <a class="p-4 mb-4 w-100 btn btn-danger" href={{route('cozinheiro')}}>Cozinheiro</a>
                <a class="p-4 w-100 btn btn-danger" href={{route('caixa')}}>Caixa</a>
            </div>
        </div>
    </section>
  </main>
@endsection

@section('script')
    {{ url('js/home.js')}}
@endsection
