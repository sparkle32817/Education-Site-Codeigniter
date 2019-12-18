
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h4>Welcome to Education Center</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row p-top-50">
        <div class="col-lg-5 column">
            <h3>Students</h3>
            <div class="row">
                <div class="col-sm-4">
                    <h>Location</h>
                    <select id="education-student-location" name="location" required>
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
                    <select id="education-student-grade" name="grade" required>
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
                    <select id="education-student-subject" name="subject" required>
                        <option value="">-Select School Subject-</option>
                    </select>
                </div>
            </div>
            <div class="t-top-30">
                <button type="button" class="btn btn-outline-danger" id="student-search-button">Search</button>
                <button type="button" class="btn btn-outline-primary btn-search-clear" id="student-clear-button">Clear Filter</button>
            </div>
            <div class="emply-list-sec list-wrapper list-student">
            </div>
            <div id="pagination-container-on" ></div>
        </div>
        <div class="col-lg-7 column">
            <h3>Tutors</h3>
            <div class="row">
                <div class="col-sm-4">
                    <h>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h>
                    <select id="education-tutor-gender">
                        <option value="">-Select Gender-</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <h>Hourly Rate</h>
                    <select id="education-tutor-hourly">
                        <option value="">-Select Hourly Rate-</option>
                        <option value="1$ to 100$">1$ to 100$</option>
                        <option value="100$ to 200$">100$ to 200$</option>
                        <option value="200$ to 300$">200$ to 300$</option>
                        <option value="300$ to 400$">300$ to 400$</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <h>Qualification</h>
                    <select id="education-tutor-qualification">
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
            <div class="t-top-30">
                <button type="button" class="btn btn-outline-danger" id="tutor-search-button">Search</button>
                <button type="button" class="btn btn-outline-primary btn-search-clear" id="tutor-clear-button">Clear Filter</button>
            </div>
            <div class="emply-list-sec list-wrapper list-tutor">
            </div>
            <div id="pagination-container"></div>
        </div>
    </div>
</div>