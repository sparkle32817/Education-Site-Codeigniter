$(document).ready(function() {

  let clickable = false;

  InitGrade();
  InitActivity();

  $('.calendar-cell').on('click', function() {
    if (!clickable) return;

    if ($(this).hasClass('calendar-cell-actived')) {
      $(this).removeClass('calendar-cell-actived');
    } else {
      $(this).addClass('calendar-cell-actived');
    }
  });

  $("select.select2-grade").on("change", function() {
    setSubject($(this).val());

    checkValidate();
  });

  $("select.select2-subject").on("change", function() {
    checkValidate();
  });

  $("select.select2-activity").on("change", function() {
    checkValidate();
  });

  $(".profile-form").on("submit", function(e) {

    e.preventDefault();

    if ($(".btn-edit-profile").attr("status") == "readonly") {
      enabledForm();

      return false;
    }

    if ($(this).valid() && checkValidate()) {
      let timeline = [];
      $('.calendar-cell-actived').each((index, element) => timeline.push($(element).attr('a-time')));

      var values = {
        "avatar": canvas_pic,
        "grade": $("select.select2-grade").val() == null ? null : $("select.select2-grade").val().toString(),
        "subject": $("select.select2-subject").val() == null ? null : $("select.select2-subject").val().toString(),
        "activity": $("select.select2-activity").val() == null ? null : $("select.select2-activity").val().toString(),
        "timeline": timeline.toString()
      };

      $.each($('.profile-form').serializeArray(), function(i, field) {
        values[field.name] = field.value;
      });

      let response = "";
      $.ajax({
        url: base_url + "home/editProfile",
        method: "post",
        data: {
          formData: values
        },
        dataType: "text",
        async: false,
        success: function(data) {
          response = data;
        }
      });

      let container = $(".profile-form").find(".row").find("div.col-lg-8");
      if (response == "success") {
        $("img.user-avatar").attr("src", canvas_pic);
        $("span.user-name").text(values["name"]);

        showMessage(container, "success", "Successfully changed!");

        disabledForm();
      }
    } else {
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
      description: 'Please enter description',
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

  /*
   * Functions
   */
  function setSubject(gradIDs) {
    $.ajax({
      url: base_url + 'common/getSubjects',
      method: "post",
      data: {
        ids: gradIDs
      },
      dataType: "json",
      async: false,
      success: function(subjects) {

        console.log("subjects", subjects);

        let subject_html = "";
        $.each(subjects, function(index, subject) {
          subject_html += `<optgroup label="` + subject.text + `">`;
          $.each(subject.children, function(i, child) {
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

  function InitGrade() {
    $.ajax({
      url: base_url + 'common/getGrades',
      method: "get",
      dataType: "json",
      async: false,
      success: function(result) {

        let grade_html = "";
        $.each(result.grades, function(index, grade) {
          grade_html += `<option value="` + grade.id + `">` + grade.text + `</option>`;
        });

        $(".select2-grade").selectpicker("destroy");
        $(".select2-grade").html("");
        $(".select2-grade").html(grade_html);
        $(".select2-grade").selectpicker('val', result.curInfo.split(","));

        InitSubject(result.curInfo.split(","));
      }
    });
  }

  function InitSubject(gradIDs) {

    console.log(gradIDs);

    if (gradIDs == null || gradIDs == "") {
      $(".select2-subject").selectpicker('val', []);
      return;
    }

    $.ajax({
      url: base_url + 'common/getInitSubjects',
      method: "post",
      data: {
        ids: gradIDs
      },
      dataType: "json",
      async: false,
      success: function(result) {

        let subject_html = "";
        $.each(result.subjects, function(index, subject) {
          subject_html += `<optgroup label="` + subject.text + `">`;
          $.each(subject.children, function(i, child) {
            subject_html += `<option value="` + child.id + `">` + child.text + `</option>`;
          });
          subject_html += `</optgroup>`;
        });

        $(".select2-subject").selectpicker("destroy");
        $(".select2-subject").html("");
        $(".select2-subject").html(subject_html);
        $(".select2-subject").selectpicker('val', result.curInfo.split(","));

      }
    });
  }

  function InitActivity() {
    $.ajax({
      url: base_url + 'common/getActivities',
      method: "get",
      dataType: "json",
      async: false,
      success: function(result) {

        let activity_html = "";
        $.each(result.activities, function(index, activity) {
          activity_html += `<optgroup label="` + activity.text + `">`;
          $.each(activity.children, function(i, child) {
            activity_html += `<option value="` + child.id + `">` + child.text + `</option>`;
          });
          activity_html += `</optgroup>`;
        });

        $(".select2-activity").selectpicker("destroy");
        $(".select2-activity").html("");
        $(".select2-activity").html(activity_html);
        $(".select2-activity").selectpicker('val', result.curInfo.split(","));
      }
    });
  }

  function enabledForm() {
    clickable = true;

    $(".profile-form").find(".alert").find(".close").click();

    $.each($('.profile-form input'), function(i, element) {
      $(this).prop("readonly", false);
    });

    $.each($('.profile-form select'), function(i, element) {
      $(this).prop("disabled", false);
      if ($(this).hasClass("select2")) {
        $(this).selectpicker('refresh');
      }
    });

    $('.opening-time').addClass('editable');

    $('.profile-form textarea').prop("readonly", false);

    $(".upload-button-div").css("display", "block");

    $(".btn-edit-profile").attr("status", "write");
    $(".btn-edit-profile span").text("Save Profile");
  }

  function disabledForm() {
    clickable = false;

    $.each($('.profile-form input'), function(i, element) {
      $(this).prop("readonly", true);
    });

    $.each($('.profile-form select'), function(i, element) {
      $(this).prop("disabled", true);
      if ($(this).hasClass("select2")) {
        $(this).selectpicker('refresh');
      }
    });

    $('.profile-form textarea').prop("readonly", true);

    $(".upload-button-div").css("display", "none");

    $(".btn-edit-profile").attr("status", "readonly");
    $(".btn-edit-profile span").text("Edit Profile");

  }

  function checkValidate() {
    let grade = $("select.select2-grade");
    let subject = $("select.select2-subject");
    let activity = $("select.select2-activity");
    $("div.pf-field").find("div.error>span.error").remove();

    if (grade.val() == null && subject.val() == null && activity.val() == null) {
      grade.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select grade</span>`));
      subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));
      activity.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select activity</span>`));

      return false;
    } else if (grade.val() != null && subject.val() == null) {
      subject.closest("div.pf-field").find("div.error").append($(`<span class="error">Please select subject</span>`));

      return false;
    }

    return true;
  }

  function showMessage(e, i, c) {
    var l = $('<div class="alert alert-' + i + ' alert-dismissible fade show add-category-message-type" role="alert" style="margin: 10px 0 0 0;">\n' +
      '<strong>' + c + '</strong>' +
      '<span class="close" data-dismiss="alert" aria-label="Close" aria-hidden="true">&times;</span>\n' +
      '</div>');
    l.prependTo(e);
  };

});