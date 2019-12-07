$(document).ready(function () {

    let type = "";
    $(".select-user span").on("click", function () {
        type = $(this).attr("type");

        $(".account-popup").find(".alert").remove();
    });

    $(".login-form").on("submit", function (e) {
        e.preventDefault();

        console.log("here");

        if (type == "")
        {
            showMessage($(".account-popup"), "warning", "Please select user type!");

            return false;
        }

        if ($(this).valid())
        {
            let values = {};
            $.each($('.login-form').serializeArray(), function(i, field) {
                if (field.name != "r_password")
                {
                    values[field.name] = field.value;
                }
            });

            values["type"] = type;

            let response = "";
            $.ajax({
                url: base_url + "Login/login",
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
                window.location.href = base_url + type;
            }
            else
            {
                showMessage($(".login-form"), "danger", "Username or password is wrong!");
            }
        }
        else
        {
            console.log("Invalid");

            return false;
        }
    });

    $('form[class="login-form"]').validate({
        rules: {
            name: 'required',
            password: 'required',
        },
        messages: {
            name: 'Please enter username',
            password: 'Please enter password',
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