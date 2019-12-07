
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
                                            <input type="file" class="sr-only" id="input-avatar-change" name="image"
                                                   accept="image/*" style="width: 220px">
                                        </label>
                                    </div>
                                </div>
                                <div class="my-profile-left-side" style="text-align: left;">
                                    <div class="col-lg-12">
                                        <h6>Name</h6>
                                        <div class="pf-field">
                                            <input type="text" class="name" name="name" value="<?= $information['name'] ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Tel</h6>
                                        <div class="pf-field">
                                            <input type="text" class="telephone" name="phone" value="<?= $information['phone'] ?>" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Email</h6>
                                        <div class="pf-field">
                                            <input type="text" class="email" name="email" value="<?= $information['email'] ?>" readonly/>
                                        </div>
                                    </div>
                                    <?php
                                    if ($type == 'education')
                                    {
                                        ?>
                                        <div class="col-lg-12">
                                            <h6>Address</h6>
                                            <div class="pf-field">
                                                <input type="text" class="address" name="address" value="<?= $information['address'] ?>" readonly/>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else if ($type == 'tutor')
                                    {
                                        ?>
                                        <div class="col-lg-12">
                                            <h6>Age</h6>
                                            <div class="pf-field">
                                                <input type="text" name="age" value="<?= $information['age'] ?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h6>Gender</h6>
                                            <div class="pf-field">
                                                <input type="text" name="gender" value="<?= $information['gender'] == 1? "Male": "Female"; ?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h6>Service Area</h6>
                                            <select class="select2-location width-100" name="location" multiple disabled>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="col-lg-12">
                                            <h6>Age</h6>
                                            <div class="pf-field">
                                                <input type="text" name="age" value="<?= $information['age'] ?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h6>Gender</h6>
                                            <div class="pf-field">
                                                <input type="text" name="gender" value="<?= $information['gender'] == 1? "Male": "Female"; ?>" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <h6>Location</h6>
                                            <div class="pf-field">
                                                <select class="chosen" name="location" disabled>
                                                    <option value="home"
                                                        <?= $information['location'] == 'home' ? 'selected' : '' ?>
                                                    >Home</option>
                                                    <option value="not_home"
                                                        <?= $information['location'] != 'home' ? 'selected' : '' ?>
                                                    >Not Home</option>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-lg-12">
                                        <span style="height: 100px;">&nbsp;</span>
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
                                        <?php
                                        if ($type == 'education' || $type == 'tutor')
                                        {
                                            ?>
                                            <h6>Grade that can teach</h6>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <h6>Grade</h6>
                                            <?php
                                        }
                                        ?>
                                        <select class="select2-grade width-100" name="grade" multiple disabled>
                                        </select>
                                        <div class="error profile-select2"></div>
                                        <h6>School subject</h6>
                                        <select class="select2-subject width-100" name="subject" multiple disabled>
                                        </select>
                                        <div class="error profile-select2"></div>
                                        <h6>Extra activity</h6>
                                        <select class="select2-activity width-100" name="activity" multiple disabled>
                                        </select>
                                        <div class="error profile-select2"></div>
                                        <?php
                                        if ($type == 'tutor')
                                        {
                                            ?>
                                            <h6>Personal highest qualification</h6>
                                            <div class="pf-field profile-select2">
                                                <select class="chosen" name="qualification" disabled>
                                                    <option value="">-Select Qualification-</option>
                                                    <?php
                                                    foreach ($qualifications as $qualification) {
                                                        ?>
                                                        <option value="<?= $qualification['id']; ?>"
                                                        <?= $qualification['id']==$information['qualification']? "selected": ""; ?>
                                                        ><?= $qualification['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="error"></div>
                                            </div>

                                            <h6>Personal certification</h6>
                                            <div class="pf-field profile-select2">
                                                <select class="chosen" name="certification" disabled>
                                                    <option value="">-Select Certification-</option>
                                                    <?php
                                                    foreach ($certifications as $certification) {
                                                        ?>
                                                        <option value="<?= $certification['id']; ?>"
                                                            <?= $certification['id']==$information['certification']? "selected": ""; ?>
                                                        ><?= $certification['name']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <div class="error"></div>
                                            </div>

                                            <h6>Expect hourly rate</h6>
                                            <div class="pf-field profile-select2">
                                                <input type="text" name="hourly_rate" value="<?= $information['hourly_rate']; ?>" readonly/>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <h6>Avialable time</h6>
                                        <div class="pf-field profile-select2">
                                            <?php $timeline = json_decode($information['timeline'], true); ?>
                                            <table class="table time-picker-table">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">MON</th>
                                                    <th scope="col">THU</th>
                                                    <th scope="col">WEN</th>
                                                    <th scope="col">THI</th>
                                                    <th scope="col">FRI</th>
                                                    <th scope="col">SAT</th>
                                                    <th scope="col">SUN</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><input type="text" value="From" readonly/>
                                                    </td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['mon_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['tue_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['wen_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['thi_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['fri_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['sat_start'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['sun_start'] ?>" readonly/></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" value="To" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['mon_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['tue_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['wen_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['thi_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['fri_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['sat_end'] ?>" readonly/></td>
                                                    <td><input type="text" class="timepicker"
                                                               value="<?= $timeline['sun_end'] ?>" readonly/></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php
                                        if ($type == 'education' || $type == 'tutor')
                                        {
                                            ?>
                                            <h6>Self description</h6>
                                            <div class="pf-field">
                                                <textarea name="description" placeholder="(eg. Special for which school etc)" readonly><?= $information['description']; ?></textarea>
                                            </div>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <h6>Lessons per week</h6>
                                            <div class="pf-field profile-select2">
                                                <input type="text" name="lesson_week" value="<?= $information['lesson_week']; ?>" readonly/>
                                            </div>

                                            <h6>Private/Group</h6>
                                            <div class="pf-field">
                                                <input type="text" name="private_group" value="<?= $information['private_group']; ?>" readonly/>
                                            </div>
                                            <?php
                                        }
                                        ?>
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
    function toDataURL(url, callback) {
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            var reader = new FileReader();
            reader.onloadend = function() {
                callback(reader.result);
            }
            reader.readAsDataURL(xhr.response);
        };
        xhr.open('GET', url);
        xhr.responseType = 'blob';
        xhr.send();
    }

    //toDataURL("<?//= base_url('assets/build/images/resource/user-avatar.jfif'); ?>//", function(dataUrl) {
    //    canvas_pic = dataUrl;
    //    document.getElementById('avatar-img').src = canvas_pic;
    //})
    window.addEventListener('DOMContentLoaded', function () {

        let avatar = document.getElementById('avatar-img');
        let image = document.getElementById('crop-image');
        let input = document.getElementById('input-avatar-change');
        let $modal = $('#image-crop-modal');
        let cropper;

        input.addEventListener('change', function (e) {

            let files = e.target.files;
            let done = function (url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                let file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        document.getElementById('crop-button').addEventListener('click', function () {

            $modal.modal('hide');

            if (cropper) {
                canvas_pic = cropper.getCroppedCanvas({
                    width: 220,
                    height: 220,
                });
                avatar.src = canvas_pic.toDataURL();
                canvas_pic = avatar.src;
            }
        });
    });
</script>
