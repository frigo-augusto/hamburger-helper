
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let nextId;

$(".open-modal").click(function(event){
    nextId = $(this).attr("itemId");
});

$("#new-form").submit(async function(event){
    event.preventDefault();
    var name = $('#new-item-name').val();
    console.log(name);

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("ingredientId");
            arr[i].amount = $('input[name="' + item.name + 'amount"]').val();
            i++;
        }
    );
    arr = arr.filter((a) => a.id != null && a.amount > 0);

    await $.ajax({
        data: {
            name: name,
            data: arr
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

    $("#new-form input:checkbox:checked").each(function() {
        $(this).prop('checked', false)
    });

    $(this)
        .find("input")
        .val('')
        .end()
});

$("#edit-form").submit(async function(event){
    event.preventDefault();
    $("#item-id").val(nextId);
    var name = $('#edit-item-name').val();

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("ingredientId");
            arr[i].amount = $('input[name="' + item.name + 'amount"]').val();
            i++;
        }
    );

    await $.ajax({
        data: {
            data: arr,
            itemId: nextId,
            name: name},
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
    return false;
});

$('#new-modal').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input")
        .val('')
        .end()
    $('input').prop('checked', false)
})

$('#edit-modal').on('hidden.bs.modal', function (e) {
    $(this)
        .find("input")
        .val('')
        .end()
    $('input').prop('checked', false)
})

let productClickedId = null;

$(".edit-button").click(function(){
    productClickedId = $(this).attr("itemId");

});

$('#edit-modal').on('shown.bs.modal', function() {
    while(productClickedId == null);
    let tempProduct = productData.filter( (p) => p.id == productClickedId);
    let currentProduct = tempProduct[0];
    $('#edit-item-name').val(currentProduct.name);
    currentProduct.ingredients.forEach(function(i){
        $('#input-has-ingredient' + i.id).prop('checked', true);
        $("#input-ingredient" + i.id).val(i.amount);
    });
    productClickedId = null;
});

let deleteProductId = null;

$(".open-delete-modal").click(function(event){
    deleteProductId = $(this).attr("productId");
});

$('.delete-product-button').click(async function(e){
    await $.ajax({
        data: {
            id: deleteProductId
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
