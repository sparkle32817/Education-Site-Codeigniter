
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Find Top Education </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4" >
                            <div style="margin-top: 132px">

                                <div class="cst"><img src="<?= $information['avatar'] ?>" alt="" /></div>

                                <div class="can-detail-s" style="text-align: left;">
                                    <h7 style="font-color:red;">Name: <?= $information['name'] ?></h7>
                                    <span>Tel: <i><?= $information['phone'] ?></i></span>
                                    <span>Location: <i><?= $information['address'] ?></i></span>
                                </div>
                                <div class="job-location">
                                    <h3>Location</h3>
                                    <div class="job-lctn-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-7">
                            <input type="hidden" id="tutorID" value="<?= $id; ?>">
                            <div class="padding-left">
                                <div class="profile-title">
                                    <h3>Education Center</h3>
                                </div>
                                <div class="profile-form-edit">
                                    <h6>Avialable time</h6>
                                    <div class="pf-field">
                                        <?php $timeline = json_decode($information['timeline'], true); ?>
                                        <table class="table time-picker-table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">MON</th>
                                                <th scope="col">THU</th>
                                                <th scope="col">WEN</th>
                                                <th scope="col">THI</th>
                                                <th scope="col">FRI</th>
                                                <th scope="col">SAT</th>
                                                <th scope="col">SUN</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="text" class="timepicker" value="From" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['mon_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['tue_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['wen_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['thi_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['fri_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['sat_start'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['sun_start'] ?>" readonly/></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="timepicker" value="To" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['mon_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['tue_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['wen_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['thi_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['fri_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['sat_end'] ?>" readonly/></td>
                                                <td><input type="text" class="timepicker" value="<?= $timeline['sun_end'] ?>" readonly/></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6>&nbsp;</h6>
                                    <h6>Self description</h6>
                                    <div >
                                        <p><?= $information['description']; ?></p>
                                    </div>
                                    <div class="pf-field">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p style="font-size:20px;">Average rating</p>
                                            </div>

                                            <div class="col-md-6"></div>

                                            <div class="col-md-3 average-rating"></div>
                                        </div>
                                        <div class="div-reviews">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if ($curUserType == 'student' && $offer_able) {
                                ?>
                                <div class="commentform-sec" id="div-review" style="margin-top: 30px;">
                                    <h3>Review Content</h3>&nbsp;&nbsp;<span class="recommend-rating"></span>&nbsp;&nbsp;<span class="recommend-rating-text">1</span>
                                    <form class="form-review" action="javascript:;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span class="pf-title">Description</span>
                                                <div class="pf-field">
                                                    <textarea id="txt-review"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 content-center">
                                                <button type="submit" id="button-post-review">Post Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    </div>
</section>
