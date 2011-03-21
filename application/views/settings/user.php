<?php
 /**
  * settings/user View
  *
  * Provides options for the user, add course, enroll user
  *
  * @todo Should fit it's description
  * @param Array $courses Array of courses that this user applied to.
  *
  */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="http://localhost/css/style.css" type="text/css" media="screen" title="no title" />
        <!--<link rel="stylesheet" href="http://localhost/css/reset.css" type="text/css" media="screen" title="no title" />-->
        <script type="text/javascript" src="http://localhost/scripts/jquery-1.5.min.js"></script>
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

                                                <a href="http://localhost/settings/provider">provider settings</a>                        Provider One                         <a href="http://localhost/login/logout">logout</a>                                                    </div>
                            <div class = "column" id = "header_logo">
                                <div class = "column" id = "header_logo_UCC">
                                    <img src="http://localhost//images/static/UCC%20logo.gif" width="200" height="75" alt="logo" />
                                </div>
                                <div class = "column" id = "header_logo_2011">

                                    <img src="http://localhost/images/static/sc2011.jpg" width="454" height="75" alt="sc2011" />
                                </div>
                            </div>
                            <!--End Header-->
                        </div>
                        <div class = "sidePad" id = "pageContent">
                            <div class = "row" id = "menuBar">
                                <ul>
                                                                                        <li>

                                                                        <a href="http://localhost/home" class="menuitem" id="selected">Home</a>                                </li>
                                                            <li>
                                                                        <a href="http://localhost/courses" class="menuitem" >Courses</a>                                </li>
                                                            <li>
                                                                        <a href="http://localhost/news" class="menuitem" >News</a>                                </li>
                                                            <li>

                                                                        <a href="http://localhost/about" class="menuitem" >About</a>                                </li>
                                                            <li>
                                                                        <a href="http://localhost/contact" class="menuitem" >Contact</a>                                </li>
                                                    </ul>
                    </div>
                    <div class = "row" id = "side_info">
                        <div class = "column" id = "side_info_left">

                            <div id = "maps">
	<div id = "label1">
		Download the Campus Maps
	</div>
	<div id = "campus">
		<img src="http://localhost/images/static/map4.jpg" width = "180" alt="map4" />
	</div>
</div>
<div id = "links">
	<div id = "label2">

		Books &amp; Merchandise
	</div>
	<div id = "links_1">
		<ul>
			<li>Cork University Press</li>
			<li>UCC Vistor Centre</li>
			<li>Student Centre</li>

		</ul>
	</div>
</div>                        </div>
                        <div class = "column" id = "side_info_mid">
                            <h2>Provider</h2>
                            <h3>Course One</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">

<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div><a href="#" onclick="$('#Applied_1').slideToggle('slow')">List Applied</a>
<table id="Applied_1">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Enroll?</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User One </td>
        <td>u1@k.com</td>
        <td><input type="checkbox" name="enroll_users[]" value="1,1"  /></td>
    </tr>

        </tbody>
    </table>

<a href="#" onclick="$('#Enrolled_1').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_1">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User Two </td>
        <td>u2@k.com</td>
    </tr>
        <tr>

        <td>User 3 </td>
        <td>u3@k.com</td>
    </tr>
        </tbody>
</table>
<h3>Course about sciency stuff</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />

</div>
<a href="#" onclick="$('#Enrolled_4').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_4">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
    </thead>

    <tbody>
        <ul>
        <li>User One </td>
        <td>u1@k.com</td>
    </ul>
        </tbody>
</table>
<h3>Physics course</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
<a href="#" onclick="$('#Enrolled_6').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_6">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User 3 </td>
        <td>u3@k.com</td>
    </tr>
        </tbody>

</table>
<h3>Chemistry</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
<a href="#" onclick="$('#Enrolled_8').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_8">
    <thead>
        <tr>
            <th scope="col">Name</th>

            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User One </td>
        <td>u1@k.com</td>

    </tr>
        </tbody>
</table>
<h3>Quantum mechanics</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
<a href="#" onclick="$('#Enrolled_11').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_11">
    <thead>

        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User One </td>

        <td>u1@k.com</td>
    </tr>
        </tbody>
</table>
<h3>Newest course</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
<h3>New course</h3>

<form action="http://localhost/settings/provider/enroll" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
<a href="#" onclick="$('#Enrolled_15').slideToggle('slow')">List Enrolled</a>
<table id="Enrolled_15">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
    </thead>
    <tbody>
        <tr>
        <td>User One </td>
        <td>u1@k.com</td>
    </tr>
        </tbody>

</table>

<input type="submit" name="Submit" value="enroll" id="enroll_button" /></form>

<h2>Add new course?</h2>
<fieldset>
    <legend>Add a new course</legend>
    <form action="http://localhost/settings/provider/add_course" method="post" accept-charset="utf-8">
