// ignore the search
/*function search(){
    var input,filter, h5, arr, i, value;
    input=document.getElementByClassName('card');
    filter = input.value.toUpperCase();
    h5 = document.getElementsByTagName('h5');

    for(i=0;i<h5.length;i++){
        arr = h5[i].getElementsByClassName("font-weight-bold pt-1")[0];
        value = arr.textContent;
        if(value.toUpperCase().indexOf(filter)>-1){
            h5[i].style.display = "";
        }
    }
}
*/

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
