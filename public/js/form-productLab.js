$(document).ready(function() {
     //Initialize Select2 Elements
     $(".select2")
     .select2({
         theme: "bootstrap4",
         allowClear: true
     })
     .trigger("change");

    //Initialize Select2 Elements
    $(".select2-multi")
        .select2({
            theme: "bootstrap4",
            allowClear: true,
            placeholder: "-- โปรดเลือก --"
        })
        .trigger("change");

});