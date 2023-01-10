@extends('templates.app')

@section('title')
    Atendente
@endsection

@section('style')
    {{ url('style/atendente/main.css') }}
@endsection


@section('content')
    <main class="bg-secondary w-100 h-100 position-absolute text-align-center">
        <div class="d-flex flex-row">
            @if(isset($errors))
                @if($errors == "false")
                    <div class="alert alert-success m-4 w-75" role="alert">
                        Operação feita com sucesso!
                    </div>
                @else
                    <div class="alert alert-danger m-4" role="alert">
                        Operação não realizada.
                    </div>
                @endif
            @endif
            <div class="w-100" id="return-container">
                <a class="m-5 btn btn-primary" id="return-button" href="{{route('home')}}">Voltar</a>
            </div>
        </div>
        <div>
            <section class="bg-warning">
                <div class="d-flex flex-column align-items-center justify-content-center h-100">
                    <h1 class="mt-5">Atendente</h1>
                    <div id="buttons-container" class="m-5 w-75 d-flex flex-column">
                        <a class="p-4 mb-5 w-100 btn btn-danger" href={{route('atendente.adicionar')}}>Adicionar</a>
                        <a class="p-4 w-100 btn btn-danger" href={{route('atendente.excluir')}}>Excluir</a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
