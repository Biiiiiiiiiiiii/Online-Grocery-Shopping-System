$(".filter").on("keyup",function(){
    var input = $(this).val().toUpperCase();
    $(".card").each(function(){
        if($(this).data("string").toUpperCase().indexOf(input)<0){
            $(this).hide();
        } else{
            $(this).show();
        }
    })
});


    $('.quantity-right-plus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        // if not defined    
            $('#quantity').val(quantity+1);
            // increment
    });
    $('.quantity-left-minus').click(function(e){
        e.preventDefault();
        var quantity = parseInt($('#quantity').val());
        // if not defined 
            if(quantity>1){
                $('#quantity').val(quantity-1);
            // increment
            }   
    });

function openModal(){
    document.getElementById("listModal").style.display = "block";
}
function closeModal(){
    document.getElementById("listModal").style.display = "none";
}
