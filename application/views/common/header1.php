<!DOCTYPE html>
<html>

<!-- Mirrored from grandetest.com/theme/jobhunt-html/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 02:31:23 GMT -->
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

    <!-- <link rel="stylesheet" href="css/font-awesome.min_1.css" />  -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link href="<?= base_url('assets/build/css/home-style.css') ?>" rel="stylesheet">

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
                    <li class="menu-item-has-children">
                        <a href="javascript:;" class="text-white">
                            FAQ
                        </a>
                        <ul>
                            <li><a href="<?= base_url('faqEducation'); ?>">Education</a></li>
                            <li><a href="<?= base_url('faqTutor'); ?>">Tutor</a></li>
                            <li><a href="<?= base_url('faqStudent'); ?>">Parent</a></li>
                        </ul>
                    </li>
                    <?php
                    if (!isset($loggedUserType)) {
                    ?>
                        <li class="menu-item-has-children">
                            <a href="javascript:;">
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

    <header class="stick-top style3">
        <div class="menu-sec">
            <div class="container">
                <div class="logo">
                    <a href="<?= base_url('home'); ?>" title=""><img src="<?= base_url('assets/build/images/resource/logo4.png'); ?>" alt="" /></a>
                </div>
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
                            <a href="<?= base_url('home'); ?>" class="<?= isset($loggedUserType)? 'text-white': ''; ?>" title="">Home</a>
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
                                    <a href="<?= base_url('education'); ?>" class="text-white" title="">Education Center</a>
                                </li>
                                <?php
                            }
                            else if ($loggedUserType == 'tutor')
                            {
                                ?>
                                <li class="menu_widgets">
                                    <a href="<?= base_url('tutor'); ?>" class="text-white" title="">Tutor Center</a>
                                </li>
                                <?php
                            }
                            else if ($loggedUserType == 'student')
                            {
                                ?>
                                <li class="menu_widgets">
                                    <a href="<?= base_url('student'); ?>" class="text-white" title="">Parent Center</a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <li class="menu-item-has-children">
                            <a href="javascript:;" class="text-white">
                                FAQ
                            </a>
                            <ul>
                                <li><a href="<?= base_url('faqEducation'); ?>">Education</a></li>
                                <li><a href="<?= base_url('faqTutor'); ?>">Tutor</a></li>
                                <li><a href="<?= base_url('faqStudent'); ?>">Parent</a></li>
                            </ul>
                        </li>
                        <?php
                        if (!isset($loggedUserType)) {
                            ?>
                            <li class="menu-item-has-children">
                                <a href="javascript:;" class="text-white">
                                    Signup
                                </a>
                                <ul>
                                    <li><a href="<?= base_url('registerEducation'); ?>">Education</a></li>
                                    <li><a href="<?= base_url('registerTutor'); ?>">Tutor</a></li>
                                    <li><a href="<?= base_url('registerStudent'); ?>">Parent</a></li>
                                </ul>
                            </li>
                            <li class="menu_widgets">
                                <a href="<?= base_url('login'); ?>" class="text-white" title="">
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

    <section>
        <div class="block no-padding">
            <div class="container fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="find-cand-sec">
                            <div class="iconmove"><img class="animute" src="<?= base_url('assets/build/images/resource/iconmove.jpg'); ?>" alt="" /></div>
                            <div class="mockup-top"><img class="animute" src="<?= base_url('assets/build/images/resource/mockup.png'); ?>" alt="" /></div>
                            <div class="mockup-bottom"><img src="<?= base_url('assets/build/images/resource/mockup2.png'); ?>" alt="" /></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="find-cand">
                                            <h3>Find Education Centers</h3>
                                            <span>We have <?= $educationNum; ?> Registered Education Centers now</span>

                                        </div>
                                        <div class="find-cand" style="margin-left:1060px;">
                                            <h3>Find Tutors</h3>
                                            <span>We have <?= $tutorNum; ?> Registered Tutors now</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scroll-to style2">
                            <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
