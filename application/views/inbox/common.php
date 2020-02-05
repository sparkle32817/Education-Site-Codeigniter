<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(<?= base_url('assets/build/images/resource/tutor_3.png'); ?>) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="card-body inbox-panel">
<!--                <a href="--><?//= base_url('inbox/newMessage')?><!--" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">-->
<!--                    <i class="fa fa-plus-circle"></i>-->
<!--                    Compose-->
<!--                </a>-->
                <ul class="list-group list-group-full">
                    <li class="list-group-item <?php if (urldecode(uri_string()) == 'inbox'){ ?>active<?php } ?>">
                        <a href="<?= base_url('inbox')?>">
                            <i class="fa fa-envelope-o"></i>
                            Inbox
                        </a>
                        <?php if ( $inboxNum > 0 ) {?>
                            <span class="badge badge-success ml-auto"><?= $inboxNum; ?></span>
                        <?php } ?>
                    </li>
                    <li class="list-group-item <?php if (urldecode(uri_string()) == 'inbox/sent'){ ?>active<?php } ?>">
                        <a href="<?= base_url('inbox/sent')?>">
                            <i class="la la-paper-plane"></i>
                            Sent Mail
                        </a>
                    </li>
                    <li class="list-group-item <?php if (urldecode(uri_string()) == 'inbox/trash'){ ?>active<?php } ?>">
                        <a href="<?= base_url('inbox/trash')?>">
                            <i class="la la-trash"></i>
                            Trash
                        </a>
                    </li>
                </ul>
            </div>
        </div>