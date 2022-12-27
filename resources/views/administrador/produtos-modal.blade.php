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
                    <table>
                        <tr>
                            <th>Check</th>
                            <th>Ingrediente</th>
                        </tr>
                        <tr>
                            @foreach($ingredientes as $i)
                            <td><input type="checkbox" ingredientId="{{@$i->id}}" name="ingredient{{@$i->id}}"/></td>
                            <td>{{@$i->name}}</td>
                            @endforeach
                        </tr>
                    </table>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="edit-form" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
