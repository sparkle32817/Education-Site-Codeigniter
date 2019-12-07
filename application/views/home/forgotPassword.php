
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
                <span>Select User Type</span>
                <div class="select-user">
                    <span type="education">Education</span>
                    <span type="tutor">Tutor</span>
                    <span type="student">Student</span>
                </div>
                <form class="recovery-form" action="javascript:;" style="margin-bottom: 20px;">
                    <div class="cfield" style="margin-top: 10px;">
                        <input type="email" placeholder="Email" class="email" name="email" />
                        <i class="la la-mail-reply-all"></i>
                    </div>
                    <button type="submit">Recovery</button>
                </form>
                <a href="<?= base_url('login')?>" class="btn-recovery-login" title="">Login</a>
            </div>
        </div>
    </div>
</section>
