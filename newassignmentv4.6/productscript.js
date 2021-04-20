$(".filter").on("keyup",function(){
    var input = $(this).val().toUpperCase();
    $(".card").each(function(){
        if($(this).data("string").toUpperCase().indexOf(input)<0){
            $(this).css({display:"none"});
            
        } else{
            $(this).css({display:""});
            
        }
    })
});


    function plus(e){
        var quantity = e.parentElement.querySelector("#quantity");
        var count = parseInt(quantity.value);
        count++;
        quantity.value = count;
    };
    function minus(e){
        var quantity = e.parentElement.querySelector("#quantity");
        var count = parseInt(quantity.value);
            if(count>1){
                count--;
                quantity.value = count;
            }   
    };

function openModal(){
    document.getElementById("listModal").style.display = "block";
}
function closeModal(){
    document.getElementById("listModal").style.display = "none";
}
