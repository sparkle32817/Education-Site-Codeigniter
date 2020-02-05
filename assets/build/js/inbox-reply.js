$(document).ready(function () {

    $(".new-message-form").on("submit", function (e) {

        // let type = $(".select-user").find("span.active").attr("type");
        let type = $("#user-type").val();

        console.log("type", type);

        e.preventDefault();

        let container = $(".message-container");
        // if (type == "")
        // {
        //     showMessage(container, "warning", "Please select user type!");
        //
        //     return false;
        // }

        if ($(this).valid())
        {
            let values = {};
            $.each($('.new-message-form').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            values["type"] = type;

            console.log(values);

            let response = "";
            $.ajax({
                url: base_url + "inbox/sendNew",
                method: "post",
                data: {formData: values},
                dataType: "text",
                async: false,
                success: function (data) {
                    response = data;
                }
            });

            if (response == "success")
            {
                $(".button-discard").click();

                showMessage(container, "success", "Message is sent successfully!");
            }
            else if (response == "no-user")
            {
                showMessage(container, "warning", "Receiver is wrong!");
            }
            else if (response == 'membership')
            {
                showMessage(container, "danger", "Please upgrade your membership for sending message!");
            }
            else
            {
                showMessage(container, "danger", "Sending is failed!");
            }
        }
        else
        {
            console.log("Invalid");

            return false;
        }


    });
    
    $(".button-discard").on("click", function () {
        $("#receiver").val("");
        $("#title").val("");
        $("#message").val("");
    });

    $('form[class="new-message-form"]').validate({
        rules: {
            receiver: 'required',
            title: 'required',
            message: 'required',
        },
        messages: {
            receiver: 'Please enter receiver',
            title: 'Please enter title',
            message: 'Please enter message',
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    /*
    * Functions
     */
    function showMessage(e,i,c){
        var l=$('<div class="alert alert-' + i + ' alert-dismissible fade show add-category-message-type" role="alert" style="margin: 10px 0 0 0;">\n' +
            '<strong>' + c + '</strong>' +
            '<span class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</span>\n' +
            '</div>');
        l.prependTo(e);
    };

});