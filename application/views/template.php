<!DOCTYPE html>
<html>
<!--Begin Head-->
<head>
    <title>UCC: Summer Course <?= $page_title ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="<?= base_url() ?>css/reset.css" type="text/css" media="screen" title="no title" />
    <link rel="stylesheet" href="<?= base_url() ?>css/default_style.css" type="text/css" media="screen" title="no title" />
    <script type="text/javascript" src="<?= base_url() ?>scripts/jquery-1.5.min.js"></script>
</head>
<!--End Head-->
<!--Begin Main Container-->
<body>
<div class="row">
    <div id="mainContainer">
        <div id="header">
        <? if (!isset($logged_in) OR $logged_in == FALSE): ?>
        <?php
            $email_input = array('name' => 'email', 'id' => 'email', 'value' => set_value('email'));
            $pass_input = array('name' => 'pass', 'id' => 'pass');
        ?>
        <div id="login_form">
            <?= form_open('login/validate_credentials') ?>
            <?= form_input($email_input) ?>
            <?= form_password($pass_input) ?>
            <?= form_submit('submit', 'Login') ?>
            <?= anchor('login/register', 'Register') ?>
            <?= form_close() ?>
        </div>
        <? else: ?>
        <div id="login_popup"><p>
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
        </p></div>
        <? endif; ?>
        <div id="title">
            <a href="<?= site_url() ?>">
                <img id="logo"
                     src="http://cosmos.ucc.ie/~kl9/project/images/static/UCC-logo-for-web-revised2.gif"
                     alt="Logo" />
            </a>
            <h2><?= $page_title ?></h2>
            <p>Some mild slogan to go in the header...</p>
        </div>

        <div id="top_menu">
        <ul>
        <?php
        $menuitems = array(
            'Home' => '/home',
            'Courses' => '/courses',
            'News' => '/news',
            'About' => '/home/about',
            'Help' => '/home/help',
            'Contact' => '/contact'
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
        </div>
    </div>
    <!--End Main Container -->
    <!--Begin Content-->
    <? if (isset($content)): ?>
    <div id="content">
    <?php
            if (!isset($content_data)) {
                $content_data = '';
            }
            $this->load->view($content, $content_data);
    ?>
    </div>
    <? endif; ?>
    <!--End Content-->
    <!--Begin Footer -->
    <div id="footer">
        <p>Some text</p>
    </div>
    <!--End Footer-->
</div>
</body>
</html>