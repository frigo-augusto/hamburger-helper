@extends('templates.app')

@section('title')
    Administrador - Ingredientes
@endsection

@section('style')
    {{ url('style/administrador/ingredientes.css') }}
@endsection

@section('content')
    <main class="bg-warning w-100 h-100 position-absolute d-flex flex-column align-items-center justify-content-center">
        <div class="w-100" id="return-container">
            <a class="m-3 btn btn-primary" id="return-button" href="{{route('administrador')}}">Voltar</a>
        </div>
        <section class="bg-light w-75 h-75">
            <table class="table table-bordered ml-3">
                <tr>
                    <th class="th-lg">Id</th>
                    <th class="th-lg">Nome</th>
                    <th class="th-lg">Quantidade</th>
                    <th class="th-lg">Editar</th>
                    <th class="th-lg">Excluir</th>
                </tr>
                @foreach($ingredientes as $i)
                    <tr>
                        <td>{{@$i->id}}</td>
                        <td>{{@$i->name}}</td>
                        <td>{{@$i->amount}}</td>
                        <td><button class="open-modal btn btn-warning open-edit-modal" data-toggle="modal" data-target="#edit-modal" itemId="{{@$i->id}}">Editar</button></td>
                        <td><button class="open-modal btn btn-danger open-delete-modal" data-toggle="modal" data-target="#delete-modal" ingredientId="{{@$i->id}}">Excluir</button></td>
                    </tr>
                @endforeach
            </table>
        </section>
        <section class= "w-100" id="action-container">
            <button class="open-modal btn btn-success p-3 m-3 final-button" data-toggle="modal" data-target="#new-modal" itemId="{{@$i->id}}">Criar novo ingrediente</button>
        </section>
    </main>

    @include('administrador.ingredientes-modal')

@endsection
<script>
    let url = "{{route('administrador', ":errors")}}"
    let deleteUrl = "{{route('administrador.excluir-ingredientes')}}"
    let postUrl = "{{route('administrador.criar-ingredientes')}}"
    let ingredientData = {!! json_encode($ingredientes) !!};
</script>
@section('script')
    {{ url('js/administrador/ingredientes.js')}}
@endsection
