
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#pagar-form").submit(async function(e){
    e.preventDefault();
    let arr = new Array();
    let i = 0;
    $(this).serializeArray().forEach(function(item){
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("id");
            i++;
        }
    );
    await $.ajax({
        data: {data: arr},
        type: $(this).attr('method'),
        url: $(this).attr('action'),
        success: function(){
            atendenteUrl = atendenteUrl.replace(':errors', 'false');
            //window.location.href= atendenteUrl;
        },
        error: function(){
            atendenteUrl = atendenteUrl.replace(':errors', 'true');
            //window.location.href = atendenteUrl;
        }
    });
    console.log(arr);
});
