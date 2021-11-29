
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }

});


// call for calculus calculation
$(".btn-submit").click(function (e) {
    e.preventDefault();
    var num = $("input[name=num_series]").val();
    var action = $(document.activeElement).val();
    $.ajax({
        type: 'POST',
        url: "/api/calculus/calculate",
        data: { num_series: num, action: action },
        success: function (data) {
            if (data == "error") {

                $("#error").removeClass("invisible");
            } else {
                $("#error").addClass("invisible");
                $('#result').text(data);
            }
        },
        error: function (response) {
            console.log(response);
        }
    });

});

// call for statistics calculation
$(".btn-submit-stat").click(function (e) {
    e.preventDefault();
    var num = $("input[name=num_series]").val();
    var action = $(document.activeElement).val();
    $.ajax({
        type: 'POST',
        url: "/api/statistics/calculate",
        data: { num_series: num, action: action },
        success: function (data) {
            if (data == "error") {

                $("#error").removeClass("invisible");
            } else {
                $("#error").addClass("invisible");
                $('#result').text(data);
            }
        },
        error: function (response) {
            console.log(response);
        }
    });

});

// call to fetch log data
$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: "/api/log/show",
        success: function (response) {
            var trHTML = '';
            $.each(response, function (key, value) {
                trHTML +=
                    '<tr><td>' + value.number_series +
                    '</td><td>' + value.operation +
                    '</td><td>' + value.result +
                    "</td><td><button name='delete' type='button' value=" + value.id + "  class='btn-delete-log text-blue-500'>Delete</button>" +
                    '</td></tr>';
            });
            $('#records_table').append(trHTML);
        }
    });

});

// call to delete API on logs
$(document).on('click', '.btn-delete-log', function () {
    var id = $(document.activeElement).val();
    $.ajax({
        type: 'DELETE',
        url: "/api/log/" + id,
        success: function (data) {
            if (data == "deleted") {
                location.reload();
            }
        }
    });

});
