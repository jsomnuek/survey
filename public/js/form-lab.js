$(document).ready(function() {
    // checkInput
    function checkInput() {
        let inputTypeNumber = [document.getElementById("lab_employee_amount")];
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
        }
    }
    checkInput();

    // Check Select Option
    // 2.3 ที่ตั้งห้องปฏิบัติการ : กรณีเลือกนิคมอุตสาหกรรม หรือ อื่นๆ
    function checkLocationLab() {
        // this value
        var locationLabId = $("#lab_location_id").val();
        if (locationLabId == "3") {
            $("#display_industrial_estate_id").removeClass("d-none");
            $("#industrial_estate_id").prop("required", true);
        } else {
            $("#display_industrial_estate_id").addClass("d-none");
            $("#industrial_estate_id")
                .prop("required", false)
                .val(null)
                .trigger("change");
        }
        if (locationLabId == "4") {
            $("#display_lab_location_other").removeClass("d-none");
            $("#lab_location_other").prop("required", true);
        } else {
            $("#display_lab_location_other").addClass("d-none");
            $("#lab_location_other")
                .prop("required", false)
                .val(null);
        }
        // event on selected
        $("#lab_location_id").on("select2:select select2:unselect", function() {
            var locationLabId = $("#lab_location_id").val();
            if (locationLabId == "3") {
                $("#display_industrial_estate_id").removeClass("d-none");
                $("#industrial_estate_id").prop("required", true);
            } else {
                $("#display_industrial_estate_id").addClass("d-none");
                $("#industrial_estate_id")
                    .prop("required", false)
                    .val(null)
                    .trigger("change");
            }
            if (locationLabId == "4") {
                $("#display_lab_location_other").removeClass("d-none");
                $("#lab_location_other").prop("required", true);
            } else {
                $("#display_lab_location_other").addClass("d-none");
                $("#lab_location_other")
                    .prop("required", false)
                    .val(null);
            }
        });
    }
    checkLocationLab();

    function checkindEstateId() {
        // this value
        var indEstateId = $("#industrial_estate_id").val();
        if (indEstateId == "58") {
            $("#display_industrial_estate_other").removeClass("d-none");
            $("#industrial_estate_other").prop("required", true);
        } else {
            $("#display_industrial_estate_other").addClass("d-none");
            $("#industrial_estate_other")
                .prop("required", false)
                .val(null);
        }
        // Event On
        $("#industrial_estate_id").on("change", function() {
            var indEstateId = $(this).val();
            if (indEstateId == "58") {
                $("#display_industrial_estate_other").removeClass("d-none");
                $("#industrial_estate_other").prop("required", true);
            } else {
                $("#display_industrial_estate_other").addClass("d-none");
                $("#industrial_estate_other")
                    .prop("required", false)
                    .val(null);
            }
        });
    }
    checkindEstateId();

    // 2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ
    function educationLevelAmount() {
        let edu_level_amount_1 = $("#education_level_amount_1").val();
        let edu_level_amount_2 = $("#education_level_amount_2").val();
        let edu_level_amount_3 = $("#education_level_amount_3").val();
        let edu_level_amount_4 = $("#education_level_amount_4").val();
        let edu_level_amount_5 = $("#education_level_amount_5").val();
        let edu_level_amount_6 = $("#education_level_amount_6").val();
        let edu_level_amount_7 = $("#education_level_amount_7").val();
        if (edu_level_amount_1 == "") {
            $("#education_level_amount_1").val(0);
        }
        if (edu_level_amount_2 == "") {
            $("#education_level_amount_2").val(0);
        }
        if (edu_level_amount_3 == "") {
            $("#education_level_amount_3").val(0);
        }
        if (edu_level_amount_4 == "") {
            $("#education_level_amount_4").val(0);
        }
        if (edu_level_amount_5 == "") {
            $("#education_level_amount_5").val(0);
        }
        if (edu_level_amount_6 == "") {
            $("#education_level_amount_6").val(0);
        }
        if (edu_level_amount_7 == "") {
            $("#education_level_amount_7").val(0);
        }
    }
    educationLevelAmount();

    // 2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร :
    // lab_development_amount
    function labDevelopmentAmount() {
        let lab_dev_amount_1 = $("#lab_development_amount_1").val();
        let lab_dev_amount_2 = $("#lab_development_amount_2").val();
        let lab_dev_amount_3 = $("#lab_development_amount_3").val();
        let lab_dev_amount_4 = $("#lab_development_amount_4").val();
        let lab_dev_amount_5 = $("#lab_development_amount_5").val();
        let lab_dev_amount_6 = $("#lab_development_amount_6").val();
        let lab_dev_amount_7 = $("#lab_development_amount_7").val();
        if (lab_dev_amount_1 == "") {
            $("#lab_development_amount_1").val(0);
        }
        if (lab_dev_amount_2 == "") {
            $("#lab_development_amount_2").val(0);
        }
        if (lab_dev_amount_3 == "") {
            $("#lab_development_amount_3").val(0);
        }
        if (lab_dev_amount_4 == "") {
            $("#lab_development_amount_4").val(0);
        }
        if (lab_dev_amount_5 == "") {
            $("#lab_development_amount_5").val(0);
        }
        if (lab_dev_amount_6 == "") {
            $("#lab_development_amount_6").val(0);
        }
        if (lab_dev_amount_7 == "") {
            $("#lab_development_amount_7").val(0);
        }
    }
    labDevelopmentAmount();

    // lab_development_day
    function labDevelopmentDay() {
        let lab_dev_day_1 = $("#lab_development_day_1").val();
        let lab_dev_day_2 = $("#lab_development_day_2").val();
        let lab_dev_day_3 = $("#lab_development_day_3").val();
        let lab_dev_day_4 = $("#lab_development_day_4").val();
        let lab_dev_day_5 = $("#lab_development_day_5").val();
        let lab_dev_day_6 = $("#lab_development_day_6").val();
        let lab_dev_day_7 = $("#lab_development_day_7").val();
        if (lab_dev_day_1 == "") {
            $("#lab_development_day_1").val(0);
        }
        if (lab_dev_day_2 == "") {
            $("#lab_development_day_2").val(0);
        }
        if (lab_dev_day_3 == "") {
            $("#lab_development_day_3").val(0);
        }
        if (lab_dev_day_4 == "") {
            $("#lab_development_day_4").val(0);
        }
        if (lab_dev_day_5 == "") {
            $("#lab_development_day_5").val(0);
        }
        if (lab_dev_day_6 == "") {
            $("#lab_development_day_6").val(0);
        }
        if (lab_dev_day_7 == "") {
            $("#lab_development_day_7").val(0);
        }
    }
    labDevelopmentDay();
});
