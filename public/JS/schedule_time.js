$(".days input").change(function () {
    if ($(this).is(":checked")) {
        $(this).parent().parent().append(
            "<div class='time form-group mt-2'>" +
            "<label for='start'>Lesson starts</label>" +
            "<input type='time' name='start_time[]' value='09:00:00' id='start' class='form-control'>" +
            "</div>" +
            "<div class='time form-group'>" +
            "<label for='end'>Lesson ends</label>" +
            "<input type='time' name='end_time[]' value='18:00:00' id='end' class='form-control'>" +
            "</div>"
        );
    } else {
        $(this).parent().parent().find(".time").remove();
    }
});