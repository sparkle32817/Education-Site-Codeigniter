$(document).ready(function () {

    // console.log("this", $(this).context.location.origin);

    InitGrade();
    InitActivity();

    if ($(".select2-location").length > 0)
    {
        console.log("there is location");
        InitLocation();
    }

    $('.timepicker').timepicker({
        autoclose: true,
        minuteStep: 5,
        showSeconds: false,
        showMeridian: false,
        change: function(time) {
            // the input field
            var element = $(this), text;
            // get access to this Timepicker instance
            var timepicker = element.timepicker();
            text = 'Selected time is: ' + timepicker.format(time);
            console.log("time", text);
            element.siblings('span.help-line').text(text);
        }
    });
    
    $(".select2-grade").on("change", function () {
        setSubject($(this).val());
    });

    $(".profile-form").on("submit", function (e) {

        e.preventDefault();

        if ($(".btn-edit-profile").attr("status")=="readonly")
        {
            console.log("readonly->write");

            enabledForm();

            return false;
        }

        let timepicker = {};
        $(".time-picker-table .timepicker").each(function (index, obj) {
            timepicker[$(this).attr("day")+"_"+$(this).attr("status")] = $(this).val();
        });

        if ($(this).valid())
        {
            var values = {
                "avatar": canvas_pic,
                "grade": $(".select2-grade").val().toString(),
                "subject": $(".select2-subject").val().toString(),
                "activity": $(".select2-activity").val().toString(),
            };

            $.each($('.profile-form').serializeArray(), function(i, field) {
                if (field.name != "grade" && field.name != "activity" && field.name != "subject")
                {
                    values[field.name] = field.value;
                }
            });

            console.log(values);

            let response = "";
            $.ajax({
                url: base_url + "home/editProfile",
                method: "post",
                data: {formData: values},
                dataType: "text",
                async: false,
                success: function (data) {
                    response = data;
                }
            });

            let container = $(".profile-form").find(".row").find("div.col-lg-8");
            if (response == "success")
            {
                showMessage(container, "success", "Successfully changed!");

                disabledForm();
            }
        }
        else
        {
            console.log("Invalid");

            return false;
        }


    });

    $('form[class="profile-form"]').validate({
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
            address: 'required',
            grade: 'required',
            subject: 'required',
            activity: 'required',
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
            address: 'Please enter address',
            grade: 'Please select grade',
            subject: 'Please select subject',
            activity: 'Please select activity',
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
            url: base_url + 'common/getSubjects',
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
                $(".select2-subject").trigger("destroy");
                $(".select2-subject").html("");
                $(".select2-subject").html(subject_html);
                $(".select2-subject").select2({
                    placeholder: 'Select School Subject'
                });
            }
        });
    }

    function InitGrade() {
        $.ajax( {
            url: base_url + 'common/getGrades',
            method: "get",
            dataType: "json",
            async: false,
            success: function (result) {

                let grade_html = "";
                $.each(result.grades, function (index, grade) {
                    grade_html += `<option value="` + grade.id + `">` + grade.text + `</option>`;
                });
                $(".select2-grade").trigger("destroy");
                $(".select2-grade").html("");
                $(".select2-grade").html(grade_html);
                $(".select2-grade").select2({
                    placeholder: 'Select Grade'
                });

                $('.select2-grade').val(result.curInfo.split(","));
                $('.select2-grade').trigger('change');

                InitSubject(result.curInfo.split(","));
            }
        });
    }

    function InitSubject(gradIDs) {

        console.log(gradIDs);

        $.ajax( {
            url: base_url + 'common/getInitSubjects',
            method: "post",
            data: {ids: gradIDs},
            dataType: "json",
            async: false,
            success: function (result) {

                console.log("subjects", result);

                let subject_html = "";
                $.each(result.subjects, function (index, subject) {
                    subject_html += `<optgroup label="` + subject.text + `">`;
                    $.each(subject.children, function (i, child){
                        subject_html += `<option value="` + child.id + `">` + child.text + `</option>`;
                    });
                    subject_html += `</optgroup>`;
                });
                $(".select2-subject").trigger("destroy");
                $(".select2-subject").html("");
                $(".select2-subject").html(subject_html);
                $(".select2-subject").select2({
                    placeholder: 'Select School Subject'
                });

                $('.select2-subject').val(result.curInfo.split(","));
                $('.select2-subject').trigger('change');

            }
        });
    }

    function InitActivity() {
        $.ajax( {
            url: base_url + 'common/getActivities',
            method: "get",
            dataType: "json",
            async: false,
            success: function (result) {

                let activity_html = "";
                $.each(result.activities, function (index, activity) {
                    activity_html += `<optgroup label="` + activity.text + `">`;
                    $.each(activity.children, function (i, child){
                        activity_html += `<option value="` + child.id + `">` + child.text + `</option>`;
                    });
                    activity_html += `</optgroup>`;
                });
                $(".select2-activity").trigger("destroy");
                $(".select2-activity").html("");
                $(".select2-activity").html(activity_html);
                $(".select2-activity").select2({
                    placeholder: 'Select Extra Activity'
                });

                $('.select2-activity').val(result.curInfo.split(","));
                $('.select2-activity').trigger('change');

            }
        });
    }

    function InitLocation() {
        $.ajax( {
            url: base_url + 'common/getLocations',
            method: "get",
            dataType: "json",
            async: false,
            success: function (result) {

                let location_html = "";
                $.each(result.locations, function (index, location) {
                    location_html += `<option value="` + location.id + `">` + location.text + `</option>`;
                });
                $(".select2-location").trigger("destroy");
                $(".select2-location").html("");
                $(".select2-location").html(location_html);
                $(".select2-location").select2({
                    placeholder: 'Select Location'
                });

                $('.select2-location').val(result.curInfo.split(","));
                $('.select2-location').trigger('change');

                InitSubject(result.curInfo.split(","));
            }
        });
    }

    function makeValidation(element, name, error_msg) {
        let strElement = `<label class="text-error">`+error_msg+`</label>`;
        console.log("error message::", strElement);
        element.parent().find("div.error").html(strElement);
    }
    
    function enabledForm() {

        $(".profile-form").find(".alert").find(".close").click();

        $.each($('.profile-form input'), function(i, element) {
            $(this).prop("readonly", false);
        });

        $.each($('.profile-form select'), function(i, element) {
            $(this).prop("disabled", false);
        });

        $('.profile-form textarea').prop("readonly", false);

        $(".upload-button-div").css("display", "block");

        $(".btn-edit-profile").attr("status", "write");
        $(".btn-edit-profile span").text("Save Profile");

    }

    function disabledForm() {

        $.each($('.profile-form input'), function(i, element) {
            $(this).prop("readonly", true);
        });

        $.each($('.profile-form select'), function(i, element) {
            $(this).prop("disabled", true);
        });

        $('.profile-form textarea').prop("readonly", true);

        $(".upload-button-div").css("display", "none");

        $(".btn-edit-profile").attr("status", "readonly");
        $(".btn-edit-profile span").text("Edit Profile");

    }
});