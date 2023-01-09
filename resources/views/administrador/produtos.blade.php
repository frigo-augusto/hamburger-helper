@extends('templates.app')

@section('title')
    Administrador - Produtos
@endsection

@section('style')
    {{ url('style/administrador/produtos.css') }}
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
                    <th class="th-lg">Editar</th>
                    <th class="th-lg">Excluir</th>
                </tr>
                @foreach($produtos as $p)
                    <tr>
                        <td>{{@$p->id}}</td>
                        <td>{{@$p->name}}</td>
                        <td><button class="open-modal btn btn-warning edit-button" data-toggle="modal" data-target="#edit-modal" itemId="{{@$p->id}}">Editar</button></td>
                        <td><button class="open-modal btn btn-danger open-delete-modal" data-toggle="modal" data-target="#delete-modal" productId="{{@$p->id}}">Excluir</button></td>
                    </tr>
                @endforeach
            </table>
        </section>
        <section class= "w-100" id="action-container">
            <button class="open-modal btn btn-success p-3 m-3 final-button" data-toggle="modal" data-target="#new-modal" itemId="{{@$p->id}}">Criar novo produto</button>
        </section>
    </main>

    @include('administrador.produtos-modal')


@endsection
<script>
    let url = "{{route('administrador', ":errors")}}"
    let deleteUrl = "{{route('administrador.excluir-produtos')}}"
    let productData = {!! json_encode($produtos) !!};
    console.log(productData);
</script>
@section('script')
    {{ url('js/administrador/produtos.js')}}
@endsection
