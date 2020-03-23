
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
                                    <h7 class="text-danger">Name: <?= $information['name'] ?></h7>
                                    <span>Tel: <i><?= $information['phone'] ?></i></span>
                                    <span>Address: <i><?= $information['address'] ?></i></span>
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
                                    <div class="pf-field opening-time">
                                        <div class="calendar-head">
                                            <div class="calendar-head-cell-blank"></div>
                                            <div class="calendar-head-cell">Mon</div>
                                            <div class="calendar-head-cell">Tue</div>
                                            <div class="calendar-head-cell">Wed</div>
                                            <div class="calendar-head-cell">Thu</div>
                                            <div class="calendar-head-cell">Fri</div>
                                            <div class="calendar-head-cell">Sat</div>
                                            <div class="calendar-head-cell">Sun</div>
                                        </div>
                                        <div class="calendar-body">
                                            <div class="calendar-time">
                                                <?php
                                                    for($i=8; $i<23; $i++){
                                                    ?>
                                                        <div class="caldendar-time-cell subhead"><?= $i<10? '0'.$i.':00' : $i.':00'; ?></div>
                                                    <?php
                                                    }
                                                ?>
                                            </div>
                                            <?php
                                                $timeline = explode(',', $information['timeline']);
                                                for($i=1; $i<8; $i++){
                                                ?>
                                                    <div class="calendar-week-day">
                                                    <?php
                                                        for($j=8; $j<23; $j++){
                                                            $time = 'cell-'.$i.'-'.$j;
                                                        ?>
                                                            <div class="caption calendar-cell-container">
                                                                <div class="calendar-cell <?= in_array($time, $timeline)? 'calendar-cell-actived': ''; ?>"></div>
                                                            </div>
                                                        <?php
                                                        }
                                                    ?>
                                                    </div>
                                                <?php                                                        
                                                }
                                            ?>
                                        </div>
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
                                <div class="commentform-sec mt-0" id="div-review" style="margin-top: 30px;">
                                    <h3>Review Content</h3>&nbsp;&nbsp;<span class="recommend-rating"></span>&nbsp;&nbsp;<span class="recommend-rating-text">1</span>
                                    <form class="form-review p-0" action="javascript:;">
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
