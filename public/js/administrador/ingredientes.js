
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on("click", ".delete-ingredient-button", async function(e){
    var id = $(this).attr("ingredientId");

    await $.ajax({
        data: {
            id: id
        },
        type: 'DELETE',
        url: deleteUrl
    });
});

$('#new-modal').on('hidden.bs.modal', function (e) {
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
        type: 'POST',
        url: postUrl
    });
});
