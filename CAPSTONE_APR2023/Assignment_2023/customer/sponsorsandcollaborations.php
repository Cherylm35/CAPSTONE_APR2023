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
        p{
            postion:relative;
            left:-100px;
            color:black;
            font-size:17px;
        }
    </style>
<body style="background-color:beige">
<br><br><br><br><br>
<p>Are you a social influencer or a distributor? We welcome both!</p>
<p>If you are interested in collaborating with Electro for sponsorships and marketing, please contact us at:</p>

<p>electric.store@gmail.com</p>

<p>Our requirements for influencers:</p>
<p>- We welcome influencers of all nationalities </p>
<p>- Instagram followers at least have 15K</p>
<p>- The average likes of instagram feed is 1000</p>
<p>- Age 21 or older</p>
<p>- Great attitude and good personal image</p>
<p>- Willing to communicate and no selfishness </p>

<p>We look forward to hear from you soon.</p>
<?php include 'components/bottom.php'?>
</body>
</html>