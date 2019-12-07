<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/tutor_3.png'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h4>Welcome Tutors</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block remove-top">
        <div class="container">
            <div class="row no-gape">
                <aside class="col-lg-5 column min-height-500">
                    <div class="col-lg-8" style="margin-top: 50px;">
                        <h2>Tutors</h2>
                        <div class="pf-field">
                            <h>Location</h>
                            <select class="chosen tutor-location" name="location" required>
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
                    </div>
                    <div class="col-lg-8">
                        <div class="pf-field">
                            <h>Fee</h>
                            <input type="text" class="name" name="name" value="" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="pf-field">
                            <h>Grade</h>
                            <select class="chosen tutor-grade" name="grade" required>
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
                    </div>
                    <div class="col-lg-8">
                        <div class="pf-field">
                            <h>&nbsp;</h>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <button type="button" class="btn btn-outline-danger" id="tutor-search-button">Search</button>
                        <button type="button" class="btn btn-outline-primary btn-search-clear" id="tutor-clear-button">Clear Filter</button>
                    </div>
                </aside>

                <div class="col-lg-7 column">
                    <div class="emply-list-sec list-wrapper list-tutor" style="margin-top: 80px;">
                    </div>
                    <div id="pagination-container"></div>
                    <script src="<?= base_url('assets/build/js/system/pagenation.js') ?>" type="text/javascript"></script>
                </div>
            </div>
        </div>
    </div>
</section>