<div class="hidden">
<input type="hidden" name="csrf_test_name" value="19d76dfe9a089948fc88c49f72b41f23" />
</div>
    <fieldset>

        <legend>Course details</legend>
        <input type="text" name="title" value="Course Name"  />        <input type="text" name="rid" value="Room ID"  />        <select name="area">
<option value="0">arts</option>
<option value="1">business</option>
<option value="2">science</option>
<option value="3">medicine</option>
</select>        <textarea name="description" cols="65" rows="12" >Course Description</textarea>    </fieldset>

    <fieldset>
        <label>Course dates</label>
        <br/>Start-date:<br/>
    <select name="start_day" id="start_day">
<option value="0">1</option>
<option value="1" selected="selected">2</option>
<option value="2">3</option>

<option value="3">4</option>
<option value="4">5</option>
<option value="5">6</option>
<option value="6">7</option>
<option value="7">8</option>
<option value="8">9</option>
<option value="9">10</option>
<option value="10">11</option>
<option value="11">12</option>

<option value="12">13</option>
<option value="13">14</option>
<option value="14">15</option>
<option value="15">16</option>
<option value="16">17</option>
<option value="17">18</option>
<option value="18">19</option>
<option value="19">20</option>
<option value="20">21</option>

<option value="21">22</option>
<option value="22">23</option>
<option value="23">24</option>
<option value="24">25</option>
<option value="25">26</option>
<option value="26">27</option>
<option value="27">28</option>
<option value="28">29</option>
<option value="29">30</option>

<option value="30">31</option>
</select>    <select name="start_month" id="start_month">
<option value="0">January</option>
<option value="1">Febuary</option>
<option value="2">March</option>
<option value="3">April</option>
<option value="4">May</option>
<option value="5">June</option>
<option value="6">July</option>

<option value="7">August</option>
<option value="8">September</option>
<option value="9">October</option>
<option value="10">November</option>
<option value="11">December</option>
</select>    <select name="start_year" id="start_year">
<option value="0">2011</option>
<option value="1" selected="selected">2012</option>
</select>
    <br/>End-date:<br/>

    <select name="end_day" id="end_day">
<option value="0">1</option>
<option value="1" selected="selected">2</option>
<option value="2">3</option>
<option value="3">4</option>
<option value="4">5</option>
<option value="5">6</option>
<option value="6">7</option>
<option value="7">8</option>

<option value="8">9</option>
<option value="9">10</option>
<option value="10">11</option>
<option value="11">12</option>
<option value="12">13</option>
<option value="13">14</option>
<option value="14">15</option>
<option value="15">16</option>
<option value="16">17</option>

<option value="17">18</option>
<option value="18">19</option>
<option value="19">20</option>
<option value="20">21</option>
<option value="21">22</option>
<option value="22">23</option>
<option value="23">24</option>
<option value="24">25</option>
<option value="25">26</option>

<option value="26">27</option>
<option value="27">28</option>
<option value="28">29</option>
<option value="29">30</option>
<option value="30">31</option>
</select>    <select name="end_month" id="end_month">
<option value="0">January</option>
<option value="1">Febuary</option>
<option value="2">March</option>

<option value="3">April</option>
<option value="4">May</option>
<option value="5">June</option>
<option value="6">July</option>
<option value="7">August</option>
<option value="8">September</option>
<option value="9">October</option>
<option value="10">November</option>
<option value="11">December</option>

</select>    <select name="end_year" id="end_year">
<option value="0">2011</option>
<option value="1" selected="selected">2012</option>
</select>    </fieldset>
    <input type="submit" name="Submit" value="add course" id="add_course_button" />

    </form>
</fieldset>

<!--<script language="javascript" type="text/javascript">-->
<script>
$(document).ready(function(){
    $('table').hide();

    /*$('input').click(function(){
        $(this).val("");
    });*/

    months = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    function isLeapYear(year){
        year = 1994 - year;
        if(year % 400 == 0){
            return true;
        } else if(year % 100 == 0){
            return false;
        } else if(year % 4 == 0){
            return true;
        } else {
            return false;
        }
    }

    function handle_dates(prefix) {
        var year  = $(prefix+'_year').val();
        var month = $(prefix+'_month').val();
        var newOptions = "";
        for(var i=1; i<=months[month]; i++){
            newOptions += '<option value="'+i+'">'+i+'</option>';
        }
        if(month == 1 && isLeapYear(year)){
            newOptions += '<option value="'+29+'">'+29+'</option>';
        }
        $(prefix+'_day').html(newOptions);
    }

    function handle_start() { handle_dates('#start') }
    function handle_end()   { handle_dates('#end') }

    $('#start_month').change(handle_start);
    $('#start_year').change(handle_start);
    $('#end_month').change(handle_end);
    $('#end_year').change(handle_end);
});
</script>                        </div>

                        <div class = "column" id = "side_info_right">
                                                            <div class = "row" id = "calendar">
                                    <img src="http://localhost/images/static/calendar.jpg" width="150" height="150" align="middle" alt="cal" />
                                </div>
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