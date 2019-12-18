
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Find Student</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
            <div class="row no-gape">
                <aside class="col-lg-3 column">
                    <div class="widget">
                        <div class="cst">
                            <img src="<?= $information['avatar'] ?>" alt="" />
                        </div>
                        <div class="can-detail-s" style="text-align: left;">
                            <h7 id="student-name" style="font-color:red;"><?= $information['name'] ?></h7>
                            <span>Age: <i><?= $information['age'] ?></i></span>
                            <span>Gender: <i><?= $information['gender'] == 1? "Male": "Female"; ?></i></span>
                            <span>Grade: <i><?= $information['grade'] ?></i></span>
                            <span>Tel: <i><?= $information['phone'] ?></i></span>
                            <span>Subject: <i><?= $information['subject'] ?></i></span>
                            <span>Location: <i><?= $information['location'] ?></i></span>
                        </div>
                    </div>
                </aside>

                <div class="col-lg-1"></div>

                <div class="col-lg-8 column">
                    <input type="hidden" id="student-id" value="<?= $id; ?>">
                    <div class="padding-left">
                        <div class="padding-left">
                            <div class="profile-title">
                                <h3>Student Center</h3>
                            </div>
                            <div class="job-location">
                                <h3>Location</h3>
                                <div class="job-lctn-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d926917.0482572999!2d-104.57738594649922!3d40.26036964524562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2s!4v1513784737244"></iframe>
                                </div>
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
                                <h6 style="margin: 0;">Lessons/week &nbsp;&nbsp; <span><?= $information['lesson_week']; ?></span> lessons per week</h6>
                                <h6>Priavte/Group &nbsp;&nbsp; <span><?= $information['private_group']; ?></span></h6>
                                <?php
                                if ($curUserType != 'student' && $hasPermission) {
                                    ?>
                                    <h6>Message</h6>
                                    <div class="commentform-sec">
                                        <form class="form-review" action="javascript:;">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pf-field">
                                                        <textarea id="txt-review"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 content-center">
                                                    <button type="submit">Post Comment</button>
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
</section>
