$(document).ready(function () {

    $(".select2-location").selectpicker();
    $(".select2-grade").selectpicker();
    $(".select2-subject").selectpicker();

    setActivity();

    $("#tutor-grade").on("change", function () {
        setSubject($(this).val());

        if ($(this).val()==null || $(this).val()=="")
        {
            $('.select2-activity').prop('disabled',false);
            $('.select2-activity').selectpicker('refresh');
        }
        else
        {
            $('.select2-activity').prop('disabled',true);
            $('.select2-activity').selectpicker('refresh');
        }
    });

    $("#tutor-activity").on("change", function () {

        if ($(this).val()==null || $(this).val()=="")
        {
            $('.select2-grade').prop('disabled',false);
            $('.select2-grade').selectpicker('refresh');

            $('.select2-subject').prop('disabled',false);
            $('.select2-subject').selectpicker('refresh');
        }
        else
        {
            $('.select2-grade').prop('disabled',true);
            $('.select2-grade').selectpicker('refresh');

            $('.select2-subject').prop('disabled',true);
            $('.select2-subject').selectpicker('refresh');
        }
    });

    $('.timepicker').timepicker({
        autoclose: true,
        minuteStep: 5,
        showSeconds: false,
        showMeridian: false
    });

    $(".tutor-form").on("submit", function (e) {

        e.preventDefault();

        let timepicker = {};
        $(".time-picker-table .timepicker").each(function (index, obj) {
            timepicker[$(this).attr("day")] = $(this).val();
        });

        if ($(this).valid())
        {
            if (!$("#checkbox_condition").is(":checked"))
            {
                makeValidation($("#checkbox_condition"), "condition", "Please check terms and conditions");
                $("#checkbox_condition").focus();
                return  false;
            }
            else
            {
                makeValidation($("#checkbox_condition"), "condition", "");
            }

            var values = {
                "avatar": canvas_pic,
                "grade": $(".select2-grade").val().toString(),
                "subject": $(".select2-subject").val().toString(),
                "activity": $(".select2-activity").val().toString(),
                // "timeline": JSON.stringify(timepicker)
            };

            $.each($('.tutor-form').serializeArray(), function(i, field) {
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

            values['timeline'] = JSON.stringify(timepicker);

            console.log(values);

            let response = "";
            $.ajax({
                url: base_url + "register/registerTutor",
                method: "post",
                data: {formData: values},
                dataType: "text",
                async: false,
                success: function (data) {
                    response = data;
                }
            });

            let container = $(".tutor-form").find(".row").find("div.col-lg-8");
            if (response == "success")
            {
                showMessage(container, "success", "Successfully registered!");
                window.location.href = base_url + "tutorMembership";
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

    $('form[class="tutor-form"]').validate({
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
            service_area: 'required',
            address: 'required',
            grade: 'required',
            subject: 'required',
            activity: 'required',
            qualification: 'required',
            certification: 'required',
            hourly_rate: {
                required: true,
                number: true
            },
            description: 'required',
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
                required: 'Please enter phone number',
                number: 'Age should be number'
            },
            gender: 'Please select gender',
            service_area: 'Please select gender',
            address: 'Please enter address',
            grade: 'Please enter grade',
            subject: 'Please select subject',
            activity: 'Please select activity',
            qualification: 'Please enter personal highest qualification',
            certification: 'Please enter personal certification',
            hourly_rate: {
                required: 'Please enter expect hourly rate',
                number: 'Hourly rate should be number'
            },
            description: 'Please enter description',
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

    function setSubject(gradIDs) {
        $.ajax( {
            url: base_url + 'register/getSubjects',
            method: "post",
            data: {ids: gradIDs},
            dataType: "json",
            async: false,
            success: function (subjects) {

                console.log("subjects", subjects);

                let subject_html = "";
                $.each(subjects, function (index, subject) {
                    subject_html += `<optgroup label="` + subject.text + `">`;
                    $.each(subject.children, function (i, child){
                        subject_html += `<option value="` + child.id + `">` + child.text + `</option>`;
                    });
                    subject_html += `</optgroup>`;
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