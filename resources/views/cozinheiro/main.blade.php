@extends('templates.app')
@section('title')
    Cozinheiro
@endsection
@section('style')
    {{ url('style/atendente/excluir.css') }}
@endsection


@section('content')
    <main class="bg-warning w-100 h-100 position-absolute">
        @if(isset($errors))
            @if($errors == "false")
                <div class="alert alert-success m-4 w-75" role="alert">
                    Operação realizada com sucesso!
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
        <section class="m-4 w-100 d-flex flex-column align-items-center justify-content-center">
            <form method="POST" action="{{route('finalizar-order')}}" class="bg-light" id="delete-form">
                @foreach ($pedidos as $p)
                    <div class="d-flex flex-column m-3">
                        <div class="d-flex flex-row">
                            <input type="checkbox" class="mr-5" name="pedido{{@$p->id}}" id="{{@$p->id}}" />
                            <div class="ml-3">
                                Código: {{@$p->id}}
                            </div>
                        </div>
                        Descrição:
                        @if (isset($p->item))
                        <div>
                            @foreach ($p->item as $i)
                                Nome: {{@$i->nome}}, Quantidade: {{@$i->quantidade}}
                            @endforeach
                        </div>
                        @endif
                        @if (isset($p->combo))
                            <div>
                                @foreach ($p->combo as $c)
                                    Nome: {{@$c->nome}}, Quantidade: {{@$c->quantidade}}
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </form>
        </section>
        <section class= "m-5" id="action-container">
            <a class="btn btn-danger p-4 final-button" href="{{route('caixa')}}">Cancelar</a>
            <button type='submit' form="delete-form" class="btn btn-success p-4 final-button" id="submit-orders">Efetuar entrega</button>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/atendente/excluir.js')}}
@endsection
<script>
    let atendenteUrl = '{{route('cozinheiro', ":errors")}}';
</script>
