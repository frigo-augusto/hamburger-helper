<!-- Modal -->
<div class="modal fade" id="new-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Criar Ingrediente</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.criar-ingredientes')}}" id="new-form">
                    <label for="item-name">Nome</label>
                    <input type="text" class="form-control" id="item-name">
                    <label for="item-amount">Quantidade</label>
                    <input type="number" class="form-control" id="item-amount">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="new-form" class="btn btn-success">Confirmar</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#new-modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Editar ingrediente</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.editar-ingredientes')}}" id="edit-form">
                    <input type="hidden" id="item-id" name="item-id"/>
                    <label for="item-edit-name">Nome</label>
                    <input type="text" class="form-control" id="item-edit-name">
                    <label for="item-edit-amount">Quantidade</label>
                    <input type="number" class="form-control" id="item-edit-amount">
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="edit-form" class="btn btn-success">Confirmar</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#edit-modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Deseja excluir este ingrediente?</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success delete-ingredient-button">Confirmar</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
