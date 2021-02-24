$(document).ready(function(){
    $(".btn-update-item").on('click',function(e){
        e.preventDefault();
        
        var id = $(this).data('id');
        console.log(id);
        var href = $(this).data('href');
        console.log(href);
        var cantidad = $("#producto_" + id).val();
        console.log(cantidad);
        window.location.href=href+ "/"  +cantidad;
    });
});
