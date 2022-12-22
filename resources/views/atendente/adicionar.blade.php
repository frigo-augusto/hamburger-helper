@extends('templates.app')

@section('style')
    {{ url('style/atendente/adicionar.css') }}
@endsection

@section('content')
    <main class="bg-warning w-100 h-100 position-absolute">
        <div class="w-100" id="return-container">
            <a class="m-5 btn btn-primary" id="return-button" href="{{route('home')}}">Voltar</a>
        </div>
        <section class="d-flex flex-row m-4">
            <section class="d-flex flex-column" id="category-container">
                <button class="btn btn-danger p-5 m-3 mt-4 mb-5 category-button">Combo</button>
                <button class="btn btn-danger m-3 p-5 mb-5 category-button">Hambúrguer</button>
                <button class="btn btn-danger m-3 p-5 mb-5 category-button">Bebida</button>
                <button type="button" class="btn btn-danger m-3 p-5 mb-5 category-button">Acompanhamento</button>
            </section>
            <section class="bg-primary bg-gradient m-4 w-100 d-flex flex-column align-items-center justify-content-center">
                <div class="bg-light" id="table-container"></div>
            </section>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/atendente/adicionar.js')}}
@endsection
