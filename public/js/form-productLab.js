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

    //4.14 การควบคุมคุณภาพผลการทดสอบภายใน
    function checkControlTest() {
        // this value
        var data = $("#result_control_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var indTypeId = 1;
                }
            }
        }
        if (indTypeId == 1) {
            $("#display_product_lab_result_control_other").removeClass("d-none");
            $("#product_lab_result_control_other").prop("required", true);
        } else {
            $("#display_product_lab_result_control_other").addClass("d-none");
            $("#product_lab_result_control_other").prop("required", false);
            $("#product_lab_result_control_other").val(null);
        }
        // event on selected
        $("#result_control_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#result_control_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var indTypeId = 1;
                        }
                    }
                }
                if (indTypeId == 1) {
                    $("#display_product_lab_result_control_other").removeClass("d-none");
                    $("#product_lab_result_control_other").prop("required", true);
                } else {
                    $("#display_product_lab_result_control_other").addClass("d-none");
                    $("#product_lab_result_control_other").prop("required", false);
                    $("#product_lab_result_control_other").val(null);
                }
            }
        );
    }
    checkControlTest();

    //4.2 checkProductTypes
    function checkProductType() {
        // this value
        var data = $("#product_type_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var indTypeId = 1;
                }
            }
        }
        if (indTypeId == 1) {
            $("#display_product_type_other").removeClass("d-none");
            $("#product_type_other").prop("required", true);
        } else {
            $("#display_product_type_other").addClass("d-none");
            $("#product_type_other").prop("required", false);
            $("#product_type_other").val(null);
        }
        // event on selected
        $("#product_type_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#product_type_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var indTypeId = 1;
                        }
                    }
                }
                if (indTypeId == 1) {
                    $("#display_product_type_other").removeClass("d-none");
                    $("#product_type_other").prop("required", true);
                } else {
                    $("#display_product_type_other").addClass("d-none");
                    $("#product_type_other").prop("required", false);
                    $("#product_type_other").val(null);
                }
            }
        );
    }
    checkProductType();




    //4.2 checkTestType
    function checkTestType() {
        // this value
        var data = $("#testing_calibrating_type_id").val();
        // if (data != null) {
        //     for (i = 0; i < data.length; i++) {
        //         if (data[i] == "1") {
        //             var indTypeId = 1;
        //         }
        //     }
        // }
        if (data == 5) {
            $("#display_testing_calibrating_type_other").removeClass("d-none");
            $("#testing_calibrating_type_other").prop("required", true);
        } else {
            $("#display_testing_calibrating_type_other").addClass("d-none");
            $("#testing_calibrating_type_other").prop("required", false);
            $("#testing_calibrating_type_other").val(null);
        }
        // event on selected
        $("#testing_calibrating_type_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#testing_calibrating_type_id").val();
                // if (data != null) {
                //     for (i = 0; i < data.length; i++) {
                //         if (data[i] == "1") {
                //             var indTypeId = 1;
                //         }
                //     }
                // }
                if (data == 5) {
                    $("#display_testing_calibrating_type_other").removeClass("d-none");
                    $("#testing_calibrating_type_other").prop("required", true);
                } else {
                    $("#display_testing_calibrating_type_other").addClass("d-none");
                    $("#testing_calibrating_type_other").prop("required", false);
                    $("#testing_calibrating_type_other").val(null);
                }
            }
        );
    }
    checkTestType();

});