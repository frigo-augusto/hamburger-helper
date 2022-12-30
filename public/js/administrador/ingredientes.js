
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#new-modal').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input")
        .val('')
        .end()
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input")
            .val('')
            .end()
})

$("#new-form").submit(async function(event){
    event.preventDefault();
    var name = $('#item-name').val();
    var amount = $('#item-amount').val();

    await $.ajax({
        data: {
            name: name,
            amount: amount
        },
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        success: function(){
            url = url.replace(':errors', 'false');
            window.location.href= url;
        },
        error: function(){
            url = url.replace(':errors', 'true');
            window.location.href = url;
        }
    });

    $(this)
        .find("input")
        .val('')
        .end()
});

let ingredientId

$(".open-edit-modal").click(function(event){
    ingredientId = $(this).attr("itemId");
});

$('#edit-modal').on('shown.bs.modal', function() {
    let tempIngredient = ingredientData.filter( (p) => p.id == ingredientId);
    let currentIngredient = tempIngredient[0];
    $('#item-edit-name').val(currentIngredient.name);
    $('#item-edit-amount').val(currentIngredient.amount);
});

$("#edit-form").submit(async function(event){
    event.preventDefault();
    var name = $('#item-edit-name').val();
    var amount = $('#item-edit-amount').val();

    await $.ajax({
        data: {
            id: ingredientId,
            name: name,
            amount: amount
        },
        type: 'put',
        url: $(this).attr('action'),
        success: function(){
            url = url.replace(':errors', 'false');
            window.location.href= url;
        },
        error: function(){
            url = url.replace(':errors', 'true');
            window.location.href = url;
        }
    });

    $("#edit-modal").modal("hide");
});

let deleteIngredientId = null;

$(".open-delete-modal").click(function(event){
    deleteIngredientId = $(this).attr("ingredientId");
});

$('.delete-ingredient-button').click(async function(e){
    await $.ajax({
        data: {
            id: deleteIngredientId
        },
        type: 'DELETE',
        url: deleteUrl,
        success: function(){
            url = url.replace(':errors', 'false');
            window.location.href= url;
        },
        error: function(){
            url = url.replace(':errors', 'true');
            window.location.href = url;
        }
    });

    $("#delete-modal").modal("hide");
});
