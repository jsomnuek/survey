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

    //3.2ชื่อเครื่องมืออื่นๆ
    function checkSciTool() {
        // this value
        var data = $("#science_tool_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var indTypeId = 1;
                }
            }
        }
        if (indTypeId == 1) {
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
                            var indTypeId = 1;
                        }
                    }
                }
                if (indTypeId == 1) {
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
    checkSciTool();

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

    //3.16การบำรุงรักษา
    function checkMaintenance() {
        // this value
        var data = $("#equipment_maintenance_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "1") {
                    var indTypeId = 1;
                }
            }
        }
        if (indTypeId == 1) {
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
                            var indTypeId = 1;
                        }
                    }
                }
                if (indTypeId == 1) {
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

    //3.19 คู่มือการใข้งาน
    // function checkManual() {
    //     // this value
    //     var data = $(".equipment_manuals_id").val();
    //     console.log(data);
    //     if (data != null) {
    //         for (i = 0; i < data.length; i++) {
    //             if (data[i] == "2") {
    //                 var indTypeId = 2;
    //             }
    //         }
    //     }
    //     if (indTypeId == 2) {
    //         $("#display_equipment_manual_name").removeClass("d-none");
    //         $("#display_equipment_manual_abbr").removeClass("d-none");
    //         $("#equipment_manual_name").prop("required", true);
    //         $("#equipment_manual_abbr").prop("required", true);
    //     } else {
    //         $("#display_equipment_manual_name").addClass("d-none");
    //         $("#display_equipment_manual_abbr").addClass("d-none");
    //         $("#equipment_manual_name").prop("required", false);
    //         $("#equipment_manual_name").val(null);
    //         $("#equipment_manual_abbr").prop("required", false);
    //         $("#equipment_manual_abbr").val(null);
    //     }
    //     // event on selected
    //     $(".equipment_manuals_id").on(
    //         "custom-radio:checked custom-radio:unchecked",
    //         function() {
    //             var data = $("#equipment_manuals_id").val();
    //             if (data != null) {
    //                 for (i = 0; i < data.length; i++) {
    //                     if (data[i] == "2") {
    //                         var indTypeId = 2;
    //                     }
    //                 }
    //             }
    //             if (indTypeId == 2) {
    //                 $("#display_equipment_manual_name").removeClass("d-none");
    //                 $("#display_equipment_manual_abbr").removeClass("d-none");
    //                 $("#equipment_manual_name").prop("required", true);
    //                 $("#equipment_manual_abbr").prop("required", true);
    //             } else {
    //                 $("#display_equipment_manual_name").addClass("d-none");
    //                 $("#display_equipment_manual_abbr").addClass("d-none");
    //                 $("#equipment_manual_name").prop("required", false);
    //                 $("#equipment_manual_name").val(null);
    //                 $("#equipment_manual_abbr").prop("required", false);
    //                 $("#equipment_manual_abbr").val(null);
    //             }
    //         }
    //     );
    // }
    // checkManual();

});