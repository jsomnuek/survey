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
s
    //3.10สาขาเทคโนโลยี
    function checkMajorTech() {
        // this value
        var data = $("#major_technologies_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var indTypeId = 1;
                }
            }
        }
        if (indTypeId == 1) {
            $("#display_major_technologies_other").removeClass("d-none");
            $("#major_technologies_other").prop("required", true);
        } else {
            $("#display_major_technologies_other").addClass("d-none");
            $("#major_technologies_other").prop("required", false);
            $("#major_technologies_other").val(null);
        }
        // event on selected
        $("#major_technologies_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#major_technologies_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var indTypeId = 1;
                        }
                    }
                }
                if (indTypeId == 1) {
                    $("#display_major_technologies_other").removeClass("d-none");
                    $("#major_technologies_other").prop("required", true);
                } else {
                    $("#display_major_technologies_other").addClass("d-none");
                    $("#major_technologies_other").prop("required", false);
                    $("#major_technologies_other").val(null);
                }
            }
        );
    }
    checkMajorTech();

});