$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    function showChangwats() {
        let url = "{{ route('changwats') }}";
        console.log(url);
        $.ajax({
            url: "{{ route('changwats') }}",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    $("#changwats").append(`
                        <option value="${data[i].ch_id}">${data[i].changwat_t}</option>
                    `);
                }
            }
        });
    }
    showChangwats();

    function showAmphoeTambon() {
        // Amphoe
        $("#changwats").change(function() {
            let ch_id = $(this).val();
            $("#amphoes").html(
                '<option value="" selected>select เขต/อำเภอ</option>'
            );
            if (ch_id != null) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('amphoes.post') }}",
                    data: { ch_id: ch_id },
                    success: function(data) {
                        for (let i = 0; i < data.length; i++) {
                            $("#amphoes").append(`
                            <option value="${data[i].am_id}">${data[i].amphoe_t}</option>
                        `);
                        }
                    }
                });
            } else {
                $("#amphoes").html();
            }
        });
        // Tambon
        $("#amphoes").change(function() {
            let am_id = $(this).val();
            $("#tambons").html(
                '<option value="" selected>select เขต/อำเภอ</option>'
            );
            if (am_id != null) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('tambons.post') }}",
                    data: { am_id: am_id },
                    success: function(data) {
                        for (let i = 0; i < data.length; i++) {
                            $("#tambons").append(`
                            <option value="${data[i].ta_id}">${data[i].tambon_t}</option>
                        `);
                        }
                    }
                });
            } else {
                $("#tambons").html();
            }
        });
    }
    showAmphoeTambon();
});
