<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Editar produto</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.editar-produtos')}}" id="edit-form">
                    <input type="hidden" id="item-id" name="item-id"/>
                    <label for="item-name">Nome</label>
                    <input type="text" class="form-control" id="item-name">
                    <table>
                        <tr class="px-10 pb-10">
                            <th>Check</th>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                        </tr>
                        @foreach($ingredientes as $i)
                            <tr>
                                <td><input type="checkbox" ingredientId="{{@$i->id}}" name="ingredient{{@$i->id}}"/></td>
                                <td>{{@$i->name}}</td>
                                <td><input type="number" ingredientId="{{@$i->id}}" name="ingredient{{@$i->id}}amount"/></td>
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
                <h5 class="modal-title" id="modal-title">Criar produto</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.criar-produtos')}}" id="new-form">
                    <label for="item-name">Nome</label>
                    <input type="text" class="form-control" id="item-name">
                    <table>
                        <tr class="px-10 pb-10">
                            <th>Check</th>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                        </tr>
                        @foreach($ingredientes as $i)
                            <tr>
                                <td><input type="checkbox" ingredientId="{{@$i->id}}" name="ingredient{{@$i->id}}"/></td>
                                <td>{{@$i->name}}</td>
                                <td><input type="number" ingredientId="{{@$i->id}}" name="ingredient{{@$i->id}}amount"/></td>
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
