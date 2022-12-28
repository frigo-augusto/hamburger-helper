<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Editar combo</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('administrador.editar-combos')}}" id="edit-form">
                    <input type="hidden" id="item-id" name="item-id"/>
                    <table>
                        <tr class="px-10 pb-10">
                            <th>Check</th>
                            <th>Produto</th>
                        </tr>
                        @foreach($produtos as $p)
                            <tr>
                                <td><input type="checkbox" productId="{{@$p->id}}" name="product{{@$p->id}}"/></td>
                                <td>{{@$p->name}}</td>
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
