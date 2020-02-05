$(document).ready(function () {

    $("div.list-tutor").html(getTutorList());
    $("div.list-education").html(getEducationList());

    /*
    *   Events
     */
    $("#tutor-search-button").on("click", function () {
        $("div.list-tutor").html(getTutorList());
    });

    $("#tutor-clear-button").on("click", function () {

        $("#student-tutor-gender").val("");
        $("#student-tutor-hourly").val("");
        $("#student-tutor-qualification").val("");

        $("div.list-tutor").html(getTutorList());
    });

    $("#education-search-button").on("click", function () {
        $("div.list-education").html(getEducationList());
    });

    $("#education-clear-button").on("click", function () {

        $("#student-education-location").val("");
        $("#student-education-rating").val("");

        $("div.list-education").html(getEducationList());
    });

    /*
    *   Functions
     */

    function getTutor() {

        let gender = $("#student-tutor-gender").val();
        let hourly = $("#student-tutor-hourly").val();
        let qualification = $("#student-tutor-qualification").val();

        var response = [];
        $.ajax({
            url: base_url + "tutor/getTutor",
            method: "post",
            data: {gender:gender, hourly_rate: hourly, qualification: qualification},
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
                                    </div>
                                </div>
                                <h6>
                                    Name &nbsp;&nbsp;<span style="color: red">` + tutor.name + `</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                </h6>
                                <h6>
                                    Gender&nbsp;&nbsp;<span>` + gender + `</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    Age&nbsp;&nbsp;<span>` + tutor.age + `</span>
                                </h6>
                                <h6>
                                    Qualification&nbsp;&nbsp;<span>` + tutor.qualification + `</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                    Expected Salary&nbsp;&nbsp;<span>` + tutor.hourly_rate + `</span>&nbsp;$/hr
                                </h6>
                                <h6>Self description</h6>
                                <h6 class="text-self-description-2">
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

    function getEducation() {

        let location = $("#student-education-location").val();
        let rating = $("#student-education-rating").val();

        var response = [];
        $.ajax({
            url: base_url + "education/getEducation",
            method: "post",
            data: {location: location, rating: rating},
            dataType: "json",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        return response;
    }

    function getEducationList() {

        let educations = getEducation();
        let education_html = '';

        $.each(educations, function (index, education) {

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