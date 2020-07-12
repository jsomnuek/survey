$(document).ready(function() {
<<<<<<< HEAD
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

    //4.2 checkProductTypes
    function checkProductType() {
        // this value
        var data = $("#product_type_id").val();
        console.log(data);
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
            $("#product_type_other").val(null);
            $("#product_type_other").prop("required", false);
=======
    // checkInput
    function checkInput() {
        let inputTypeNumber = [
            document.getElementById("product_lab_test_duration"),
            document.getElementById("product_lab_test_fee"),
            document.getElementById("proficiency_testing_year")
        ];
        let invalidChars = ["-", "+", "e", ".", "E"];
        for (i = 0; i < inputTypeNumber.length; i++) {
            inputTypeNumber[i].addEventListener("keydown", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });
            inputTypeNumber[i].addEventListener("keyup", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
        }
    }
    checkInput();

<<<<<<< HEAD
    //4.14 checkResultControl
    function checkResultControl() {
=======
    //4.2 ProductType
    function checkProductType() {
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
        // this value
        var data = $("#result_control_id").val();
        console.log(data);
        if (data != null) {
            for (i = 0; i < data.length; i++) {
<<<<<<< HEAD
                if (data[i] == "7") {
                    var indTypeId = 7;
                }
            }
        }
        if (indTypeId == 7) {
            $("#display_result_control_other").removeClass("d-none");
            $("#result_control_other").prop("required", true);
=======
                if (data[i] == "39") {
                    var productTypeId = 39;
                }
            }
        }
        if (productTypeId == 39) {
            $("#display_product_type_other").removeClass("d-none");
            $("#product_type_other").prop("required", true);
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
        } else {
            $("#display_result_control_other").addClass("d-none");
            $("#result_control_other").val(null);
            $("#result_control_other").prop("required", false);
        }
        // event on selected
<<<<<<< HEAD
        $("#result_control_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#result_control_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "7") {
                            var indTypeId = 7;
                        }
=======
        $("#product_type_id").on("select2:select select2:unselect", function() {
            var data = $("#product_type_id").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "39") {
                        var productTypeId = 39;
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
                    }
                }
                if (indTypeId == 7) {
                    $("#display_result_control_other").removeClass("d-none");
                    $("#result_control_other").prop("required", true);
                } else {
                    $("#display_result_control_other").addClass("d-none");
                    $("#result_control_other").prop("required", false);
                    $("#result_control_other").val(null);
                }
            }
<<<<<<< HEAD
        );
    }
    checkResultControl();

    //4.7
    function checkTestCalibrate() {
        // this value
        var data = $("#testing_calibrating_type_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "6") {
                    var indTypeId = 6;
                }
=======
            if (productTypeId == 39) {
                $("#display_product_type_other").removeClass("d-none");
                $("#product_type_other").prop("required", true);
            } else {
                $("#display_product_type_other").addClass("d-none");
                $("#product_type_other").prop("required", false);
                $("#product_type_other").val(null);
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
            }
        }
        if (indTypeId == 6) {
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
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "6") {
                            var indTypeId = 6;
                        }
                    }
                }
                if (indTypeId == 6) {
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
    checkTestCalibrate();

<<<<<<< HEAD
    //4.14 checkTestingCalibratingType
    function checkTestType() {
=======
    //4.7 testingCalibratingTypeId
    function checkTestingCalibratingTypeId() {
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
        // this value
        var data = $("#testing_calibrating_type_id").val();
        if (data == "6") {
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
                if (data == "6") {
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
    checkTestingCalibratingTypeId();

    //4.7 testingCalibratingTypeId
    function checkTestingCalibratingMethodId() {
        // this value
        var data = $("#testing_calibrating_method_id").val();
        if (data != null) {
            $("#display_testing_calibrating_method_detail").removeClass(
                "d-none"
            );
            $("#testing_calibrating_method_detail").prop("required", true);
        } else {
            $("#display_testing_calibrating_method_detail").addClass("d-none");
            $("#testing_calibrating_method_detail").prop("required", false);
            $("#testing_calibrating_method_detail").val(null);
        }
        // event on selected
        $("#testing_calibrating_method_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#testing_calibrating_method_id").val();
                if (data != null) {
                    $("#display_testing_calibrating_method_detail").removeClass(
                        "d-none"
                    );
                    $("#testing_calibrating_method_detail").prop(
                        "required",
                        true
                    );
                } else {
                    $("#display_testing_calibrating_method_detail").addClass(
                        "d-none"
                    );
                    $("#testing_calibrating_method_detail").prop(
                        "required",
                        false
                    );
                    $("#testing_calibrating_method_detail").val(null);
                }
            }
        );
    }
    checkTestingCalibratingMethodId();

    //4.14 ResultControlId
    function checkResultControlId() {
        // this value
        var data = $("#result_control_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "7") {
                    var resultControlId = 7;
                }
            }
        }
        if (resultControlId == 7) {
            $("#display_result_control_other").removeClass("d-none");
            $("#result_control_other").prop("required", true);
        } else {
            $("#display_result_control_other").addClass("d-none");
            $("#result_control_other").prop("required", false);
            $("#result_control_other").val(null);
        }
        // event on selected
        $("#result_control_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#result_control_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "7") {
                            var resultControlId = 7;
                        }
                    }
                }
                if (resultControlId == 7) {
                    $("#display_result_control_other").removeClass("d-none");
                    $("#result_control_other").prop("required", true);
                } else {
                    $("#display_result_control_other").addClass("d-none");
                    $("#result_control_other").prop("required", false);
                    $("#result_control_other").val(null);
                }
            }
        );
    }
    checkResultControlId();

    //4.15 ProficiencyTestingId
    function checkProficiencyTestingId() {
        // this value
        var data = $("#proficiency_testing_id").val();
        if (data == "2") {
            $("#display_proficiency_testing_by").removeClass("d-none");
            $("#display_proficiency_testing_year").removeClass("d-none");
            $("#proficiency_testing_by").prop("required", true);
            $("#proficiency_testing_year").prop("required", true);
        } else {
            $("#display_proficiency_testing_by").addClass("d-none");
            $("#display_proficiency_testing_year").addClass("d-none");
            $("#proficiency_testing_by").prop("required", false);
            $("#proficiency_testing_year").prop("required", false);
            $("#proficiency_testing_by").val(null);
            $("#proficiency_testing_year").val(null);
        }
        // event on selected
        $("#proficiency_testing_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#proficiency_testing_id").val();
                if (data == "2") {
                    $("#display_proficiency_testing_by").removeClass("d-none");
                    $("#display_proficiency_testing_year").removeClass(
                        "d-none"
                    );
                    $("#proficiency_testing_by").prop("required", true);
                    $("#proficiency_testing_year").prop("required", true);
                } else {
                    $("#display_proficiency_testing_by").addClass("d-none");
                    $("#display_proficiency_testing_year").addClass("d-none");
                    $("#proficiency_testing_by").prop("required", false);
                    $("#proficiency_testing_year").prop("required", false);
                    $("#proficiency_testing_by").val(null);
                    $("#proficiency_testing_year").val(null);
                }
            }
        );
    }
<<<<<<< HEAD
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
=======
    checkProficiencyTestingId();
>>>>>>> 39774622bbfac40ad4a2c5028ed46d645a7942f6
});
