<?php $this->load->view('static/header', $header_data) ?>

<? if( ! isset($header_data['logged_in']) OR $header_data['logged_in'] == FALSE): ?>
    <?php $this->load->view('form/login')?>
<? else:?>
<div id="login_popup">
    <p>
        <?=$header_data['name']?>
        <?=anchor('login/logout','logout')?>
    </p>
</div>
<? endif;?>

<? if(isset($content)): ?>
<div id="content">
<?php
    if( ! isset($content_data))
    {
        $content_data = '';
    }
    $this->load->view($content, $content_data);
?>
</div>
<? endif; ?>

<? if(isset($second_content)): ?>
<div id="second_content">
<?php
    if( ! isset($second_content_data))
    {
        $second_content_data = '';
    }
    $this->load->view($content, $second_content_data);
?>
</div>
<? endif;?>

<?php $this->load->view('static/side_info') ?>

<?php $this->load->view('static/footer') ?>
