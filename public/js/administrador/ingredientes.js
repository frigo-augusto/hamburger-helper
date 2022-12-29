
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
