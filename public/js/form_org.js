$(document).ready(function() {
    //Initialize Select2 Elements
    $(".select2").select2({
        theme: "bootstrap4"
    });

    // Check Select Option

    // 1.4
    $("#lab_location_id").on("change", function() {
        var lab_location_id = $(this).val();
        $("#industrial_estate_id")
            .val(null)
            .trigger("change");
        if (lab_location_id == 3) {
            $("#display_location_other").addClass("d-none");
            $("#industrial_estate_id")
                .prop("disabled", false)
                .prop("required", true)
                .focus();
            $("#lab_location_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
            // check on chang
            $("#industrial_estate_id").on("change", function() {
                var industrial_estate_id = $(this).val();
                if (industrial_estate_id == 500) {
                    $("#display_estate_other").removeClass("d-none");
                    $("#display_location_other").addClass("d-none");
                    $("#industrial_estate_other")
                        .prop("readonly", false)
                        .prop("required", true)
                        .focus();
                } else {
                    $("#display_estate_other").addClass("d-none");
                    $("#industrial_estate_other")
                        .val("")
                        .prop("readonly", true)
                        .prop("required", false);
                }
            });
        } else if (lab_location_id == 4) {
            $("#display_estate_other").addClass("d-none");
            $("#display_location_other").removeClass("d-none");
            $("#lab_location_other")
                .prop("readonly", false)
                .prop("required", true)
                .focus();
            $("#industrial_estate_id")
                .val("")
                .prop("disabled", true)
                .prop("required", false);
            $("#industrial_estate_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        } else {
            $("#display_location_other").addClass("d-none");
            $("#display_estate_other").addClass("d-none");
            $("#industrial_estate_id")
                .val("")
                .prop("disabled", true)
                .prop("required", false);
            $("#industrial_estate_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
            $("#lab_location_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        }
    });

    // check on chang
    $("#industrial_estate_id").on("change", function() {
        var industrial_estate_id = $(this).val();
        if (industrial_estate_id == 500) {
            $("#display_estate_other").removeClass("d-none");
            $("#industrial_estate_other")
                .prop("readonly", false)
                .prop("required", true)
                .focus();
        } else {
            $("#display_estate_other").addClass("d-none");
            $("#industrial_estate_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        }
    });

    var old_lab_location_id = $("#lab_location_id").attr("data-value");
    if (old_lab_location_id != "") {
        if (old_lab_location_id == 3) {
            $("#industrial_estate_id")
                .prop("disabled", false)
                .prop("required", true);
            $("#lab_location_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        } else if (old_lab_location_id == 4) {
            $("#display_location_other").removeClass("d-none");
            $("#lab_location_other")
                .prop("readonly", false)
                .prop("required", true);
            $("#industrial_estate_id")
                .val("")
                .prop("disabled", true)
                .prop("required", false);
            $("#industrial_estate_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        } else {
            $("#display_location_other").addClass("d-none");
        }
    }

    var old_industrial_estate_id = $("#industrial_estate_id").attr(
        "data-value"
    );
    if (old_industrial_estate_id == 500) {
        $("#display_estate_other").removeClass("d-none");
        $("#industrial_estate_other")
            .prop("readonly", false)
            .prop("required", true);
    } else {
        $("#display_estate_other").addClass("d-none");
    }

    // 1.6
    $("#organisation_type_id").on("change", function() {
        var organisation_type_id = $(this).val();
        if (organisation_type_id == 5) {
            $("#org_type_other").removeClass("d-none");
            $("#organisation_type_other")
                .prop("readonly", false)
                .prop("required", true)
                .focus();
        } else {
            $("#org_type_other").addClass("d-none");
            $("#organisation_type_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        }
    });
    var old_organisation_type_id = $("#organisation_type_id").attr(
        "data-value"
    );
    if (old_organisation_type_id == 5) {
        $("#org_type_other").removeClass("d-none");
        $("#organisation_type_other")
            .prop("readonly", false)
            .prop("required", true);
    } else {
        $("#org_type_other").addClass("d-none");
    }

    // 1.11
    $("#industrial_type_id").on("change", function() {
        var industrial_type_id = $(this).val();
        if (industrial_type_id == 39) {
            $("#display_industrial_type_other").removeClass("d-none");
            $("#industrial_type_other")
                .prop("readonly", false)
                .prop("required", true)
                .focus();
        } else {
            $("#display_industrial_type_other").addClass("d-none");
            $("#industrial_type_other")
                .val("")
                .prop("readonly", true)
                .prop("required", false);
        }
    });
    var old_industrial_type_id = $("#industrial_type_id").attr("data-value");
    if (old_industrial_type_id == 39) {
        $("#display_industrial_type_other").removeClass("d-none");
        $("#industrial_type_other")
            .prop("readonly", false)
            .prop("required", true);
    } else {
        $("#display_industrial_type_other").addClass("d-none");
    }
});
