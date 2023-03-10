<!-- Modal -->
<div class="modal fade h-75" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Editar combo</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.editar-combos')}}" id="edit-form">
                    <input type="hidden" id="item-id" name="item-id"/>
                    <label for="edit-item-name">Nome</label>
                    <input type="text" class="form-control" id="edit-item-name">
                    <table>
                        <tr class="px-10 pb-10">
                            <th>Check</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                        @foreach($produtos as $p)
                            <tr>
                                <td><input type="checkbox" productId="{{@$p->id}}" id="input-has-product{{@$p->id}}" name="product{{@$p->id}}"/></td>
                                <td>{{@$p->name}}</td>
                                <td><input type="number" productId="{{@$p->id}}" id="input-product{{@$p->id}}" name="product{{@$p->id}}amount"/></td>
                            </tr>
                        @endforeach
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="edit-form" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="new-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Criar combo</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.criar-combos')}}" id="new-form">
                    <label for="new-item-name">Nome</label>
                    <input type="text" class="form-control" id="new-item-name">
                    <table>
                        <tr class="px-10 pb-10">
                            <th>Check</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                        </tr>
                        @foreach($produtos as $p)
                            <tr>
                                <td><input type="checkbox" productId="{{@$p->id}}" name="new-product{{@$p->id}}"/></td>
                                <td>{{@$p->name}}</td>
                                <td><input type="number" productId="{{@$p->id}}" name="new-product{{@$p->id}}amount"/></td>
                            </tr>
                        @endforeach
                    </table>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="new-form" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Deseja excluir este combo?</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success delete-combo-button">Confirmar</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
