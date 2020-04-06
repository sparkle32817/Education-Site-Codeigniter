<section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
    <div class="container fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
            <h3>My Profile </h3>
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
          <form class="profile-form" action="javascript:;">
            <div class="row">
              <div class="col-lg-4 p-r-20">
                <div class="upload-img-bar content-center">
                  <span class="round">
                    <img id="avatar-img" src="<?= $information['avatar'] ?>" alt="avatar">
                  </span>
                  <div class="upload-button-div" style="display: none;">
                    <label class="browse-button" data-toggle="tooltip">Browse...
                      <input type="file" class="sr-only" id="input-avatar-change" name="image" accept="image/*" style="width: 220px">
                    </label>
                  </div>
                </div>
                <div class="my-profile-left-side" style="text-align: left;">
                  <div class="col-lg-12">
                    <span class="pf-title mt-0">Name</span>
                    <div class="pf-field">
                      <input type="text" class="name" name="name" value="<?= $information['name'] ?>" readonly />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="pf-title mt-0">Tel</span>
                    <div class="pf-field">
                      <input type="text" class="telephone" name="phone" value="<?= $information['phone'] ?>" readonly />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="pf-title mt-0">Email</span>
                    <div class="pf-field">
                      <input type="text" class="email" name="email" value="<?= $information['email'] ?>" readonly />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="pf-title mt-0">Age</span>
                    <div class="pf-field">
                      <input type="text" name="age" value="<?= $information['age'] ?>" readonly />
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="pf-title mt-0">Gender</span>
                    <div class="pf-field">
                      <select class="mb-4" name="gender" disabled>
                        <option value="1" <?= $information['gender'] == 1 ? 'selected' : '' ?>>Male</option>
                        <option value="2" <?= $information['gender'] == 2 ? 'selected' : '' ?>>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <span class="pf-title">Service Area</span>
                    <div class="pf-field">
                      <select class="form-control select2-location width-100" id="tutor-service-area" title="Select Service Area" multiple disabled>
                      </select>
                      <div class="error"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-8 border-left">
                <input type="hidden" id="tutorID" value="<?= $information['id']; ?>">
                <div class="padding-left">
                  <div class="my-profile-title">
                    <div class="row">
                      <div class="col-lg-6">
                        <h3>Information</h3>
                      </div>
                      <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-edit-profile" status="readonly">
                          <i class="la la-pencil"></i>
                          <span>Edit Profile</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="my-profile-form">
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Grade that can teach</span>
                      <div class="pf-field">
                        <select class="form-control select2 select2-grade width-100" multiple disabled>
                        </select>
                        <div class="error profile-select2"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">School subject</span>
                      <div class="pf-field">
                        <select class="form-control select2 select2-subject width-100" multiple disabled>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Extra activity</span>
                      <div class="pf-field">
                        <select class="form-control select2 select2-activity width-100" multiple disabled>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Personal highest qualification</span>
                      <div class="pf-field profile-select2">
                        <select name="qualification" disabled>
                          <option value="">-Select Qualification-</option>
                          <?php
                          foreach ($qualifications as $qualification) {
                          ?>
                            <option value="<?= $qualification['id']; ?>" <?= $qualification['id'] == $information['qualification'] ? "selected" : ""; ?>>
                              <?= $qualification['name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Personal certification</span>
                      <div class="pf-field profile-select2">
                        <select name="certification" disabled>
                          <option value="">-Select Certification-</option>
                          <?php
                          foreach ($certifications as $certification) {
                          ?>
                            <option value="<?= $certification['id']; ?>" <?= $certification['id'] == $information['certification'] ? "selected" : ""; ?>>
                              <?= $certification['name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Year of the experience</span>
                      <div class="pf-field profile-select2">
                        <select name="experience" disabled>
                          <option value="">-Select year of the experience-</option>
                          <option value="1" <?= $information['experience'] == 1 ? "selected" : ""; ?>>0~1</option>
                          <option value="2" <?= $information['experience'] == 2 ? "selected" : ""; ?>>2~4</option>
                          <option value="3" <?= $information['experience'] == 3 ? "selected" : ""; ?>>5~10</option>
                          <option value="4" <?= $information['experience'] == 4 ? "selected" : ""; ?>>10+</option>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Expect hourly rate</span>
                      <div class="pf-field profile-select2">
                        <input type="text" name="hourly_rate" value="<?= $information['hourly_rate']; ?>" readonly />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Avialable time</span>
                      <div class="pf-field opening-time pb-4">
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
                            for ($i = 8; $i < 23; $i++) {
                            ?>
                              <div class="caldendar-time-cell subhead"><?= $i < 10 ? '0' . $i . ':00' : $i . ':00'; ?></div>
                            <?php
                            }
                            ?>
                          </div>
                          <?php
                          $timeline = explode(',', $information['timeline']);
                          for ($i = 1; $i < 8; $i++) {
                          ?>
                            <div class="calendar-week-day">
                              <?php
                              for ($j = 8; $j < 23; $j++) {
                                $time = 'cell-' . $i . '-' . $j;
                              ?>
                                <div class="caption calendar-cell-container">
                                  <div class="
                                    calendar-cell
                                    <?= in_array($time, $timeline) ? 'calendar-cell-actived' : ''; ?>
                                  " a-time="<?= 'cell-' . $i . '-' . $j; ?>">
                                  </div>
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
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-0">Self description</span>
                      <div class="pf-field">
                        <textarea name="description" placeholder="(eg. Special for which school etc)" readonly><?= $information['description']; ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="image-crop-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Select the avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container content-center">
          <img id="crop-image" style="width: 400px; height: 360px" src="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="crop-button">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
  let canvas_pic = "<?= $information['avatar'] ?>";
  let user_type = '<?= $type; ?>';
</script>
<script src="<?= base_url('assets/build/js/image-crop.js') ?>" type="text/javascript"></script>