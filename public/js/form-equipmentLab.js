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

    //3.2
    function checkOthSciTool() {
        // this value
        var data = $("#science_tool_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var sciToolID = 1;
                }
            }
        }
        if (sciToolID == 1) {
            $("#display_science_tool_other_name").removeClass("d-none");
            $("#science_tool_other_name").prop("required", true);
            $("#display_science_tool_other_abbr").removeClass("d-none");
            $("#science_tool_other_abbr").prop("required", true);
        } else {
            $("#display_science_tool_other_name").addClass("d-none");
            $("#science_tool_other_name").prop("required", false);
            $("#science_tool_other_name").val(null);
            $("#display_science_tool_other_abbr").addClass("d-none");
            $("#science_tool_other_abbr").prop("required", false);
            $("#science_tool_other_abbr").val(null);
        }
        // event on selected
        $("#science_tool_id").on("select2:select select2:unselect", function() {
            var data = $("#science_tool_id").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "1") {
                        var sciToolID = 1;
                    }
                }
            }
            if (sciToolID == 1) {
                $("#display_science_tool_other_name").removeClass("d-none");
                $("#science_tool_other_name").prop("required", true);
                $("#display_science_tool_other_abbr").removeClass("d-none");
                $("#science_tool_other_abbr").prop("required", true);
            } else {
                $("#display_science_tool_other_name").addClass("d-none");
                $("#science_tool_other_name").prop("required", false);
                $("#science_tool_other_name").val(null);
                $("#display_science_tool_other_abbr").addClass("d-none");
                $("#science_tool_other_abbr").prop("required", false);
                $("#science_tool_other_abbr").val(null);
            }
        });
    }
    checkOthSciTool();

    //3.10
    function checkMajorTechnology() {
        // this value
        var data = $("#major_technologies_id").val();
        console.log(data);
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var majorOtherID = 1;
                }
            }
        }
        if (majorOtherID == 1) {
            $("#display_major_technology_other").removeClass("d-none");
            $("#major_technology_other").prop("required", true);
        } else {
            $("#display_major_technology_other").addClass("d-none");
            $("#major_technology_other").prop("required", false);
            $("#major_technology_other").val(null);
        }
        // event on selected
        $("#major_technologies_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#major_technologies_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var majorOtherID = 1;
                        }
                    }
                }
                if (majorOtherID == 1) {
                    $("#display_major_technology_other").removeClass("d-none");
                    $("#major_technology_other").prop("required", true);
                } else {
                    $("#display_major_technology_other").addClass("d-none");
                    $("#major_technology_other").prop("required", false);
                    $("#major_technology_other").val(null);
                }
            }
        );
    }
    checkMajorTechnology();

    //3.11
    function checkObjUse() {
        // this value
        var data = $("#result_control_id").val();
        console.log(data);
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var objUse = 1;
                }
            }
        }
        // if (majorOtherID == 1) {
        //     $("#display_major_technology_other").removeClass("d-none");
        //     $("#major_technology_other").prop("required", true);
        // } else {
        //     $("#display_major_technology_other").addClass("d-none");
        //     $("#major_technology_other").prop("required", false);
        //     $("#major_technology_other").val(null);
        // }
        // event on selected
        $("#result_control_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#result_control_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var objUse = 1;
                        }
                    }
                }
                // if (majorOtherID == 1) {
                //     $("#display_major_technology_other").removeClass("d-none");
                //     $("#major_technology_other").prop("required", true);
                // } else {
                //     $("#display_major_technology_other").addClass("d-none");
                //     $("#major_technology_other").prop("required", false);
                //     $("#major_technology_other").val(null);
                // }
            }
        );
    }
    checkObjUse();

    // 3.15 ยังไม่เสร็จ
    function checkCalibrate() {
        var data = $("#equipment_calibrations_id").val();
        if (data == 2) {
            $("#display_equipment_calibration_by").removeClass("d-none");
            $("#equipment_calibration_by").prop("required", true);
            $("#display_equipment_calibration_year").removeClass("d-none");
            $("#equipment_calibration_year").prop("required", true);
        } else {
            $("#display_equipment_calibration_by").addClass("d-none");
            $("#equipment_calibration_by").prop("required", false);
            $("#equipment_calibration_by").val(null);
            $("#display_equipment_calibration_year").addClass("d-none");
            $("#equipment_calibration_year").prop("required", false);
            $("#equipment_calibration_year").val(null);
        }
        // event on selected
        $("#equipment_calibrations_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#equipment_calibrations_id").val();
                if (data == 2) {
                    $("#display_equipment_calibration_by").removeClass(
                        "d-none"
                    );
                    $("#equipment_calibration_by").prop("required", true);
                    $("#display_equipment_calibration_year").removeClass(
                        "d-none"
                    );
                    $("#equipment_calibration_year").prop("required", true);
                } else {
                    $("#display_equipment_calibration_by").addClass("d-none");
                    $("#equipment_calibration_by").prop("required", false);
                    $("#equipment_calibration_by").val(null);
                    $("#display_equipment_calibration_year").addClass("d-none");
                    $("#equipment_calibration_year").prop("required", false);
                    $("#equipment_calibration_year").val(null);
                }
            }
        );
    }
    checkCalibrate();

    //3.16
    function checkMaintenance() {
        // this value
        var data = $("#equipment_maintenance_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var mtID = 1;
                }
            }
        }
        if (mtID == 1) {
            $("#display_equipment_maintenance_other").removeClass("d-none");
            $("#equipment_maintenance_other").prop("required", true);
        } else {
            $("#display_equipment_maintenance_other").addClass("d-none");
            $("#equipment_maintenance_other").prop("required", false);
            $("#equipment_maintenance_other").val(null);
        }
        // event on selected
        $("#equipment_maintenance_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#equipment_maintenance_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "1") {
                            var mtID = 1;
                        }
                    }
                }
                if (mtID == 1) {
                    $("#display_equipment_maintenance_other").removeClass(
                        "d-none"
                    );
                    $("#equipment_maintenance_other").prop("required", true);
                } else {
                    $("#display_equipment_maintenance_other").addClass(
                        "d-none"
                    );
                    $("#equipment_maintenance_other").prop("required", false);
                    $("#equipment_maintenance_other").val(null);
                }
            }
        );
    }
    checkMaintenance();
});

