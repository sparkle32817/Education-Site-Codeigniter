$(document).ready(function () {

    $(".select2-grade").selectpicker();
    $(".select2-subject").selectpicker();
    setActivity();

    $('.calendar-cell').on('click', function(){
        if( $(this).hasClass('calendar-cell-actived') ){
            $(this).removeClass('calendar-cell-actived');
        }else{
            $(this).addClass('calendar-cell-actived');
        }
    });

    $("#location1").on("change", function () {

        if ($(this).val()==1)
        {
            $("#location2").css("display", "none");
            $("#location2").prop("required", false);
        }
        else if ($(this).val()==0)
        {
            $("#location2").css("display", "block");
            $("#location2").prop("required", true);
        }
    });

    $("#student-grade").on("change", function () {
        setSubject($(this).val());

        checkValidate();
    });

    $("#student-subject").on("change", function () {
        checkValidate();
    });

    $("#student-activity").on("change", function () {
        checkValidate();
    });

    $(".student-form").on("submit", function (e) {

        e.preventDefault();

        let timeline = [];
        $('.calendar-cell-actived').each((index, element) => timeline.push($(element).attr('a-time')));

        checkValidate();

        if ($(this).valid())
        {
            if (!checkValidate()) {
                return false;
            }

            if (!$("#checkbox_condition").is(":checked"))
            {
                $("#checkbox_condition").closest("div.pf-field").find("div.error").append($(`<span class="error">Please check terms and conditions</span>`));
                $("#checkbox_condition").focus();
                return  false;
            }

            var values = {
                "avatar": canvas_pic,
                "grade": $("#student-grade").val()==null? null: $("#student-grade").val().toString(),
                "subject": $("#student-subject").val()==null? null: $("#student-subject").val().toString(),
                "activity": $("#student-activity").val()==null? null: $("#student-activity").val().toString(),
                "timeline": timeline.toString()
            };

            $.each($('.student-form').serializeArray(), function(i, field) {
                if (field.name != "r_password" && field.name != "grade" && field.name != "activity" && field.name != "subject")
                {
                    values[field.name] = field.value;
                    console.log("correct->"+field.name+"::"+field.value);
                }
                else
                {
                    console.log("other->"+field.name+"::"+field.value);
                }
            });

            console.log(values);

            let response = "";
            $.ajax({
                url: base_url + "register/registerStudent",
                method: "post",
                data: {formData: values},
                dataType: "text",
                async: false,
                success: function (data) {
                    response = data;
                }
            });

            let container = $(".student-form").find(".row").find("div.col-lg-8");
            if (response == "success")
            {
                showMessage(container, "success", "Successfully registered!");
                window.location.href = base_url + "login";
            }
            else if (response == "already")
            {
                showMessage(container, "warning", "Already registered. Please login now!");
            }
            else
            {
                showMessage(container, "danger", "Registration failed!");
            }
        }
        else
        {
            console.log("Invalid");

            return false;
        }


    });

    $('form[class="student-form"]').validate({
        rules: {
            name: 'required',
            phone: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            r_password: {
                required: true,
                minlength: 6,
                equalTo: ".password"
            },
            age: {
                required: true,
                number: true
            },
            gender: 'required',
            address: 'required',
            available_time: 'required',
            lesson_week: {
                required: true,
                number: true
            },
            private_group: 'required',
        },
        messages: {
            name: 'Please enter education name',
            phone: {
                required: 'Please enter phone number',
                number: 'Phone number should be number'
            },
            email: {
                required: 'Please enter email',
                email: 'The email should be in the format: abc@domain.tld'
            },
            password: {
                required: 'Please enter password',
                minlength: 'Password must be at least 6 characters long'
            },
            r_password: {
                required: 'Please enter confirm password',
                minlength: 'Password must be at least 6 characters long',
                equalTo: 'Confirm password should be same with password'
            },
            age: {
                required: 'Please enter your age',
                number: 'Age should be number'
            },
            gender: 'Please select gender',
            address: 'Please enter address',
            available_time: 'Please enter available time',
            lesson_week: {
                required: 'Please enter lesson per week',
                number: 'Lesson per week should be number'
            },
            private_group: 'Please enter private group',
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

    function checkValidate() {

        let grade = $("#student-grade");
        let subject = $("#student-subject");
        let activity = $("#student-activity");
        $("div.pf-field").find("div.error>span.error").remove();

        console.log('grade::', grade.val());
        console.log('subject::', subject.val());
        console.log('activity::', activity.val());

        if (grade.val() === "" && subject.val() == null && activity.val() == null) {
            grade.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select grade</span>`));
            subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));
            activity.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select activity</span>`));

            return false;
        }
        else if (grade.val() !== "" && subject.val() == null)
        {
            subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));

            return false;
        }

        return true;
    }

    function setSubject(gradID) {
        $.ajax( {
            url: base_url + 'register/getSubjects',
            method: "post",
            data: {ids: gradID, multiple: false},
            dataType: "json",
            async: false,
            success: function (subjects) {

                console.log("subjects", subjects);

                let subject_html = "";
                $.each(subjects, function (index, subject) {
                    subject_html += `<option value="` + subject.id + `">` + subject.text + `</option>`;
                });

                $(".select2-subject").selectpicker("destroy");
                $(".select2-subject").html("");
                $(".select2-subject").html(subject_html);
                $(".select2-subject").selectpicker();
            }
        });
    }

    function setActivity() {
        $.ajax( {
            url: base_url + 'register/getActivities',
            method: "get",
            dataType: "json",
            async: false,
            success: function (activities) {

                let activity_html = "";
                $.each(activities, function (index, activity) {
                    activity_html += `<optgroup label="` + activity.text + `">`;
                    $.each(activity.children, function (i, child){
                        activity_html += `<option value="` + child.id + `">` + child.text + `</option>`;
                    });
                    activity_html += `</optgroup>`;
                });

                $(".select2-activity").html("");
                $(".select2-activity").html(activity_html);
                $(".select2-activity").selectpicker();
            }
        });
    }

    function makeValidation(element, name, error_msg) {
        let strElement = `<label class="text-error">`+error_msg+`</label>`;
        console.log("error message::", strElement);
        element.parent().find("div.error").html(strElement);
    }
});