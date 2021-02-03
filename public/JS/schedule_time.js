$(".days input").change(function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().append("<input type='time' name='time[]' value='09:00:00'>");
    } else {
        $(this).parent().parent().find("input[type='time']").remove();
    }
});