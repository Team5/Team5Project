<?php
$menuitems = array(
    'Home'    => '/home',
    'Courses' => '/courses',
    'News'    => '/news',
    'About'   => '/home/about',
    'Help'    => '/home/help',
    'Contact' => '/contact'
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>UCC: Summer Course <?=$page_title?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="<?=base_url()?>css/reset.css" type="text/css" media="screen" title="no title" />
    <link rel="stylesheet" href="<?=base_url()?>css/default_style.css" type="text/css" media="screen" title="no title" />
    <script type="text/javascript" src="<?=base_url()?>scripts/jquery-1.5.min.js"></script>
</head>
<body>
    <div id="header">
        <div id="title">
            <a href="/"><img id="logo" src="#" alt="Logo" /></a>
            <h2><?=$page_title?></h2>
            <p>Some mild slogan to go in the header...</p>
        </div>
        
        <div id="top_menu">
            <ul>
                <?foreach($menuitems as $title => $url):?>
                <li>
                <? $attributes = 'class="menuitem" '.($title==$choice?'id="selected"':'');?>
                <?=anchor($url, $title, $attributes)?>
                </li>
                <?endforeach?>
            </ul>
        </div>
    </div>