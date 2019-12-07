
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>User Login</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
            <div class="account-popup">
                <span>Select User Type To Login</span>
                <div class="select-user">
                    <span type="education">Education</span>
                    <span type="tutor">Tutor</span>
                    <span type="student">Student</span>
                </div>
                <form class="login-form" action="javascript:;">
                    <div class="cfield" style="margin-top: 10px;">
                        <input type="text" placeholder="Username" name="name" />
                        <i class="la la-user"></i>
                    </div>
                    <div class="cfield">
                        <input type="password" placeholder="********" name="password" />
                        <i class="la la-key"></i>
                    </div>
                    <p class="remember-label">
                        <input type="checkbox" name="cb" id="remember"><label for="cb1">Remember me</label>
                    </p>
                    <a href="<?= base_url('recovery')?>" title="">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</section>
