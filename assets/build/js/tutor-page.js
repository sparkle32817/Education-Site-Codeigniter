$(document).ready(function () {

    let total_tutor = 'all';
    let location = '';
    let subject = '';
    let grade = '';

    $("div.list-tutor").html(getTutorList());

    /*
    *   Events
     */
    $("#tutor-search-button").on("click", function () {
        location = $(".tutor-location").val();
        subject = $(".tutor-subject").val();
        grade = $(".tutor-grade").val();

        console.log("location::", location);
        console.log("subject::", subject);
        console.log("grade::", grade);

        if (location == '' && subject == '' && grade == '' )
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
        location = "";
        subject = "";
        grade = "";

        total_tutor = 'all';

        $("div.list-tutor").html(getTutorList());
    });

    /*
    *   Functions
     */

    function getTutor() {

        var response = [];
        $.ajax({
            url: base_url + "tutor/getTutorFromOwnPage",
            method: "post",
            data: {total: total_tutor, location:location, subject: subject, grade: grade},
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
                                        <img src="` + tutor.avatar + `" alt="" />
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
                                        Name &nbsp;&nbsp;<span>` + tutor.name + `</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Expected Fee &nbsp;&nbsp;<span>` + tutor.hourly_rate + `</span>&nbsp;$/hr</h6>
                                    <h6>
                                        grade &nbsp;&nbsp;<span>` + tutor.grade + `</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Available Time &nbsp;&nbsp;<span>14:00-18:00</span>
                                    </h6>
                                    <h6>
                                        <i class="la la-map-marker"></i> &nbsp;&nbsp;<span>` + tutor.location + `</span>
                                    </h6>
                                    <h6>
                                        Subject &nbsp;&nbsp;<span>` + tutor.subject + `</span>
                                    </h6>
                                    <a href="` + base_url + `tutor/detail/` + tutor.id +`">
                                        <button type="button" class="btn btn-outline-primary">More</button>
                                    </a>
                                </div>
                            </div>`;
        });

        return tutor_html;
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