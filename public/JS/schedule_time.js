$(".days input").change(function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().append("<input type='time' name='time[]'>");
    } else {
        $(this).parent().parent().find("input[type='time']").remove();
    }
});