<section class="overlape">
  <div class="block no-padding">
    <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
    <div class="row">
      <div class="col-lg-6 column" style="margin-top: 50px;">
        <h3>Top Tutors</h3>
        <div class="row">
          <div class="col-sm-4">
            <h>Gender</h>
            <select id="student-tutor-gender">
              <option value="">-Select Gender-</option>
              <option value="1">Male</option>
              <option value="2">Female</option>
            </select>
          </div>
          <div class="col-sm-4">
            <h>Hourly Rate</h>
            <select id="student-tutor-hourly">
              <option value="">-Select Hourly Rate-</option>
              <option value="1$ to 100$">1$ to 100$</option>
              <option value="100$ to 200$">100$ to 200$</option>
              <option value="200$ to 300$">200$ to 300$</option>
              <option value="300$ to 400$">300$ to 400$</option>
            </select>
          </div>
          <div class="col-sm-4">
            <h>Qualification</h>
            <select id="student-tutor-qualification">
              <option value="">-Select Qualification-</option>
              <?php
              foreach ($qualifications as $qualification) {
              ?>
                <option value="<?= $qualification['id']; ?>"><?= $qualification['name']; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="mt-4">
          <button type="button" class="btn btn-outline-danger" id="tutor-search-button">Search</button>
          <button type="button" class="btn btn-outline-primary btn-search-clear" id="tutor-clear-button">Clear Filter</button>
        </div>
        <div class="emply-list-sec list-wrapper list-tutor" style="margin-top: 50px;">
        </div>
      </div>
      <div class="col-lg-6 column" style="margin-top: 50px;">
        <h3>Education</h3>
        <div class="row">
          <div class="col-sm-6">
            <h>Location</h>
            <select id="student-education-location">
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
            <select id="student-education-rating">
              <option value="">-Select Ratings-</option>
              <option value="1">Meezan Job</option>
              <option value="2">Speicalize Jobs</option>
              <option value="3">Business Jobs</option>
            </select>
          </div>
        </div>
        <div class="mt-4">
          <button type="button" class="btn btn-outline-danger" id="education-search-button">Search</button>
          <button type="button" class="btn btn-outline-primary btn-search-clear" id="education-clear-button">Clear Filter</button>
        </div>
        <div class="emply-list-sec list-wrapper list-education" style="margin-top: 50px;">
          <div class="emply-list list-item">
            <div class="emply-list-thumb">
              <a href="find_education.html" title=""><img src="<?= base_url('assets/build/images/resource/l6.png'); ?>" alt=""></a>
            </div>
            <div class="emply-list-info">
              <div class="container">
                <span class="badge badge-secondary" style="background-color: orange;">4.9</span>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>(50 jobs)
              </div>
              <h6 style="font-size:14px;">Name &nbsp;&nbsp;<span style="color: red">Bubbly Blog</span></h6>
              <h6 style="font-size:14px;">Address &nbsp;&nbsp;<span>United States, San Diego</span></h6>
              <h6 style="font-size:14px;">Self description</h6>
              <h6>I am full times freelancers with 8+years of experience in Web/Software Development and Designing.<br />I have my team too who assist me on my large projects.</h6>
              <a href="find_education.html"><button type="button" class="btn btn-outline-primary">More</button></a>
            </div>
          </div>
          <div class="emply-list list-item">
            <div class="emply-list-thumb">
              <a href="find_education,html" title=""><img src="<?= base_url('assets/build/images/resource/l6.png'); ?>" alt=""></a>
            </div>
            <div class="emply-list-info">
              <div class="container">
                <span class="badge badge-secondary" style="background-color: orange;">4.9</span>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>
                <i class="fa fa-star checked"></i>(50 jobs)
              </div>
              <h6 style="font-size:14px;">Name &nbsp;&nbsp;<span style="color: red">Bubbly Blog</span></h6>
              <h6 style="font-size:14px;">Address &nbsp;&nbsp;<span>United States, San Diego</span></h6>
              <h6 style="font-size:14px;">Self description</h6>
              <h6>I am full times freelancers with 8+years of experience in Web/Software Development and Designing.<br />I have my team too who assist me on my large projects.</h6>
              <a href="find_education.html"><button type="button" class="btn btn-outline-primary">More</button></a>
            </div>
          </div>
        </div>
        <div id="pagination-container-on"></div>
        <script src="<?= base_url('assets/build/js/system/pagenation.js') ?>" type="text/javascript"></script>
      </div>
    </div>
  </div>
</section>