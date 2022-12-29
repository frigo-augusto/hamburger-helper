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
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                    <th>Desconto</th>
                </tr>
                @foreach($ingredientes as $i)
                    <tr>
                        <td>{{@$i->id}}</td>
                        <td>{{@$i->name}}</td>
                        <td><button class="open-modal btn btn-warning" data-toggle="modal" data-target="#edit-modal" itemId="{{@$i->id}}">Editar</button></td>
                        <td><button class="open-modal btn btn-danger" data-toggle="modal" data-target="#delete-modal" itemId="{{@$i->id}}">Excluir</button></td>
                    </tr>
                @endforeach
            </table>
        </section>
        <section class= "w-100" id="action-container">
            <button class="open-modal btn btn-success p-3 m-3 final-button" data-toggle="modal" data-target="#new-modal" itemId="{{@$i->id}}">Criar novo ingrediente</button>
        </section>
    </main>

@endsection
<script>
    let url = "{{route('administrador', ":errors")}}"
</script>
@section('script')
    {{ url('js/administrador/ingredientes.js')}}
@endsection
