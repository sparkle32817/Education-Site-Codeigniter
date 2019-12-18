
<section>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4 text-center">
                <h3> Newest Jobs</h3>
                <h5> Today's Jobs:&nbsp;&nbsp;<span><?= $todayStudentNum; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Total Jobs:&nbsp;&nbsp;<span><?= $totalStudentNum; ?></span> </h5>
            </div>
            <div class="col-lg-4">
            </div>
        </div>
    </div>
    <div class="block">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/parallax5.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="text-center">Education Center</h3>
                    <div class="col-lg-12" style="margin-left:0px;">
                        <div class="emply-list-sec">
                            <?php
                            if (sizeof($educations)>0){
                                foreach ($educations as $education) {
                            ?>
                                <a href="<?= base_url('education/detail/'.$education['id']); ?>" title="">
                                    <div class="emply-list">
                                        <div class="emply-list-thumb">
                                            <img src="<?= $education['avatar'];?>" alt=""/>
                                        </div>
                                        <div class="emply-list-info">
                                            <div>
                                                <p>Name:&nbsp;&nbsp;
                                                    <span><?= $education['name'];?></span>
                                                </p>
                                            </div>
                                            <div class="div-location-address">
                                                <p class="text-ellipsis">Location:&nbsp;&nbsp;
                                                    <span><?= $education['address'];?></span>
                                                </p>
                                            </div>
                                            <div class="div-star">
                                                <?= $education['ratingHtml']; ?>
                                            </div>
                                            <p class="job-num"><?= $education['jobs']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            }
                            else
                            {
                            ?>
                                <div class="mt-3">
                                    <h6 class="text-center">There is no data to display</h6>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h3 class="text-center">Tutor</h3>

                    <div class="col-lg-12" style="margin-left:0px;">
                        <div class="emply-list-sec">
                            <?php
                            if (sizeof($tutors)>0) {
                                foreach ($tutors as $tutor) {
                            ?>
                                <a href="<?= base_url('tutor/detail/'.$tutor['id']); ?>" title="">
                                    <div class="emply-list">
                                        <div class="emply-list-thumb">
                                            <img src="<?= $tutor['avatar']; ?>" alt=""/>
                                        </div>
                                        <div class="emply-list-info">
                                            <div>
                                                <p>Name:&nbsp;&nbsp;
                                                    <span><?= $tutor['name']; ?></span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-ellipsis">Location:&nbsp;&nbsp;
                                                    <span><?= $tutor['location']; ?></span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-ellipsis">Subject:&nbsp;&nbsp;
                                                    <span><?= $tutor['subject']; ?></span>
                                                </p>
                                            </div>
                                            <div class="div-star">
                                                <?= $tutor['ratingHtml']; ?>
                                            </div>
                                            <p class="job-num"><?= $tutor['jobs']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            }
                            else
                            {
                            ?>
                                <div class="mt-3">
                                    <h6 class="text-center">There is no data to display</h6>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h3 class="text-center">Student</h3>

                    <div class="col-lg-12" style="margin-left:0px;">
                        <div class="emply-list-sec">
                            <?php
                            if (sizeof($students)>0){
                                foreach ($students as $student) {
                            ?>
                                <a href="<?= base_url('student/detail/'.$student['id']); ?>" title="">
                                    <div class="emply-list">
                                        <div class="emply-list-thumb">
                                            <img src="<?= $student['avatar'];?>" alt=""/>
                                        </div>
                                        <div class="emply-list-info">
                                            <div>
                                                <p>Name:&nbsp;&nbsp;
                                                    <span><?= $student['name'];?></span>
                                                </p>
                                            </div>
                                            <div class="div-location-address">
                                                <p class="text-ellipsis">Subject:&nbsp;&nbsp;
                                                    <span><?= $student['subject'];?></span>
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-ellipsis"> Location:&nbsp;&nbsp;
                                                    <span><?= $student['location']; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            }
                            else
                            {
                                ?>
                                <div class="mt-3">
                                    <h6 class="text-center">There is no data to display</h6>
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
    <div id="scroll-here"></div>
</section>

<section>
    <div class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>How It Works</h2>
                        <span>Each month, more than 7 million Jobhunt turn to website in their search for work, making over <br />160,000 applications every day.
							</span>
                    </div><!-- Heading -->
                    <div class="how-to-sec style2">
                        <div class="how-to">
                            <span class="how-icon"><i class="la la-user"></i></span>
                            <h3>Register an account</h3>
                            <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
                        </div>
                        <div class="how-to">
                            <span class="how-icon"><i class="la la-file-archive-o"></i></span>
                            <h3>Specify & search your job</h3>
                            <p>Browse profiles, reviews, and proposals then interview top candidates. </p>
                        </div>
                        <div class="how-to">
                            <span class="how-icon"><i class="la la-list"></i></span>
                            <h3>Apply for job</h3>
                            <p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div data-velocity="-.2" style="background: url(<?= base_url('assets/build/images/resource/parallax7.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="download-sec">
                        <div class="download-text">
                            <h3>Download & Enjoy</h3>
                            <p>Search, find and apply for jobs directly on your mobile device or desktop Manage all of the jobs you have applied to from a convenience secure dashboard.</p>
                            <ul>
                                <li>
                                    <a href="javascript:;" title="">
                                        <i class="la la-apple"></i>
                                        <span>App Store</span>
                                        <p>Available now on the</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" title="">
                                        <i class="la la-android"></i>
                                        <span>Google Play</span>
                                        <p>Get in on</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="download-img">
                            <img src="<?= base_url('assets/build/images/resource/mockup3.png'); ?>" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
