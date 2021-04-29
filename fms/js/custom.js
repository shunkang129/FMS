// Call the dataTables jQuery plugin
$(function() {
    $('#dataTable').DataTable();
});


// Datepicker default styling configuration section
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

// Report datepicker formatter
$(function() {
    $('#datetimepicker2').datetimepicker({
        format: "YYYY-MM-DD",

    });
});


// Modal datepicker formatter
$(function() {
    $('#datetimepicker3').datetimepicker({
        format: "YYYY-MM-DD",

    });
});


// delete confirmation
$(document).on('click', '#deleteReportBtn', function confirmDel() {
    if (confirm("Are you sure you want to delete this report data?")) {
        $.ajax({
            url: "code.php",
            method: "POST",
            data: {
                'deleteReportBtn': 1,
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
}, 2000);


// name validation at sign up form
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


// email validation at sign up form
function checkEmail() {
    var email = document.getElementById("register_email").value;

    if (email) {
        $.ajax({
            type: 'post',
            url: 'code.php',
            data: {
                user_email: email,
            },
            success: function(response) {
                $('#email_status').html(response);
                if (response == "OK") {
                    return true;
                } else {

                    return false;
                }
            }
        });
    } else {
        $('#email_status').html("");
        return false;
    }
}


// ID validation at sign up form
function checkUserID() {
    var filled_id = document.getElementById("register_id").value;

    if (filled_id) {
        $.ajax({
            type: 'post',
            url: 'code.php',
            data: {
                user_registerID: filled_id,
            },
            success: function(response) {
                $('#id_status').html(response);
                if (response == "OK") {
                    return true;
                } else {

                    return false;
                }
            }
        });
    } else {
        $('#id_status').html("");
        return false;
    }
}


// confirmation for enabling and disabling users (DISABLE)
$(document).on('click', '#disableBtn', function confirmChg() {
    if (confirm("Are you sure you want to disable this user?")) {
        $.ajax({
            url: "code.php",
            method: "POST",
            data: {
                'chgBtn': 1,
            },
        });
        return true;
    } else {
        return false;
    }
});


// confirmation for enabling and disabling users (ENABLE)
$(document).on('click', '#enableBtn', function confirmChg() {
    if (confirm("Are you sure you want to enable this user?")) {
        $.ajax({
            url: "code.php",
            method: "POST",
            data: {
                'chgBtn': 1,
            },
        });
        return true;
    } else {
        return false;
    }
});


// to show the file name at upload tab
$('input[type="file"]').on('change', function(e) {
    //get the file name
    var fileName = e.target.files[0].name;
    //replace the "Choose a file" label
    $('.custom-file-label').html(fileName);
})