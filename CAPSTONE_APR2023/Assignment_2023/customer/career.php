<?php
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
 };
include 'components/whatsapp.php';
include 'components/bar.php';
?>
<html>
<style>
.dok{
    font-size:17px;
}
p{
    font-size:17px;
}
</style>
<body style="background-color:beige;">
<br><br><br><br><br><br><br>
<h5 style='font-size:30px'><b>Internship for Business Management/ Administration/ Marketing/ Merchandising Students</b></h5>
<ul style="list-style-type:disc;"class="dok">
<h5 style='font-size:23px'>Scope:</h5>
  <li>Devising good strategies to increase sales.</li>
  <li>Ensure products are presented in appealing manner to entice customers.</li>
  <li>Improve income projection through efficient advertising and promotion campaigns.</li>
  <li>Track detailed store profits.</li>
  <li>Supervise the creation of store and visual displays.</li>
  <li>Assist in day-to-day operation.</li>
  <li>Updating and maintaining store performance.</li>
</ul>
<h5 style='font-size:30px'>Requirements:</h5>
<ul class="dok">
<li>Candidate must at least possess a SPM</li>
<li>Required language(s): Mandarin, English</li>
<li>1 Full-Time Internship position for duration of 3 to 6 month(s).</li>
</ul>
<br><br><br>
<p>All position(s) are based at  in Kuala Lumpur, Malaysia.</p>
<br>
<p>If you are interested for any of the positions above, please enclose your resume with the position title and send to sammy@celovismalaysia.com</p>
<br>
<p>Only shortlisted candidates will be contacted.</p>
</body>
<?php
include 'components/bottom.php';
?>
</html>