// 3.19 ยังไม่เสร็จ
function checkManual() {
    var data = $("#equipment_manuals_id").val();
    if (data == 2) {
        $("#display_equipment_manual_name").removeClass("d-none");
        $("equipment_manual_name").prop("required", true);
        $("#display_equipment_manual_locate").removeClass("d-none");
        $("#equipment_manual_locate").prop("required", true);
    } else {
        $("#display_equipment_manual_name").addClass("d-none");
        $("#equipment_manual_name").prop("required", false);
        $("#equipment_manual_name").val(null);
        $("#display_equipment_manual_locate").addClass("d-none");
        $("#equipment_manual_locate").prop("required", false);
        $("#equipment_manual_locate").val(null);
    }
    // event on selected
    $("#equipment_manuals_id").on(
        "select2:select select2:unselect",
        function() {
            var data = $("#equipment_manuals_id").val();
            if (data == 2) {
                $("#display_equipment_manual_name").removeClass("d-none");
                $("equipment_manual_name").prop("required", true);
                $("#display_equipment_manual_locate").removeClass("d-none");
                $("#equipment_manual_locate").prop("required", true);
            } else {
                $("#display_equipment_manual_name").addClass("d-none");
                $("#equipment_manual_name").prop("required", false);
                $("#equipment_manual_name").val(null);
                $("#display_equipment_manual_locate").addClass("d-none");
                $("#equipment_manual_locate").prop("required", false);
                $("#equipment_manual_locate").val(null);
            }
        }
    );
}
checkManual();
