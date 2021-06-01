

$(".filter").on("keyup", function () {
    var input = $(this).val().toUpperCase();
    $(".card").each(function () {
        if ($(this).data("string").toUpperCase().indexOf(input) < 0) {
            $(this).css({ display: "none" });

        } else {
            $(this).css({ display: "" });

        }
    })
});


function plus(e) {
    var quantity = e.parentElement.querySelector("#quantity");
    var count = parseInt(quantity.value);
    count++;
    quantity.value = count;
};
function minus(e) {
    var quantity = e.parentElement.querySelector("#quantity");
    var count = parseInt(quantity.value);
    if (count > 1) {
        count--;
        quantity.value = count;
    }
};


function openModal(e) {
    document.getElementById("listModal").style.display = "block";
    var quantity = e.parentElement.querySelector("#quantity");
    var id = e.parentElement.querySelector("#PID");
    document.getElementById('productQuantity').value = quantity.value;
    document.getElementById('productID').value = id.value;
}
function closeModal() {
    document.getElementById("listModal").style.display = "none";
}

function popOut() {
    if (confirm("Are you sure to delete this product?")) {
        $(".con").val("Yes")
    }
    else {
        $(".con").val("")
    }
}
function popmessage() {
    alert("Your changes have been saved");
}

function popUp() {
    alert("Please login to access this feature!");
}

