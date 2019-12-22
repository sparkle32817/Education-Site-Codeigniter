
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Education Center Register</h3>
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
                    <div class="widget">
                    </div>
                    <div class="widget">

                    </div>
                </aside>
                <div class="col-lg-9 column">
                    <div class="padding-left">
                        <div class="profile-title">
                            <h3>Information</h3>
                        </div>
                        <div class="profile-form-edit">
                            <form class="education-form" action="javascript:;">
                                <div class="row">
                                    <div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="upload-img-bar content-center">
                                            <span class="round">
                                                <img id="avatar-img" src="" alt="avatar">
                                            </span>
                                            <div class="upload-button-div">
                                                <label class="browse-button" data-toggle="tooltip">Browse...
                                                    <input type="file" class="sr-only" id="input-avatar-change" name="image"
                                                           accept="image/*" style="width: 220px">
                                                </label>
                                            </div>
                                        </div>
                                        <span class="pf-title">Username</span>
                                        <div class="pf-field">
                                            <input type="text" class="name" name="name" placeholder="Education Name..." />
                                        </div>
                                        <span class="pf-title">Tel</span>
                                        <div class="pf-field">
                                            <input type="text" class="telephone" name="phone" placeholder="Telephone Number..." />
                                        </div>
                                        <span class="pf-title">Email</span>
                                        <div class="pf-field">
                                            <input type="text" class="email" name="email" placeholder="Email..." />
                                        </div>
                                        <span class="pf-title">Password</span>
                                        <div class="pf-field">
                                            <input type="Password" class="password" name="password" placeholder="*******" />
                                        </div>
                                        <span class="pf-title">Confirmed Password</span>
                                        <div class="pf-field">
                                            <input type="Password" class="r-password" name="r_password" placeholder="*******" />
                                        </div>
                                        <span class="pf-title">Address</span>
                                        <div class="pf-field">
                                            <input type="text" class="address" name="address" placeholder="Address..." />
                                        </div>
                                        <span class="pf-title">Grade that can teach</span>
                                        <div class="pf-field">
                                            <select class="form-control select2-grade width-100" id="education-grade" title="Select Grade" name="grade" multiple>
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
                                        <span class="pf-title">School Subject</span>
                                        <div class="pf-field">
                                            <select class="form-control select2-subject width-100" id="education-subject" title="Select School Subject" name="subject" multiple>
                                            </select>
                                            <div class="error"></div>
                                        </div>

                                        <span class="pf-title">Extra Activity</span>
                                        <div class="pf-field">
                                            <select class="form-control select2-activity width-100" id="education-activity" title="Select Extra Activity" name="activity" multiple>
                                            </select>
                                            <div class="error"></div>
                                        </div>

                                        <span class="pf-title">Opening Time</span>
                                        <div class="pf-field">
                                            <table class="table time-picker-table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">MON</th>
                                                        <th scope="col">TUE</th>
                                                        <th scope="col">WEN</th>
                                                       <th scope="col">THU</th>
                                                        <th scope="col">FRI</th>
                                                        <th scope="col">SAT</th>
                                                        <th scope="col">SUN</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" value="From" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" value="To" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="mon">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="tue">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="wen">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="thu">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="fri">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="sat">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 m-0 p-0 row schedule" day="sun">
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="start" value="09:00" readonly/>
                                                                </div>
                                                                <div class="col-md-12 px-0 my-1">
                                                                    <input type="text" class="timepicker" status="end" value="10:00" readonly/>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea class="mb-0" name="description" placeholder="(eg. Special for which school etc)"></textarea>
                                        </div>

                                        <div class="pf-field mt-3">
                                            <div class="simple-checkbox">
                                                <div class="custom-control custom-checkbox mr-sm-2 pl-0">
                                                    <input type="checkbox" class="custom-control-input checkbox" id="checkbox_condition">
                                                    <label class="custom-control-label" for="checkbox_condition">I agree to above <a href="<?= base_url('terms'); ?>"><b>terms</b></a> and register accordingly</label>
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

    toDataURL("<?= base_url('assets/build/images/resource/user-avatar.png'); ?>", function(dataUrl) {
        canvas_pic = dataUrl;
        document.getElementById('avatar-img').src = canvas_pic;
    })
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

