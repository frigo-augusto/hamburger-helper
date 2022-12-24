@extends('templates.app')

@section('style')
    {{ url('style/atendente/excluir.css') }}
@endsection

<style>

</style>


@section('content')
    <main class="bg-warning w-100 h-100 position-absolute">
        <div class="w-100" id="return-container">
            <a class="m-5 btn btn-primary" id="return-button" href="{{route('home')}}">Voltar</a>
        </div>
        <section class="m-4 w-100 d-flex flex-column align-items-center justify-content-center">
            <form method="POST" action="{{route('delete-order')}}" class="bg-light" id="delete-form">
                @foreach ($pedidos as $p)
                    <div class="d-flex flex-column m-3">
                        <div class="d-flex flex-row">
                            <input type="checkbox" class="mr-5" name="pedido{{@$p->id}}" id="{{@$p->id}}" />
                            <div class="ml-3">
                                Código: {{@$p->id}}
                            </div>
                        </div>
                        <div>
                            Descrição:
                            @foreach ($p->item as $i)
                                {{@$i->nome}},
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </form>
        </section>
        <section class= "m-5" id="action-container">
            <a class="btn btn-danger p-4 final-button" href="{{route('atendente')}}">Cancelar</a>
            <button type='submit' form="delete-form" class="btn btn-success p-4 final-button" id="submit-orders">Confirmar</button>
        </section>
    </main>
@endsection

@section('script')
    {{ url('js/atendente/excluir.js')}}
@endsection
<script>
    let atendenteUrl = '{{route('atendente', ":errors")}}';
</script>
