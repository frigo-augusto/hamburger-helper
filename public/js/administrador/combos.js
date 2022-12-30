
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
            i++;
        }
    );
    arr = arr.filter((a) => a.id != null);

    await $.ajax({
        data: {
            name: name,
            data: arr
        },
        type: $(this).attr('method'),
        url: $(this).attr('action')
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

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("productId");
            i++;
        }
    );
    arr = arr.filter((a) => a.id != null);
    console.log(arr);

    await $.ajax({
        data: {data: arr, itemId: nextId},
        type: 'put',
        url: $(this).attr('action'),
        success: function(){
            url = url.replace(':errors', 'false');
            window.location.href = '/administrador-produtos';
        },
        error: function(){
            url = url.replace(':errors', 'true');
            window.location.href = '/administrador-produtos';
        }
    });
    return false;
})

$(document).on("click", ".delete-combo-button", async function(e){
    var id = $(this).attr("comboId");

    await $.ajax({
        data: {
            id: id
        },
        type: 'DELETE',
        url: deleteUrl
    });
});
