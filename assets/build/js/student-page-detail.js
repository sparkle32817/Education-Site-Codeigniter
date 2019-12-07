$(document).ready(function () {

    //Events
    $(".form-review").on("submit", function (e) {
        e.preventDefault();

        let studentID = $("#student-id").val();
        let studentName= $("#student-name").val();
        let description = $("#txt-review").val();
        if (description == "")
        {
            return false;
        }

        $.ajax({
            url: base_url + "student/postMessage",
            method: "post",
            data: {receiver_id: studentID, receiver_name: studentName, receiver_type: "student", title: "To parent", message: description},
            dataType: "text",
            async: false,
            success: function (data) {
                if (data == "success")
                {
                    // $("#div-review").css("display", "none");
                    $("#txt-review").val("");
                }
            }
        });
    });
});