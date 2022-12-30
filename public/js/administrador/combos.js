
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
    var name = $('#item-name').val();

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("productId");
            arr[i].amount = $('input[name="' + item.name + 'amount"]').val();
            i++;
        }
    );
    arr = arr.filter((a) => a.id != null && a.amount != null);

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
    var name = $('#item-name').val();

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("productId");
            arr[i].amount = $('input[name="' + item.name + 'amount"]').val();
            i++;
        }
    );
    arr = arr.filter((a) => a.id != null && a.amount != null);
    console.log(arr);

    await $.ajax({
        data: {data: arr,
               itemId: nextId,
               name: name},
        type: 'put',
        url: $(this).attr('action'),
        success: function(){
            url = url.replace(':errors', 'false');
        },
        error: function(){
            url = url.replace(':errors', 'true');
        }
    });

    $("#edit-modal").modal("hide");
    return false;
})

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

let comboClickedId = null;

$(".edit-button").click(function(){
    comboClickedId = $(this).attr("itemId");
});

$('#edit-modal').on('shown.bs.modal', function() {
    while(comboClickedId == null);
    let tempCombo = comboData.filter( (p) => p.id == comboClickedId);
    let currentCombo = tempCombo[0];
    $('#item-name').val(currentCombo.name);
    currentCombo.products.forEach(function(i){
        $('#input-has-product' + i.id).prop('checked', true);
        $("#input-product" + i.id).val(i.amount);
    });
    comboClickedId = null;
});

let deleteComboId = null;

$(".open-delete-modal").click(function(event){
    deleteComboId = $(this).attr("comboId");
});

$('.delete-combo-button').click(async function(e){
    await $.ajax({
        data: {
            id: deleteComboId
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

    $("#delete-modal").modal('hide');
});


