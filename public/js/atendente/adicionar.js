
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#combo-button").click(function(){
    $("#combo-table").show();
    $("#hamburger-table").hide();
    $("#bebida-table").hide();
    $("#acompanhamento-table").hide();
})
$("#hamburger-button").click(function(){
    $("#combo-table").hide();
    $("#hamburger-table").show();
    $("#bebida-table").hide();
    $("#acompanhamento-table").hide();
});

$("#table-form").submit(async function(e){
    e.preventDefault();
    let arr = new Array();
    let i = 0;
    $(this).serializeArray().forEach(function(item){
            console.log(item);
            arr[i] = new Object();
            arr[i].id = $('input[name="' + item.name + '"]').attr("order-id");
            arr[i].origin = $('input[name="' + item.name + '"]').attr("origin");
            arr[i].quantidade = item.value;
            i++;
        }
    );

    arr = arr.filter( (a) => a.quantidade > 0);
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

})



