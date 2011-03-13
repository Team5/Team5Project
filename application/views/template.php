<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?= base_url() ?>css/reset.css" type="text/css" media="screen" title="no title" />
<link rel="stylesheet" href="<?= base_url() ?>css/style.css" type="text/css" media="screen" title="no title" />

<link rel="shortcut icon" href="/favicon.ico" />
<script type="text/javascript" src="<?= base_url() ?>scripts/jquery-1.5.min.js"></script>
<title>UCC Summer Courses</title>
</head>

<body>
    <!--Begin Body-->
    <div class = "centered">
        <div id = "mainContainer">
        <!--Begin MainContainer-->
            <div class = "sidePad" id = "header">
                <p id = "p1">University College Cork : Summer Courses 2011</p>
                <!--Begin Header-->
                <div class = "column" id = "header_login">
                <? if (!isset($logged_in) OR $logged_in == FALSE): ?>
                <?php
                    $email_input = array('name' => 'email',
                                         'id' => 'email',
                                         'value' => set_value('email', 'Email address'));
                    $pass_input = array('name' => 'pass',
                                        'id' => 'pass');
                ?>
                    <?= form_open('login/validate_credentials') ?>
                    <?= form_input($email_input) ?>
                    <?= form_password($pass_input) ?>
                    <?= form_submit('submit', 'Login') ?>
                    <?= anchor('login/register', 'Register') ?>
                    <?= form_close() ?>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#email').click(function(){
                                $(this).val("");
                            });
                            $('#email').change(function(){
                                $(this).addClass();
                                if($(this).val()==""){
                                    $(this).val('Email address');
                                }
                            });
                        });
                    </script>

                <? else: ?>
                <?php
                if($type == 'admin' &&
                   $email == 'admin@sc.ucc.ie')
                {
                    echo anchor('settings/admin', 'admin settings');
                }
                else if($type=='provider')
                {
                    echo anchor('settings/provider', 'provider settings');
                }
                else
                {
                    echo anchor('settings/user', 'user settings');
                }
                ?>
                <?=$name?>
                <?=anchor('login/logout','logout')?>
                <? endif; ?>
                </div>
                <div class = "column" id = "header_logo">
                <div class = "column" id = "header_logo_UCC"><img src="/images/static/UCC logo.gif" width="200" height="75" alt="UCC Logo"/>
                </div>
                <div class = "column" id = "header_logo_2011"><img src="/images/static/sc2011.jpg" width="454" height="75" alt="Summer Courses 2011"/></div>
                </div>
            <!--End Header-->
            </div>
        <div class = "sidePad" id = "pageContent">
            <div class = "row" id = "menuBar">
            <ul>
            <?php
            $menuitems = array(
                'Home'    => '/home',
                'Courses' => '/courses',
                'Rooms'   => '/rooms',
                'News'    => '/news',
                'About'   => '/home/about',
                'Help'    => '/home/help',
                'Contact' => '/home/contact'
            );
            ?>
            <? foreach ($menuitems as $title => $url): ?>
                <li>
                <? $attributes = 'class="menuitem" ' . ($title == $choice ? 'id="selected"' : ''); ?>
                <?= anchor($url, $title, $attributes) ?>
                </li>
            <? endforeach ?>
            </ul>
            </div>
            <div class = "row" id = "side_info">
                <div class = "column" id = "side_info_left">
                	<div class = "row" id = "calendar"><img src="/images/static/calendar.jpg" width="150" height="150" alt="Calendar"/></div>
                        <div class = "row" id = "dates">
                        <ul>
                            <li>Start Date June 6</li>
                            <li>Opening Weekend : June 4 - 5</li>
                            <li>End Date August 15</li>
                        </ul>
                        </div>
                </div>

                <div class = "column" id = "side_info_right">
                    <? if (isset($content)): ?>
                    <?php
                        if (!isset($content_data)) {
                            $content_data = '';
                        }
                        $this->load->view($content, $content_data);
                    ?>
                    <? endif; ?>
                    <!-- <p>Sciences : Computer Science | Food Science</p>
                    <p>Language : Irish | French | Chinese</p> -->
                </div>
                </div>
            </div>
        <div class = "row" id = "footer">
        <!--Begin Footer-->
        Copyright 2011 University College Cork
        <!--End Footer-->
        </div>
        <!--End MainContainer--> 
        </div>
    </div>
    <!--End Body-->
</body>

</html>

