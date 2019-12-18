
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/mslider1.jpg'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Buy Our Plans And Packages</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <?php
            if (isset($loggedUserType) && $loggedUserType=='education')
            {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading">
                            <h4>One of our jobs has some kind of flexibility option - such as telecommuting,<br/> a part-time schedule or a flexible or flextime schedule.</h4>
                        </div><!-- Heading -->
                        <div class="plans-sec">
                            <div class="row">
                                <div class="col-lg-4 offset-1">
                                    <div class="pricetable <?= $membership_type==0? 'active': ''; ?>">
                                        <div class="pricetable-head">
                                            <h3>Basic Jobs</h3>
                                            <h2>Free Plan</h2>
                                        </div><!-- Price Table -->
                                        <ul>
                                            <li ><span class="mr-2">&#10003;</span>Unlimited access to parents/students info</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited access to education centers info</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited receipt to the messages</li>
                                            <li>Limited to leave message to the candidate cases and recruit tutors</li>
                                            <li>Limited to  reply to the messages from the parents/tutor</li>
                                        </ul>
                                        <a class="<?= $membership_type==0? 'selected': ''; ?>" href="javascript:;" title=""><?= $membership_type==0? 'SELECTED': 'DOWNGRADE'; ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-4">
                                    <div class="pricetable <?= $membership_type==1? 'active': ''; ?>">
                                        <div class="pricetable-head">
                                            <h3>Standard Jobs</h3>
                                            <h2 style="font-size: 50px;">$ 200/month</h2>

                                        </div><!-- Price Table -->
                                        <ul>
                                            <li><span class="mr-2">&#10003;</span>Unlimited access to parents/students info</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited access to education centers info</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited receipt to the messages</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited to leave message to the candidate cases and recruit tutors</li>
                                            <li><span class="mr-2">&#10003;</span>Unlimited to reply to the messages from the parents/tutor</li>
                                        </ul>
                                        <a class="<?= $membership_type==1? 'selected': ''; ?>" href="<?= base_url('educationPay'); ?>" title=""><?= $membership_type==1? 'SELECTED': 'UPGRADE'; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else if (isset($loggedUserType) && $loggedUserType=='education')
            {
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pricetable <?= $membership_type==0? 'active': ''; ?>">
                            <div class="pricetable-head">
                                <h3>Basic Jobs</h3>
                                <h2>Free Plan</h2>
                            </div><!-- Price Table -->
                            <ul>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to parents/students info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to education centers info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited receipt to the messages</li>
                                <li>Limited to leave message to the candidate cases</li>
                                <li>Limited to reply the message to the parents</li>
                            </ul>
                            <a class="<?= $membership_type==0? 'selected': ''; ?>" href="<?= base_url(); ?>" title=""><?= $membership_type==0? 'SELECTED': 'DOWNGRADE'; ?></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pricetable <?= $membership_type==1? 'active': ''; ?>">
                            <div class="pricetable-head">
                                <h3>Standard Jobs</h3>
                                <h2 style="font-size: 50px">$ 10/month</h2>

                            </div><!-- Price Table -->
                            <ul>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to parents/students info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to education centers info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited receipt to the messages</li>
                                <li><span class="mr-2">&#10003;</span>Limited to leave 10 messages/month  to the candidate cases</li>
                                <li><span class="mr-2">&#10003;</span>Limited to reply the 10 messages/month to the parents</li>
                            </ul>
                            <a class="<?= $membership_type==1? 'selected': ''; ?>" href="<?= base_url('tutorPay/'.$membership_type); ?>" title=""><?php if ($membership_type==1){echo 'SELECTED';}elseif($membership_type<1){echo 'UPGRADE';}else{echo 'DOWNGRADE';} ?></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="pricetable <?= $membership_type==2? 'active': ''; ?>">
                            <div class="pricetable-head">
                                <h3>Basic Jobs</h3>
                                <h2 style="font-size: 50px">$ 20/month</h2>

                            </div><!-- Price Table -->
                            <ul>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to parents/students info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited access to education centers info</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited receipt to the messages</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited to leave message to the candidate cases</li>
                                <li><span class="mr-2">&#10003;</span>Unlimited to reply to the message from the parents</li>
                            </ul>
                            <a class="<?= $membership_type==2? 'selected': ''; ?>" href="<?= base_url('tutorPay/'.$membership_type); ?>" title=""><?= $membership_type==2? 'SELECTED': 'UPGRADE'; ?></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
