$(document).ready(function () {

    let curRating = 1;
    let reviews = getReviews();

    let str_reviews = "";
    $.each(reviews.reviews, function (index, review) {
        str_reviews += `<div class="emply-list">
                            <div class="emply-list-thumb">
                                <a href="#" title=""><img src="` + review.avatar + `" alt="" /></a>
                            </div>
                            <div class="emply-list-info">
                                <div class="emply-pstn">
                                    ` + getRatingHtml(review.rating) +`
                                </div>
                                <h3><a href="#" title="">Name</a></h3>
                                <p style="font-size:14px;">Time: &nbsp&nbsp<span>` + review.time + `</span></p>
                                <p style="font-size:14px;">Description: &nbsp&nbsp<span>` + review.description + `</span></p>
                            </div>
                        </div>`;
    });
    
    $(".average-rating").html(getRatingHtml(reviews.avg_rating));
    $(".div-reviews").html(str_reviews);

    //Events
    $(".form-review").on("submit", function (e) {
        e.preventDefault();

        let tutorID = $("#tutorID").val();
        let description = $("#txt-review").val();
        if (description == "")
        {
            return false;
        }

        $.ajax({
            url: base_url + "tutor/postReview",
            method: "post",
            data: {tutor_id: tutorID, rating: curRating, description: description},
            dataType: "text",
            async: false,
            success: function (data) {
                if (data == "success")
                {
                    $("#div-review").css("display", "none");
                }
            }
        });
    });

    $(".recommend-rating").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 30,
        // emptyColor: 'lightgray',
        hoverColor: 'orange',
        activeColor: 'orange',
        useGradient: false,
        initialRating: 1,
        disableAfterRate: false,
        minRating: 1,
        onHover: function(currentIndex, currentRating, $el){
            $('.recommend-rating-text').text(currentIndex);
        },
        onLeave: function(currentIndex, currentRating, $el){
            curRating = currentRating;
            $('.recommend-rating-text').text(curRating);
        }
    });


    //Functions
    function getReviews() {
        let response = '';
        let tutorID = $("#tutorID").val();
        //AJAX with server

        $.ajax({
            url: base_url + "tutor/getReview",
            method: "post",
            data: {tutor_id: tutorID},
            dataType: "json",
            async: false,
            success: function (data) {
                response = data;
            }
        });

        return response;
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