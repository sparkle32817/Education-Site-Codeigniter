<section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/tutor_3.png'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
    <div class="container fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-header wform">
            <div class="job-search-sec">
              <div class="job-search">
                <h4>Welcome <?= $userName; ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row pb-3">
      <div class="col-lg-6 column mt-5">
        <h3>Education</h3>
        <div class="row">
          <div class="col-sm-6">
            <h>Location</h>
            <select id="tutor-education-location">
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
          <div class="col-sm-6">
            <h>Ratings</h>
            <select id="tutor-education-rating">
              <option value="">-Select Ratings-</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
        <div class="t-top-30">
          <button type="button" class="btn btn-outline-danger" id="education-search-button">Search</button>
          <button type="button" class="btn btn-outline-primary btn-search-clear" id="education-clear-button">Clear Filter</button>
        </div>
        <div class="emply-list-sec list-wrapper mt-3 list-education">
        </div>
        <div id="pagination-container-on"></div>
        <script src="<?= base_url('assets/build/js/system/pagenation.js') ?>" type="text/javascript"></script>
      </div>
      <div class="col-lg-6 column mt-5">
        <h3>Students</h3>
        <div class="row">
          <div class="col-sm-4">
            <h>Location</h>
            <select id="tutor-student-location" name="location" required>
              <option value="">-Select Location-</option>
              <?php
              foreach ($locations as $location) {
              ?>
                <option value="<?= $location['id']; ?>"><?= $location['name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-sm-4">
            <h>Grade</h>
            <select id="tutor-student-grade" name="grade" required>
              <option value="">-Select Grade-</option>
              <?php
              foreach ($grades as $grade) {
              ?>
                <option value="<?= $grade['id']; ?>"><?= $grade['name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-sm-4">
            <h>Subject</h>
            <select id="tutor-student-subject" name="subject" required>
              <option value="">-Select School Subject-</option>
            </select>
          </div>
        </div>
        <div class="t-top-30">
          <button type="button" class="btn btn-outline-danger" id="student-search-button">Search</button>
          <button type="button" class="btn btn-outline-primary btn-search-clear" id="student-clear-button">Clear Filter</button>
        </div>
        <div class="emply-list-sec list-wrapper mt-3 list-student">
        </div>
        <div id="pagination-container-on"></div>
      </div>
    </div>
  </div>
</section>