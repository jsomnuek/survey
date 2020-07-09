$(document).ready(function() {
    //Initialize Select2 Elements
    $(".select2")
        .select2({
            theme: "bootstrap4",
            allowClear: true,
            placeholder: "-- โปรดเลือก --"
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
                if (data[i] == "7") {
                    var indTypeId = 7;
                }
            }
        }
        if (indTypeId == 1) {
            $("#display_product_lab_result_control_other").removeClass(
                "d-none"
            );
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
                        if (data[i] == "7") {
                            var indTypeId = 7;
                        }
                    }
                }
                if (indTypeId == 7) {
                    $("#display_product_lab_result_control_other").removeClass(
                        "d-none"
                    );
                    $("#product_lab_result_control_other").prop(
                        "required",
                        true
                    );
                } else {
                    $("#display_product_lab_result_control_other").addClass(
                        "d-none"
                    );
                    $("#product_lab_result_control_other").prop(
                        "required",
                        false
                    );
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
                if (data[i] == "39") {
                    var indTypeId = 39;
                }
            }
        }
        if (indTypeId == 39) {
            $("#display_product_type_other").removeClass("d-none");
            $("#product_type_other").prop("required", true);
        } else {
            $("#display_product_type_other").addClass("d-none");
            $("#product_type_other").prop("required", false);
            $("#product_type_other").val(null);
        }
        // event on selected
        $("#product_type_id").on("select2:select select2:unselect", function() {
            var data = $("#product_type_id").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "39") {
                        var indTypeId = 39;
                    }
                }
            }
            if (indTypeId == 39) {
                $("#display_product_type_other").removeClass("d-none");
                $("#product_type_other").prop("required", true);
            } else {
                $("#display_product_type_other").addClass("d-none");
                $("#product_type_other").prop("required", false);
                $("#product_type_other").val(null);
            }
        });
    }
    checkProductType();

    //4.2 checkProductTypes
    function checkProductType() {
        // this value
        var data = $("#product_type_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "39") {
                    var indTypeId = 39;
                }
            }
        }
        if (indTypeId == 39) {
            $("#display_product_type_other").removeClass("d-none");
            $("#product_type_other").prop("required", true);
        } else {
            $("#display_product_type_other").addClass("d-none");
            $("#product_type_other").prop("required", false);
            $("#product_type_other").val(null);
        }
        // event on selected
        $("#product_type_id").on("select2:select select2:unselect", function() {
            var data = $("#product_type_id").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "39") {
                        var indTypeId = 39;
                    }
                }
            }
            if (indTypeId == 39) {
                $("#display_product_type_other").removeClass("d-none");
                $("#product_type_other").prop("required", true);
            } else {
                $("#display_product_type_other").addClass("d-none");
                $("#product_type_other").prop("required", false);
                $("#product_type_other").val(null);
            }
        });
    }
    checkProductType();

    //4.14 checkTestType
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
        if (data == 6) {
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
                console.log(data);
                // if (data != null) {
                //     for (i = 0; i < data.length; i++) {
                //         if (data[i] == "1") {
                //             var indTypeId = 1;
                //         }
                //     }
                // }
                if (data == 6) {
                    $("#display_testing_calibrating_type_other").removeClass(
                        "d-none"
                    );
                    $("#testing_calibrating_type_other").prop("required", true);
                } else {
                    $("#display_testing_calibrating_type_other").addClass(
                        "d-none"
                    );
                    $("#testing_calibrating_type_other").prop(
                        "required",
                        false
                    );
                    $("#testing_calibrating_type_other").val(null);
                }
            }
        );
    }
    checkTestType();

    // 4.15 การทดสอบห้องปฏิบัติการ ยังไม่เสร็จเลย
    function checkPT() {
        var data = $("#proficiency_testing").val();
        if (data == 2) {
            $("#display_proficiency_testing_by").removeClass("d-none");
            $("#proficiency_testing_by").prop("required", true);
            $("#display_proficiency_testing_year").removeClass("d-none");
            $("#proficiency_testing_year").prop("required", true);
        } else {
            $("#display_proficiency_testing_by").addClass("d-none");
            $("#proficiency_testing_by").prop("required", false);
            $("#proficiency_testing_by").val(null);
            $("#display_proficiency_testing_year").addClass("d-none");
            $("#proficiency_testing_year").prop("required", false);
            $("#proficiency_testing_year").val(null);
        }
        // event on selected
        $("#proficiency_testing").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#proficiency_testing").val();
                if (data == 2) {
                    $("#display_proficiency_testing_by").removeClass("d-none");
                    $("#proficiency_testing_by").prop("required", true);
                    $("#display_proficiency_testing_year").removeClass(
                        "d-none"
                    );
                    $("#proficiency_testing_year").prop("required", true);
                } else {
                    $("#display_proficiency_testing_by").addClass("d-none");
                    $("#proficiency_testing_by").prop("required", false);
                    $("#proficiency_testing_by").val(null);
                    $("#display_proficiency_testing_year").addClass("d-none");
                    $("#proficiency_testing_year").prop("required", false);
                    $("#proficiency_testing_year").val(null);
                }
            }
        );
    }
    checkPT();

    function getEquipmentLab() {
        var oldlabID = $("#lab_id").attr("data-value");
        // var oldEquipID = document.getElementById("equipments_id").innerHTML;
        var oldEquipID = $("#equipments_id").attr("data-value");
        // var oldEquipID = $("#equipments_id").val([1, 2, 3]);
        // console.log(oldlabID);
        // console.log(oldEquipID);

        // เพื่อให้ค่าเก่าของ Lab ID กลับมาด้วย
        if (oldlabID != "") {
            $.ajax({
                url: "/productLab/equipmentinLab/" + oldlabID,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);
                    $.each(data, function(key, value) {
                        $("#equipments_id").append(`
                                <option value="${value.id}">${value.equipment_code}</option>
                            `);
                    });
                }
            });
        } else {
            $("#equipments_id").html(`<option value=""></option>`);
            $("#equipments_id").trigger("change");
        }

        // เลือก Lab ID จากนั้นแสดงรายการเครื่องมือของแลปนั้นๆ
        $("#lab_id").on("select2:select select2:unselect", function() {
            var id_lab = $("#lab_id").val();
            $("#equipments_id").html(`<option value=""></option>`);
            $("#equipments_id").trigger("change");
            console.log(id_lab);
            if (id_lab != "") {
                $.ajax({
                    url: "/productLab/equipmentinLab/" + id_lab,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            $("#equipments_id").append(`
                                <option value=" ${value.id} " {{ in_array(${value.id}, old('equipments_id') ? : []) ? 'selected' : '' }}> ${value.equipment_code} </option>
                            `);
                        });
                    }
                });
            } else {
                $("#equipments_id").html(`<option value=""></option>`);
                $("#equipments_id").trigger("change");
            }
        });
    }
    getEquipmentLab();
});
