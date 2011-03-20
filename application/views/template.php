<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?= base_url() ?>css/style.css" type="text/css" media="screen" title="no title" />
        <!--<link rel="stylesheet" href="<?= base_url() ?>css/reset.css" type="text/css" media="screen" title="no title" />-->
        <script type="text/javascript" src="<?= base_url() ?>scripts/jquery-1.5.min.js"></script>
        <title>UCC : Summer Courses 2011</title>
    </head>

    <body>
        <!--Begin Body-->
        <div class = "centered">
            <div id = "mainContainer">
                <!--Begin MainContainer-->
                <div class = "sidePad" id = "header">
                    <!--Begin Header-->
                    <div class = "column" id = "header_login">
                        <? if (!isset($logged_in) OR $logged_in == FALSE): ?>
                        <?php
                            $email_input = array('name' => 'email', 'id' => 'email', 'value' => set_value('email'));
                            $pass_input = array('name' => 'pass', 'id' => 'pass');
                        ?>
                        <?= form_open('login/validate_credentials') ?>
                        <?= form_input($email_input) ?>
                        <?= form_password($pass_input) ?>
                        <?= form_submit('submit', 'Login') ?>
                        <?= anchor('login/register', 'Register') ?>
                        <?= form_close() ?>
                        <? else: ?>
                        <?php
                                if ($type == 'admin' &&
                                        $email == 'admin@sc.ucc.ie') {
                                    echo anchor('settings/admin', 'admin settings');
                                } else if ($type == 'provider') {
                                    echo anchor('settings/provider', 'provider settings');
                                } else {
                                    echo anchor('settings/user', 'user settings');
                                }
                        ?>
                        <?= $name ?>
                        <?= anchor('login/logout', 'logout') ?>
                        <? endif; ?>
                            </div>
                            <div class = "column" id = "header_logo">
                                <div class = "column" id = "header_logo_UCC">
                                    <img src="<?=base_url()?>/images/static/UCC logo.gif" width="200" height="75" />
                                </div>
                                <div class = "column" id = "header_logo_2011">
                                    <img src="<?=base_url()?>images/static/sc2011.jpg" width="454" height="75" />
                                </div>
                            </div>
                            <!--End Header-->
                        </div>
                        <div class = "sidePad" id = "pageContent">
                            <div class = "row" id = "menuBar">
                                <ul>
                            <?php
                                $menuitems = array(
                                    'Home' => '/home',
                                    'Courses' => '/courses',
                                    'News' => '/news',
                                    'About' => '/about',
                                    'Contact' => '/contact'
                                );
                            ?>|
                            <? foreach ($menuitems as $title => $url): ?>
                                    <li>
                                <? $attributes = 'class="menuitem" ' . ($title == $choice ? 'id="selected"' : ''); ?>
                                <?= anchor($url, $title, $attributes) ?> |
                                </li>
                            <? endforeach ?>
                        </ul>
                    </div>
                    <div class = "row" id = "side_info">
                        <div class = "column" id = "side_info_left">
                            <?php
							if(isset($left_side_info))
							{
								if(! isset($left_side_info_data) )
								{
									$left_side_info_data = '';
								}							
								$this->load->view($left_side_info, $left_side_info_data);
							} else {
								$this->load->view('static/default_side_info');
							}
							?>
                        </div>
                        <div class = "column" id = "side_info_mid">
							<h2><?=$page_title?></h2>
							<?php
							if(isset($content))
							{
								if(! isset($content_data))
								{
									$content_data = '';
								}
								$this->load->view($content, $content_data);
							}
							?>

                        </div>
                        <div class = "column" id = "side_info_right">
							<? if(isset($right_side_info)): ?>
							<?	$this->load->view($left_side_info); ?>
							<? else: ?>
                            <div class = "row" id = "calendar">
                                <img src="<?=base_url()?>images/static/calendar.jpg" width="150" height="150" align="middle" />
                            </div>
							<? endif;?>
                        </div>
                    </div>
                </div>
                <div class = "row" id = "footer">
                    <!--Begin Footer-->
                    <div class = "row" id = "copyright">
                        <div class = "column" id = "cp_left">
            			Copyright 2011 University College Cork
                        </div>
                        <div class = "column" id = "cp_right">
                		Abuse | Acceptable Use Policy | Legal | Privacy | Webmaster
                        </div>
                    </div>
                    <!--End Footer-->
                </div>
                <!--End MainContainer-->
            </div>
        </div>
        <!--End Body-->
    </body>

</html>