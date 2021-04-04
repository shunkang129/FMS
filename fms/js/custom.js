// Call the dataTables jQuery plugin
$(function() {
    $('#dataTable').DataTable();
});


$(function() {
    $("#myModal").modal('show');
});


$(function() {
    $('.check_email').on("input", function(e) {

        var email = $('.check_email').val();
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'check_submit_btn': 1,
                'email_id': email
            },
            success: function(response) {
                $('.error_email').html(response);
            }
        });
    });
});

$.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar-alt',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check-o',
        clear: 'fas fa-trash',
        close: 'fas fa-times'
    }
});

$(function() {
    $('#datetimepicker1').datetimepicker();
});


// delete confirmation
$(document).on('click', '#delBtn', function confirmDel() {
    if (confirm("Are you sure you want to delete this data?")) {
        $.ajax({
            url: "code.php",
            method: "POST",
            data: {
                'deletebtn': 1,
            },
        });
        return true;
    } else {
        return false;
    }
});

// alert message timeout 
window.setTimeout(function() {
    $("#message").fadeTo(500, 0).slideUp(1000, function() {
        $(this).remove();
    });
}, 3000);



function checkname() {
    var name = document.getElementById("register_name").value;

    if (name) {
        $.ajax({
            type: 'post',
            url: 'code.php',
            data: {
                user_name: name,
            },
            success: function(response) {
                $('#name_status').html(response);
                if (response == "OK") {
                    return true;
                } else {

                    return false;
                }
            }
        });
    } else {
        $('#name_status').html("");
        return false;
    }
}