@extends('templates.app')

@section('title')
    Administrador - Combos
@endsection

@section('style')
    {{ url('style/administrador/combos.css') }}
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
                @foreach($combos as $c)
                    <tr>
                        <td>{{@$c->id}}</td>
                        <td>{{@$c->name}}</td>
                        <td><button class="open-modal btn btn-warning edit-button" data-toggle="modal" data-target="#edit-modal" itemId="{{@$c->id}}">Editar</button></td>
                        <td><button class="open-modal btn btn-danger open-delete-modal" data-toggle="modal" data-target="#delete-modal" comboId="{{@$c->id}}">Excluir</button></td>
                    </tr>
                @endforeach
            </table>
        </section>
        <section class= "w-100" id="action-container">
            <button class="open-modal btn btn-success p-3 m-3 final-button" data-toggle="modal" data-target="#new-modal" itemId="{{@$c->id}}">Criar novo combo</button>
        </section>
    </main>

    @include('administrador.combos-modal')


@endsection
<script>
    let url = "{{route('administrador.combos', ":errors")}}"
    let deleteUrl = "{{route('administrador.excluir-combos')}}"
    let comboData = <?php echo json_encode($combos); ?>;
</script>
@section('script')
    {{ url('js/administrador/combos.js')}}
@endsection
