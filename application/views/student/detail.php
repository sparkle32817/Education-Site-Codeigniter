<section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1"
      style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;"
      class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
              <h7 id="student-name" class="text-danger"><?= $information['name'] ?></h7>
              <span>Age: <i><?= $information['age'] ?></i></span>
              <span>Gender: <i><?= $information['gender'] == 1 ? "Male" : "Female"; ?></i></span>
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
              <div class="profile-form-edit">
                <h6 style="margin: 0;">Lessons/week &nbsp;&nbsp; <span><?= $information['lesson_week']; ?></span>
                  lessons per week</h6>
                <h6>Priavte/Group &nbsp;&nbsp; <span><?= $information['private_group']; ?></span></h6>
                <?php
								if ($curUserType != 'student' && $hasPermission) {
								?>
                <h6>Message</h6>
                <div class="commentform-sec mt-0">
                  <form class="form-review p-0" action="javascript:;">
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
</section>