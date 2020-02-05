<style>
    a.btn-hide, a.btn-hide:hover {
        background-color: #f4f5fa;
        cursor: default;
    }
</style>
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
                                        <a class="<?= $membership_type==0? 'selected': 'hide-button'; ?>" href="javascript:;" title=""><?= $membership_type==0? 'SELECTED': ''; ?></a>
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
                                        <a class="<?= $membership_type==1? 'selected': ''; ?>" href="<?= $membership_type==1? 'javascript:;': base_url('payEMU'); ?>" title="">
                                          <?= $membership_type==1? 'SELECTED': 'UPGRADE'; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else if (isset($loggedUserType) && $loggedUserType=='tutor')
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
                            <a class="<?= $membership_type==0? 'selected': 'btn-hide'; ?>"
                               href="<?= /*base_url()*/'javascript:;'; ?>"
                               title=""
                            >
                              <?= $membership_type==0? 'SELECTED': ''; ?>
                            </a>
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
                                <li style="font-size: 12px;"><span class="mr-2">&#10003;</span>Limited to leave 10 messages/month  to the candidate cases</li>
                                <li><span class="mr-2">&#10003;</span>Limited to reply the 10 messages/month to the parents</li>
                            </ul>
                            <a class="<?php if ($membership_type==1){echo 'selected';}elseif($membership_type>1){echo 'btn-hide';}else{echo '';} ?>"
                               href="<?= $membership_type<1? base_url('payTMU/1'): 'javascript:;'; ?>"
                               title=""
                            >
                              <?php if ($membership_type==1){echo 'SELECTED';}elseif($membership_type<1){echo 'UPGRADE';}else{echo '';} ?>
                            </a>
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
                            <a class="<?= $membership_type==2? 'selected': ''; ?>" href="<?= base_url('payTMU/2'); ?>" title=""><?= $membership_type==2? 'SELECTED': 'UPGRADE'; ?></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
