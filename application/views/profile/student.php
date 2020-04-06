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
                      <span class="pf-title mt-0">Location</span>
                      <div class="row no-gutters pf-field">
                        <div class="col-md-6 pr-2">
                          <select id="location1" title="Please select location" required disabled>
                            <option value="">-Select Location-</option>
                            <option value="1" <?= $information['location'] == 1 ? 'selected' : '' ?>>Home</option>
                            <option value="0" <?= $information['location'] != 1 ? 'selected' : '' ?>>Not home / Online</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <select id="location2" style="display: <?= $information['location'] == 1 ? 'none' : 'block' ?>;" title="Please select correct location" disabled>
                            <option value="">-Select Location-</option>
                            <?php
                            foreach ($locations as $location) {
                              if ($location['name'] != 'Home') {
                            ?>
                                <option value="<?= $location['id']; ?>" <?= $information['location'] == $location['id'] ? 'selected' : '' ?>><?= $location['name']; ?>
                                </option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-2">Grade</span>
                      <div class="pf-field">
                        <select class="select2-grade" disabled>
                          <option value="">-Select Grade-</option>
                          <?php
                          foreach ($grades as $grade) {
                          ?>
                            <option value="<?= $grade['id']; ?>" <?= $information['grade'] == $grade['id'] ? 'selected' : '' ?>><?= $grade['name']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <div class="error"></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-2">School subject</span>
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
                      <span class="pf-title mt-0">Lessons per week</span>
                      <div class="pf-field">
                        <input type="text" name="lesson_week" value="<?= $information['lesson_week']; ?>" readonly />
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <span class="pf-title mt-2">Private/Group</span>
                      <div class="pf-field">
                        <select name="private_group" title="Please select Private/Group" required disabled>
                          <option value="">-Select Grade-</option>
                          <option value="1" <?= $information['private_group'] == 1 ? 'selected' : '' ?>>Private</option>
                          <option value="2" <?= $information['private_group'] == 2 ? 'selected' : '' ?>>Group</option>
                          <option value="3" <?= $information['private_group'] == 3 ? 'selected' : '' ?>>Both</option>
                        </select>
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