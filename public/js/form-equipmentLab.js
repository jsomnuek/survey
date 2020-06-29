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
    $("#science_tool_id").on(
        "select2:select select2:unselect",
        function() {
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
        }
    );
}
checkOthSciTool();

//3.10
function checkMajorTechnology() {
    // this value
    var data = $("#major_technology_id").val();
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
    $("#major_technology_id").on(
        "select2:select select2:unselect",
        function() {
            var data = $("#major_technology_id").val();
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
                $("#display_equipment_maintenance_other").removeClass("d-none");
                $("#equipment_maintenance_other").prop("required", true);
            } else {
                $("#display_equipment_maintenance_other").addClass("d-none");
                $("#equipment_maintenance_other").prop("required", false);
                $("#equipment_maintenance_other").val(null);
            }
        }
    );
}
checkMaintenance();
});