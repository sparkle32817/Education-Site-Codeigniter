<section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
    <div class="container fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header">
            <h3>Parent Register</h3>
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
        <aside class="col-lg-3 column border-right">
        </aside>
        <div class="col-lg-9 column">
          <div class="padding-left">
            <div class="profile-form-edit">
              <form class="student-form" action="javascript:;">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="profile-title">
                      <h3>Register Account</h3>
                    </div>
                    <div class="upload-img-bar content-center">
                      <span class="round">
                        <img id="avatar-img" src="" alt="avatar">
                      </span>
                      <div class="upload-button-div">
                        <label class="browse-button" data-toggle="tooltip">Browse...
                          <input type="file" class="sr-only" id="input-avatar-change" name="image" accept="image/*" style="width: 220px">
                        </label>
                      </div>
                    </div>
                    <span class="pf-title">Username</span>
                    <div class="pf-field">
                      <input type="text" name="name" placeholder="username..." />
                    </div>
                    <span class="pf-title">Tel</span>
                    <div class="pf-field">
                      <input type="text" name="phone" placeholder="Tel..." />
                    </div>
                    <span class="pf-title">Email</span>
                    <div class="pf-field">
                      <input type="text" name="email" placeholder="email..." />
                    </div>
                    <span class="pf-title">Password</span>
                    <div class="pf-field">
                      <input type="Password" class="password" name="password" placeholder="*******" />
                    </div>
                    <span class="pf-title">Confirmed Password</span>
                    <div class="pf-field">
                      <input type="Password" name="r_password" placeholder="*******" />
                    </div>
                    <div class="social-edit">
                      <h3>Student information</h3>
                    </div>
                    <span class="pf-title">Age</span>
                    <div class="pf-field">
                      <input type="text" name="age" placeholder="age..." />
                    </div>

                    <span class="pf-title">Gender</span>
                    <div class="pf-field">
                      <select name="gender">
                        <option value="">-Select Gender-</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                    </div>

                    <span class="pf-title">Location</span>
                    <div class="pf-field">
                      <select id="location1" title="Please select location" required>
                        <option value="">-Select Location-</option>
                        <option value="0">Home</option>
                        <option value="1">Not home / Online</option>
                      </select>

                      <select id="location2" class="mt-4" title="Please select correct location" style="display: none;">
                        <option value="">-Select Location-</option>
                        <?php
                        foreach ($locations as $location) {
                          if ($location['name'] != 'Home') {
                        ?>
                            <option value="<?= $location['id']; ?>"><?= $location['name']; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <span class="pf-title">Grade</span>
                    <div class="pf-field">
                      <select id="student-grade">
                        <option value="">-Select Grade-</option>
                        <?php
                        foreach ($grades as $grade) {
                        ?>
                          <option value="<?= $grade['id']; ?>"><?= $grade['name']; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                      <div class="error"></div>
                    </div>
                    <div class="social-edit">
                      <h3>Subjects required Tutoring</h3>
                    </div>
                    <span class="pf-title">School Subject</span>
                    <div class="pf-field">
                      <select class="form-control select2-subject width-100" id="student-subject" title="Select School Subject" multiple>
                        <?php
                        //   foreach ($subjects as $subject) {
                        ?>
                        <!-- <option value="<?= $subject['id']; ?>"><?= $subject['name']; ?></option> -->
                        <?php
                        //   }
                        ?>
                      </select>
                      <div class="error"></div>
                    </div>

                    <span class="pf-title">Extra Curricular Activities</span>
                    <div class="pf-field">
                      <select class="form-control select2-activity width-100" id="student-activity" title="Select Extra Curricular Activities" multiple>
                      </select>
                      <div class="error"></div>
                    </div>

                    <span class="pf-title">Lessons per week</span>
                    <div class="pf-field">
                      <input type="text" name="lesson_week" placeholder="" />
                    </div>

                    <span class="pf-title">Private/Group</span>
                    <div class="pf-field">
                      <select name="private_group" title="Please select Private/Group" required>
                        <option value="">-Select Grade-</option>
                        <option value="1">Private</option>
                        <option value="2">Group</option>
                        <option value="3">Both</option>
                      </select>
                      <div class="error"></div>
                    </div>

                    <div class="pf-field mt-3">
                      <div class="simple-checkbox">
                        <div class="custom-control custom-checkbox mr-sm-2 pl-0">
                          <input type="checkbox" class="custom-control-input checkbox" id="checkbox_condition">
                          <label class="custom-control-label" for="checkbox_condition">I agree to above <a href="<?= base_url('terms'); ?>" target="_blank"><b>terms</b></a> and register accordingly</label>
                          <div class="error"></div>
                        </div>
                      </div>
                    </div>
                    <button type="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
  let canvas_pic;
</script>
<script src="<?= base_url('assets/build/js/image-crop.js') ?>" type="text/javascript"></script>
<script>
  toDataURL("<?= base_url('assets/build/images/resource/user-avatar.png'); ?>", function(dataUrl) {
    canvas_pic = dataUrl;
    document.getElementById('avatar-img').src = canvas_pic;
  })
</script>