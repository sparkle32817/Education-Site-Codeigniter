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
                    <span class="pf-title mt-0">Address</span>
                    <div class="pf-field">
                      <select name="address" disabled>
                        <option value="">-Select Location-</option>
                        <?php
                        foreach ($locations as $location) {
                          if ($location['name'] != 'Home') {
                        ?>
                            <option value="<?= $location['id']; ?>" <?= $location['id'] == $information['address'] ? "selected" : ""; ?>><?= $location['name']; ?>
                            </option>
                        <?php
                          }
                        }
                        ?>
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
                        <div class="error"></div>
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