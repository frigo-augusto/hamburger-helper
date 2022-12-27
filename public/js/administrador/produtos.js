
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let nextId;

$(".open-modal").click(function(event){
    nextId = $(this).attr("itemId");
});

$("#edit-form").submit(async function(event){
    event.preventDefault();
    $("#item-id").val(nextId);

    let i = 0;
    let arr = new Array();
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("ingredientId");
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
            //window.location.href = url;
        },
        error: function(){
            url = url.replace(':errors', 'true');
            //window.location.href = url;
        }
    });
    return false;
})
