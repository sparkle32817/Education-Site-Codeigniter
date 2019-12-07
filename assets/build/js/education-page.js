$(document).ready(function () {

    let total_tutor = 'all';
    let gender = '';
    let hourly = '';
    let qualification = '';

    let total_student = 'all';
    let location = '';
    let subject = '';
    let grade = '';

    $("div.list-tutor").html(getTutorList());
    $("div.list-student").html(getStudentList());

    console.log("getTutorList");
    
    /*
    *   Events
     */
    $("#tutor-search-button").on("click", function () {
        gender = $(".education-tutor-gender").val();
        hourly = $(".education-tutor-hourly").val();
        qualification = $(".education-tutor-qualification").val();

        if (gender == '' && hourly == '' && qualification == '' )
        {
            total_tutor = 'all';
        }
        else
        {
            total_tutor = 'part';
        }

        $("div.list-tutor").html(getTutorList());
    });

    $("#tutor-clear-button").on("click", function () {
        gender = "";
        hourly = "";
        qualification = "";

        total_tutor = 'all';

        $("div.list-tutor").html(getTutorList());
    });

    $("#student-search-button").on("click", function () {
        location = $(".education-student-location").val();
        subject = $(".education-student-subject").val();
        grade = $(".education-student-grade").val();

        if (location == null && subject == '' && grade == '' )
        {
            total_student = 'all';
        }
        else
        {
            total_student = 'part';
        }

        $("div.list-student").html(getStudentList());
    });

    $("#student-clear-button").on("click", function () {
        location = "";
        subject = "";
        grade = "";

        total_student = 'all';

        $("div.list-student").html(getStudentList());
    });

    /*
    *   Functions
     */

    function getTutor() {

        var response = [];
        $.ajax({
            url: base_url + "tutor/getTutor",
            method: "post",
            data: {total: total_tutor, gender:gender, hourly_rate: hourly, qualification: qualification},
            dataType: "json",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        return response;
    }

    function getTutorList() {

        let tutors = getTutor();
        let tutor_html = '';

        $.each(tutors, function (index, tutor) {

            let gender = tutor.gender==1? "Male": "Female";

            tutor_html += `<div class="emply-list list-item">
                            <div class="emply-list-thumb">
                                <a href="javascript:;" title="">
                                    <img src="` + tutor.avatar + `" alt="">
                                </a>
                            </div>
                            <div class="emply-list-info">
                                <div class="emply-pstn" style="font-size: 15px;">
                                    <div class="container">
                                    ` + getRatingHtml(tutor.rating) + `
                                    ` + tutor.jobs + `
                                    </div>
                                </div>
                                <h6>
                                    Name &nbsp;&nbsp;<span>` + tutor.name + `</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    Gender&nbsp;&nbsp;<span>` + gender + `</span>
                                </h6>
                                <h6>
                                    Age&nbsp;&nbsp;<span>` + tutor.age + `</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    Expected Salary&nbsp;&nbsp;<span>` + tutor.hourly_rate + `</span>&nbsp;$/hr</h6>
                                <h6>Self description</h6>
                                <h6 class="text-self-description">
                                    ` + tutor.description + `
                                </h6>
                                <a href="` + base_url + `tutor/detail/` + tutor.id + `">
                                    <button type="button" class="btn btn-outline-primary">More</button>
                                </a>
                            </div>
                        </div>`;
        });

        return tutor_html;
    }

    function getStudent() {

        var response = [];
        $.ajax({
            url: base_url + "student/getStudent",
            method: "post",
            data: {total: total_student, location: location, subject: subject, grade: grade},
            dataType: "json",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        return response;
    }

    function getStudentList() {

        let students = getStudent();
        let student_html = '';

        $.each(students, function (index, student) {

            student_html += `<div class="emply-list list-item">
                                <div class="emply-list-thumb">
                                    <a href="javascript:;" title="">
                                        <img src="` + student.avatar + `" alt=""></a>
                                </div>
                                <div class="emply-list-info">
                                    <h6>Name &nbsp;&nbsp;<span>` + student.name + `</span></h6>
                                    <h6>Grade &nbsp;&nbsp;<span>` + student.grade + `</span></h6>
                                    <h6 class="required-subject">Required teaching subject &nbsp;&nbsp;<span>` + student.subject +`</span></h6>
                                    <h6><i class="la la-map-marker"></i> &nbsp;&nbsp;<span>` + student.location + `</span></h6>
                                    <a href="` + base_url + `student/detail/` + student.id + `">
                                        <button type="button" class="btn btn-outline-primary" style="margin-top: 29px;">More
                                        </button>
                                    </a>
                                </div>
                            </div>`;
        });

        return student_html;
    }

    function getRatingHtml(rating) {

        if (rating == 0 || rating==null)
        {
            return '<span style="font-size: 18px; color:#0c91e5;">No reviews yet</span>';
        }

        var str_rating = '<span class="badge badge-pill badge-secondary">' + rating  + '</span>';
        var cnt = Math.round(rating - 0.1);

        for (var i = 0; i < cnt; i++){
            str_rating += '<span class="fa fa-star checked"></span>';
        }

        if (rating>cnt)
        {
            cnt ++;
            str_rating += '<span class="fa fa-star-half-o checked"></span>';
        }

        for (var i=0; i<(5-cnt); i++) {
            str_rating += '<span class="fa fa-star-o checked"></span>';
        }

        return str_rating;
    }
});