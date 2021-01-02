;(function ($) {
    $(document).ready(function () {

        $(".menu-item").on('click', function () {
            $(".helement").hide();
            var target = "#" + $(this).data("target");
            $(target).show();
        });


        //Product Filtering
        $("#alpha").on('change',function(){
            var char = $(this).val().toLowerCase();

            if('all'==char){
                $(".words tr").show();
                return true;
            }
            $(".words tr:gt(0)").hide();

            $(".words td.status").filter(function(){
                return $(this).text().indexOf(char)==0;
            }).parent().show();
        })
    })
})(jQuery);

//Input Searching Product
function productSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

//JS validation for Add Product
function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var definition = document.forms["myForm"]["definition"].value;
    var price = document.forms["myForm"]["price"].value;
    var quantity = document.forms["myForm"]["quantity"].value;
    var isavailable = document.forms["myForm"]["isavailable"].value;

    var status = false;

    if(definition == ""){
        document.getElementById("valdefinition").innerHTML = "must be filled out";
        status = false;
    }else {
        document.getElementById("valdefinition").innerHTML = "";
        status = true;
    }

    if (name == ""){
        document.getElementById("valname").innerHTML = "must be filled out";
        status = false;
    }else {
        document.getElementById("valname").innerHTML = "";
        status = true;
    }

    if(price == ""){
        document.getElementById("valprice").innerHTML = "must be filled out";
        status =false;
    }else {
        document.getElementById("valprice").innerHTML = "";
        status = true;
    }

    if(quantity == ""){
        document.getElementById("valquantity").innerHTML = "must be filled out";
        status =false;
    }else {
        document.getElementById("valquantity").innerHTML = "";
        status = true;
    }

    if(isavailable == ""){
        document.getElementById("valisavailable").innerHTML = "must be filled out";
        status = false;
    }else {
        document.getElementById("valisavailable").innerHTML = "";
        status = true;
    }

    return status;
}