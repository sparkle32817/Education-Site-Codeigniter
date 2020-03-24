$(document).ready(function () {

    $(".select2-location").selectpicker();
    $(".select2-grade").selectpicker();
    $(".select2-subject").selectpicker();

    setActivity();

    $("#tutor-service-area").on("change", function () {
        checkValidate1();
    });

    $("#tutor-grade").on("change", function () {
        setSubject($(this).val());
        checkValidate2();
    });

    $("#tutor-subject").on("change", function () {
        checkValidate2();
    });

    $("#tutor-activity").on("change", function () {
        if($(this).val() == null){
            $(".qualification").prop("required", true);
            $(".certification").prop("required", true);
        } else {
            $(".qualification").prop("required", false);
            $(".certification").prop("required", false);

            $("#qualification-error").remove();
            $("#certification-error").remove();
        }
        checkValidate2();
    });

    $('.calendar-cell').on('click', function(){
        if( $(this).hasClass('calendar-cell-actived') ){
            $(this).removeClass('calendar-cell-actived');
        }else{
            $(this).addClass('calendar-cell-actived');
        }
    });

    $(".tutor-form").on("submit", function (e) {

        e.preventDefault();

        let timeline = [];
        $('.calendar-cell-actived').each((index, element) => timeline.push($(element).attr('a-time')));

        checkValidate1();
        checkValidate2();

        if ($(this).valid())
        {
            if (!checkValidate1() || !checkValidate2()) {
                return false;
            }

            if (!$("#checkbox_condition").is(":checked"))
            {
                $("#checkbox_condition").focus();
                $("#checkbox_condition").closest("div.pf-field").find("div.error").append($(`<span class="error">Please check terms and conditions</span>`));
                return  false;
            }

            var values = {
                "avatar": canvas_pic,
                "grade": $("#tutor-grade").val()==null? null: $("#tutor-grade").val().toString(),
                "subject": $("#tutor-subject").val()==null? null: $("#tutor-subject").val().toString(),
                "activity": $("#tutor-activity").val()==null? null: $("#tutor-activity").val().toString(),
                "location": $("#tutor-service-area").val().toString(),
                "timeline": timeline.toString()
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
                number: true,
                min: 15
            },
            gender: 'required',
            address: 'required',
            // qualification: 'required',
            // certification: 'required',
            experience: 'required',
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
                required: 'Please enter age',
                number: 'Age should be number',
                min: 'Age should be greater than or equal to 15'
            },
            gender: 'Please select gender',
            address: 'Please enter address',
            // qualification: 'Please enter personal highest qualification',
            // certification: 'Please enter personal certification',
            experience: 'Please enter year of the experience',
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

    function checkValidate1() {

        $("#tutor-service-area").closest("div.pf-field").find("div.error>span.error").remove();

        if ($("#tutor-service-area").val() == null)
        {
            $("#tutor-service-area").closest("div.pf-field").find("div.error").append($(`<span class="error">Please select service area</span>`));

            return false;
        }

        return true;
    }

    function checkValidate2() {

        let grade = $("#tutor-grade");
        let subject = $("#tutor-subject");
        let activity = $("#tutor-activity");
        grade.closest("div.pf-field").find("div.error>span.error").remove();
        subject.closest("div.pf-field").find("div.error>span.error").remove();
        activity.closest("div.pf-field").find("div.error>span.error").remove();

        if (grade.val() == null && subject.val() == null && activity.val() == null) {
            grade.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select grade</span>`));
            subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));
            activity.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select activity</span>`));

            return false;
        }
        else if (grade.val() != null && subject.val() == null)
        {
            subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));

            return false;
        }

        return true;
    }

    function setSubject(gradIDs) {
        $.ajax( {
            url: base_url + 'register/getSubjects',
            method: "post",
            data: {ids: gradIDs, multiple:true},
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

});