@extends('templates.app')

@section('style')
    {{ url('style/home.css') }}
@endsection


@section('content')
    <main class="bg-secondary w-100 h-100 position-absolute">
        <section>
            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                <h1 class="mt-5">Atendente</h1>
                <div id="buttons-container" class="m-5 w-75 d-flex flex-column">
                    <a class="p-4 mb-5 w-100 btn btn-danger" href={{route('atendente.adicionar')}}>Adicionar</a>
                    <a class="p-4 mb-5 w-100 btn btn-danger" href={{route('atendente.editar')}}>Editar</a>
                    <a class="p-4 w-100 btn btn-danger" href={{route('atendente.excluir')}}>Excluir</a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/home.js')}}
@endsection
