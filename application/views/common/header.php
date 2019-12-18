<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/candidates_profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 02:32:31 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Site Name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">

    <!-- Styles -->
    <link href="<?= base_url('assets/build/css/system/bootstrap-grid.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/animate.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/responsive.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/chosen.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/colors/colors.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/system/bootstrap.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/build/css/system/starr.css') ?>" rel="stylesheet">

    <!-- Extra Theme Style -->
    <link href="<?= base_url('assets/build/css/extra-import/cropper.css') ?>" rel="stylesheet">
<!--    <link href="--><?//= base_url('assets/build/css/extra-import/components-md.css') ?><!--" rel="stylesheet">-->
    <link href="<?= base_url('assets/build/css/extra-import/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" rel="stylesheet">-->
    <link href="<?= base_url('assets/build/css/extra-import/star-rating-svg.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/extra-import/inbox.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/extra-import/select2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/build/css/extra-import/bootstrap-select.min.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/build/css/my-style.css') ?>" rel="stylesheet">

</head>
<body>

<div class="page-loading">
    <img src="<?= base_url('assets/build/images/loader.gif'); ?>" alt="" />
</div>

<div class="theme-layout" id="scrollup">

    <div class="responsive-header">
        <div class="responsive-menubar">
            <div class="res-logo"><a href="<?= base_url('home'); ?>" title=""><img src="<?= base_url('assets/build/images/resource/logo_4_2.png'); ?>" alt="" /></a></div>
            <div class="menu-resaction">
                <div class="res-openmenu">
                    <img src="<?= base_url('assets/build/images/icon.png'); ?>" alt="" /> Menu
                </div>
                <div class="res-closemenu">
                    <img src="<?= base_url('assets/build/images/icon2.png'); ?>" alt="" /> Close
                </div>
            </div>
        </div>
        <div class="responsive-opensec">
            <?php
            if (isset($loggedUserType)) {
                ?>
                <div class="btns-profiles-sec">
                        <span>
                            <img src="<?= $avatar; ?>" alt="" style="width: 50px; height: 50px;" />
                            <?= $userName; ?>
                        </span>
                    <ul>
                        <li>
                            <a href="<?= base_url('profile'); ?>">
                                <i class="la la-user"></i>
                                My Profile
                            </a>
                        </li>
                        <?php
                        if ($loggedUserType != 'student')
                        {
                            ?>
                            <li>
                                <a href="<?= base_url('membership'); ?>">
                                    <i class="fa fa-credit-card"></i>
                                    My Membership
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>
                            <a href="<?= base_url('inbox'); ?>">
                                <i class="la la-paper-plane"></i>
                                Inbox
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('login/logout'); ?>">
                                <i class="la la-unlink"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>
            <div class="responsivemenu">
                <ul>
                    <li class="menu_widgets">
                        <a href="<?= base_url('home'); ?>" title="">Home</a>
                    </li>
                    <?php
                    if (!isset($loggedUserType)) {
                        ?>
                        <li class="menu_widgets">
                            <a href="<?= base_url('education'); ?>" title="">Education Center</a>

                        </li>
                        <li class="menu_widgets">
                            <a href="<?= base_url('tutor'); ?>" title="">Tutor Center</a>
                        </li>
                        <li class="menu_widgets">
                            <a href="<?= base_url('student'); ?>" title="">Parent Center</a>

                        </li>
                        <?php
                    }
                    else
                    {
                        if ($loggedUserType == 'education')
                        {
                            ?>
                            <li class="menu_widgets">
                                <a href="<?= base_url('education'); ?>" title="">Education Center</a>
                            </li>
                            <?php
                        }
                        else if ($loggedUserType == 'tutor')
                        {
                            ?>
                            <li class="menu_widgets">
                                <a href="<?= base_url('tutor'); ?>" title="">Tutor Center</a>
                            </li>
                            <?php
                        }
                        else if ($loggedUserType == 'student')
                        {
                            ?>
                            <li class="menu_widgets">
                                <a href="<?= base_url('student'); ?>" title="">Parent Center</a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li class="menu_widgets">
                        <a href="<?= base_url('faq'); ?>" title="">FAQ</a>
                    </li>
                    <?php
                    if ($loginStatus != 'success') {
                        ?>
                        <li class="menu-item-has-children">
                            <a href="javascript:;">
                                <i class="la la-key"></i>
                                Signup
                            </a>
                            <ul>
                                <li><a href="<?= base_url('registerEducation'); ?>">Education</a></li>
                                <li><a href="<?= base_url('registerTutor'); ?>">Tutor</a></li>
                                <li><a href="<?= base_url('registerStudent'); ?>">Parent</a></li>
                            </ul>
                        </li>
                        <li class="menu_widgets">
                            <a href="<?= base_url('login'); ?>" title="">
                                <i class="la la-external-link-square"></i>
                                Login
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <header class="stick-top">
        <div class="menu-sec">
            <div class="container">
                <div class="logo">
                    <a href="<?= base_url('home'); ?>" title=""><img src="<?= base_url('assets/build/images/resource/logo_4_2.png'); ?>" alt="" /></a>
                </div><!-- Logo -->
                <?php
                if (isset($loggedUserType)) {
                    ?>
                    <div class="btns-profiles-sec">
                        <span>
                            <img src="<?= $avatar; ?>" alt="" style="width: 50px; height: 50px;" />
                            <?= $userName; ?>
                        </span>
                        <ul>
                            <li>
                                <a href="<?= base_url('profile'); ?>">
                                    <i class="la la-user"></i>
                                    My Profile
                                </a>
                            </li>
                            <?php
                            if ($loggedUserType != 'student')
                            {
                                ?>
                                <li>
                                    <a href="<?= base_url('membership'); ?>">
                                        <i class="fa fa-credit-card"></i>
                                        My Membership
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li>
                                <a href="<?= base_url('inbox'); ?>">
                                    <i class="la la-paper-plane"></i>
                                    Inbox
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('login/logout'); ?>">
                                    <i class="la la-unlink"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
                <nav>
                    <ul class="menu_color">
                        <li class="menu_widgets">
                            <a href="<?= base_url('home'); ?>" title="">Home</a>
                        </li>
                        <?php
                        if (!isset($loggedUserType)) {
                            ?>
                            <li class="menu_widgets">
                                <a href="<?= base_url('education'); ?>" title="">Education Center</a>

                            </li>
                            <li class="menu_widgets">
                                <a href="<?= base_url('tutor'); ?>" title="">Tutor Center</a>
                            </li>
                            <li class="menu_widgets">
                                <a href="<?= base_url('student'); ?>" title="">Parent Center</a>

                            </li>
                            <?php
                        }
                        else
                        {
                            if ($loggedUserType == 'education')
                            {
                                ?>
                                <li class="menu_widgets">
                                    <a href="<?= base_url('education'); ?>" title="">Education Center</a>
                                </li>
                                <?php
                            }
                            else if ($loggedUserType == 'tutor')
                            {
                                ?>
                                <li class="menu_widgets">
                                    <a href="<?= base_url('tutor'); ?>" title="">Tutor Center</a>
                                </li>
                                <?php
                            }
                            else if ($loggedUserType == 'student')
                            {
                                ?>
                                <li class="menu_widgets">
                                    <a href="<?= base_url('student'); ?>" title="">Parent Center</a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li class="menu_widgets">
                            <a href="<?= base_url('faq'); ?>" title="">FAQ</a>
                        </li>
                        <?php
                        if (!isset($loggedUserType)) {
                            ?>
                            <li class="menu-item-has-children">
                                <a href="javascript:;">
                                    <i class="la la-key"></i>
                                    Signup
                                </a>
                                <ul>
                                    <li><a href="<?= base_url('registerEducation'); ?>">Education</a></li>
                                    <li><a href="<?= base_url('registerTutor'); ?>">Tutor</a></li>
                                    <li><a href="<?= base_url('registerStudent'); ?>">Parent</a></li>
                                </ul>
                            </li>
                            <li class="menu_widgets">
                                <a href="<?= base_url('login'); ?>" title="">
                                    <i class="la la-external-link-square"></i>
                                    Login
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav><!-- Menus -->
            </div>
        </div>
    </header>
