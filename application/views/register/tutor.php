<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/tutor_3.png'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Tutor Register</h3>
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
				<div class="col-lg-9 .offset-lg-3 column">
					<div class="padding-left">
						<div class="profile-form-edit">
							<form class="tutor-form" action="javascript:;">
								<div class="row">
									<div class="col-lg-8">
										<div class="profile-title">
											<h3>Tutor information</h3>
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
										<span class="pf-title">Phone Number</span>
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

										<span class="pf-title">Service Area</span>
										<div class="pf-field">
											<select class="form-control select2-location width-100" id="tutor-service-area" name="location" title="Select Service Area" multiple>
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
											<div class="error"></div>
										</div>

										<span class="pf-title">Grade that can teach</span>
										<div class="pf-field">
											<select class="form-control select2-grade width-100" id="tutor-grade" name="grade" title="Select Grade" multiple>
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
										<div class="profile-title">
											<h3>Subjects Tutor can teach</h3>
										</div>
										<span class="pf-title">School Subject</span>
										<div class="pf-field">
											<select class="form-control select2-subject width-100" id="tutor-subject" name="subject" title="Select School Subject" multiple>
											</select>
											<div class="error"></div>
										</div>

										<span class="pf-title">Extra Activity</span>
										<div class="pf-field">
											<select class="form-control select2-activity" id="tutor-activity" name="activity" title="Select Extra Activity" multiple>
											</select>
											<div class="error"></div>
										</div>

										<span class="pf-title">Personal highest qualification</span>
										<div class="pf-field">
											<select class="qualification" name="qualification" title="Please enter personal highest qualification" required>
												<option value="">-Select Qualification-</option>
												<?php
												foreach ($qualifications as $qualification) {
												?>
													<option value="<?= $qualification['id']; ?>"><?= $qualification['name']; ?></option>
												<?php
												}
												?>
											</select>
											<div class="error"></div>
										</div>

										<span class="pf-title">Personal Certification</span>
										<div class="pf-field">
											<select class="certification" name="certification" title="Please enter personal certification" required>
												<option value="">-Select Certification-</option>
												<?php
												foreach ($certifications as $certification) {
												?>
													<option value="<?= $certification['id']; ?>"><?= $certification['name']; ?></option>
												<?php
												}
												?>
											</select>
											<div class="error"></div>
										</div>

										<span class="pf-title">Year of the experience</span>
										<div class="pf-field">
											<select name="experience">
												<option value="">-Select year of the experience-</option>
												<option value="1">0~1</option>
												<option value="2">2~4</option>
												<option value="3">5~10</option>
												<option value="4">10+</option>
											</select>
											<div class="error"></div>
										</div>

										<span class="pf-title">Expect hourly rate</span>
										<div class="pf-field">
											<input type="text" name="hourly_rate" placeholder="" />
										</div>

										<span class="pf-title">Available Time</span>
										<div class="pf-field opening-time editable">
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
												for ($i = 1; $i < 8; $i++) {
												?>
													<div class="calendar-week-day">
														<?php
														for ($j = 8; $j < 23; $j++) {
														?>
															<div class="caption calendar-cell-container">
																<div class="calendar-cell" a-time="<?= 'cell-' . $i . '-' . $j; ?>"></div>
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
</script>
<script src="<?= base_url('assets/build/js/image-crop.js') ?>" type="text/javascript"></script>
<script>
	toDataURL("<?= base_url('assets/build/images/resource/user-avatar.png'); ?>", function(dataUrl) {
		canvas_pic = dataUrl;
		document.getElementById('avatar-img').src = canvas_pic;
	})
</script>