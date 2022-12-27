@extends('templates.app')

@section('title')
    Admnistrador - Produtos
@endsection

@section('style')
    {{ url('style/admnistrador/produtos.css') }}
@endsection

@section('content')
    <main class="bg-warning w-100 h-100 position-absolute d-flex flex-column align-items-center justify-content-center">
        <div class="w-100" id="return-container">
            <a class="m-3 btn btn-primary" id="return-button" href="{{route('admnistrador')}}">Voltar</a>
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
                @foreach($produtos as $p)
                <tr>
                    <td>{{@$p->id}}</td>
                    <td>{{@$p->name}}</td>
                    <td><button>Editar</button></td>
                    <td><button>Excluir</button></td>
                    <td><button>Desconto</button></td>
                </tr>
                @endforeach
            </table>
        </section>
        <section class= "w-100" id="action-container">
            <button type='submit' class="btn btn-success p-4 m-3 final-button">Criar novo produto</button>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/admnistrador/produtos.js')}}
@endsection
