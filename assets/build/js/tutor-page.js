$(document).ready(function() {

  $("div.list-education").html(getEducationList());
  $("div.list-student").html(getStudentList());

  /*
   *   Events
   */
  $("#tutor-student-grade").on("change", function() {

    let gradeID = $(this).val();

    if (gradeID == "") {
      $("#tutor-student-subject").html("<option value=\"\">-Select School Subject-</option>");
      return;
    }

    $.ajax({
      url: base_url + 'common/getSubjectsBySingle',
      method: "post",
      data: {
        gradeId: gradeID
      },
      dataType: "json",
      async: false,
      success: function(subjects) {

        console.log("subjects", subjects);

        let subject_html = "<option value=\"\">-Select School Subject-</option>";
        $.each(subjects, function(index, subject) {
          subject_html += `<option value="` + subject.id + `">` + subject.text + `</option>`;
        });

        $("#tutor-student-subject").html(subject_html);

      }
    });
  });

  $("#education-search-button").on("click", function() {
    $("div.list-education").html(getEducationList());
  });

  $("#education-clear-button").on("click", function() {
    $("#tutor-education-location").val("");
    $("#tutor-education-rating").val("");

    $("div.list-education").html(getEducationList());
  });

  $("#student-search-button").on("click", function() {
    $("div.list-student").html(getStudentList());
  });

  $("#student-clear-button").on("click", function() {
    $("#tutor-student-location").val("");
    $("#tutor-student-subject").val("");
    $("#tutor-student-grade").val("");

    $("div.list-student").html(getStudentList());
  });

  /*
   *   Functions
   */
  function getEducation() {

    let location = $("#tutor-education-location").val();
    let rating = $("#tutor-education-rating").val();

    var response = [];
    $.ajax({
      url: base_url + "education/getEducation",
      method: "post",
      data: {
        location: location,
        rating: rating
      },
      dataType: "json",
      async: false,
      success: function(data) {
        response = data;
      }
    });

    return response;
  }

  function getEducationList() {

    let educations = getEducation();
    let education_html = '';

    $.each(educations, function(index, education) {

      education_html += `<div class="emply-list list-item">
                            <div class="emply-list-thumb">
                              <a href="javascript:;" title="">
                                <img src="` + education.avatar + `" alt="">
                              </a>
                            </div>
                            <div class="emply-list-info">
                            <div class="emply-pstn" style="font-size: 15px;">
                              <div class="container">
                              ` + getRatingHtml(education.rating) + `
                              </div>
                            </div>
                              <h6>
                                Name &nbsp;&nbsp;<span style="color: red">` + education.name + `</span>
                              </h6>
                              <h6>
                                Address&nbsp;&nbsp;<span style="color: red">` + education.address + `</span>
                              <h6>Self description</h6>
                              <h6 class="text-self-description-1">
                                ` + education.description + `
                              </h6>
                              <a href="` + base_url + `education/detail/` + education.id + `">
                                <button type="button" class="btn btn-outline-primary">More</button>
                              </a>
                            </div>
                          </div>`;
    });

    return education_html;
  }

  function getStudent() {

    let location = $("#tutor-student-location").val();
    let subject = $("#tutor-student-subject").val();
    let grade = $("#tutor-student-grade").val();

    var response = [];
    $.ajax({
      url: base_url + "student/getStudent",
      method: "post",
      data: {
        location: location,
        subject: subject,
        grade: grade
      },
      dataType: "json",
      async: false,
      success: function(data) {
        response = data;
      }
    });

    return response;
  }

  function getStudentList() {

    let students = getStudent();
    let student_html = '';

    $.each(students, function(index, student) {

      student_html += `<div class="emply-list list-item">
                          <div class="emply-list-thumb">
                            <a href="javascript:;" title="">
                              <img src="` + student.avatar + `" alt="">
                            </a>
                          </div>
                          <div class="emply-list-info">
                            <h6>Name &nbsp;&nbsp;<span>` + student.name + `</span></h6>
                            <h6>Grade &nbsp;&nbsp;<span>` + student.grade + `</span></h6>
                            <h6 class="required-subject">Required subject &nbsp;&nbsp;<span>` + student.subject + `</span></h6>
                            <h6><i class="la la-map-marker"></i> &nbsp;&nbsp;<span>` + student.location + `</span></h6>
                            <a href="` + base_url + `student/detail/` + student.id + `">
                              <button type="button" class="btn btn-outline-primary" style="margin-top: 24px;">More</button>
                            </a>
                          </div>
                        </div>`;
    });

    return student_html;
  }

  function getRatingHtml(rating) {

    if (rating == 0 || rating == null) {
      return '<span style="font-size: 18px; color:#0c91e5;">No reviews yet</span>';
    }

    var str_rating = '<span class="badge badge-pill badge-secondary">' + rating + '</span>';
    var cnt = Math.round(rating - 0.1);

    for (var i = 0; i < cnt; i++) {
      str_rating += '<span class="fa fa-star checked"></span>';
    }

    if (rating > cnt) {
      cnt++;
      str_rating += '<span class="fa fa-star-half-o checked"></span>';
    }

    for (var i = 0; i < (5 - cnt); i++) {
      str_rating += '<span class="fa fa-star-o checked"></span>';
    }

    return str_rating;
  }
});