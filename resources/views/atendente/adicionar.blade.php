@extends('templates.app')

@section('title')
    Atendente - Adicionar
@endsection

@section('style')
    {{ url('style/atendente/adicionar.css') }}
@endsection

@section('content')
    <main class="bg-warning w-100 h-100 position-absolute">
        <div class="w-100" id="return-container">
            <a class="m-5 btn btn-primary" id="return-button" href="{{route('home')}}">Voltar</a>
        </div>
        <section class="d-flex flex-row m-1">
            <section class="d-flex flex-column" id="category-container">
                <button class="btn btn-danger m-3 p-5 mb-5 mt-4 category-button" id="combo-button">Combo</button>
                <button class="btn btn-danger m-3 p-5 mb-5 category-button" id="hamburger-button">Pedido</button>
            </section>
            <section class="bg-primary bg-gradient m-4 w-100 d-flex flex-column align-items-center justify-content-center">
                <form method="POST" action="{{route('submit-order')}}" class="bg-light m-4" id="table-form">
                    <table class="table table-bordered order-table" id="combo-table">
                        <tr>
                            <th>Check</th>
                            <th>Id</th>
                            <th>Nome</th>
                        </tr>
                        @foreach($combo as $c)
                            <tr>
                                <td><input type="number" order-id="{{@$c->id}}" name="combo{{@$c->id}}" origin="combo"/></td>
                                <td>{{@$c->id}}</td>
                                <td>{{@$c->name}}</td>
                            </tr>
                        @endforeach
                    </table>

                    <table class="table table-bordered order-table" id="hamburger-table">
                        <tr>
                            <th>Quantidade</th>
                            <th>Id</th>
                            <th>Nome</th>
                        </tr>
                        @foreach($item as $i)
                            <tr>
                                <td><input type="number" order-id="{{@$i->id}}" name="hamburger{{@$i->id}}" origin="item"/></td>
                                <td>{{@$i->id}}</td>
                                <td>{{@$i->name}}</td>
                            </tr>
                        @endforeach
                    </table>
                </form>
            </section>
        </section>
        <section class= "m-5" id="action-container">
            <a class="btn btn-danger p-4 final-button" href="{{route('atendente')}}">Cancelar</a>
            <button type='submit' form="table-form" class="btn btn-success p-4 final-button" id="submit-orders">Confirmar</button>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/atendente/adicionar.js')}}
@endsection
<script>
    let atendenteUrl = '{{route('atendente', ":errors")}}';
</script>
