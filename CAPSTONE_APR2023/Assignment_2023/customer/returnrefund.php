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
        h1{
            color:black;
            font-size:27px;
        }
    </style>
<body style="background-color:beige">
<br><br><br><br><br>
<h1>Returns & Exchanges</h1>
<p>Please take note that only the reasons eligible for return/exchange are stated below:</p>
<p>(1) Incorrect Size</p>
<p>(2) Incorrect Item Sent</p>
<p>(3) Manufacturer Defect Item</p>
<p>You have [7] calendar days to make a return/exchange for a manufacturer’s defective item and/or items that were wrongly sent from the date you received it.</p>
<p>Every item that has applied for return/exchange needs to have proof of purchase (Celovis official receipt, E-invoice, etc)</p>
<br>
<h1>Shipping for returns and reships</h1>
<p>Customers will bear their own shipping costs for item return or exchange unless the issue arises from the seller (item sent wrongly or manufacturer defect).</p>
<br>
<h1>How to apply for return & exchange?</h1>
<p>Send a photo of the defective/wrong item along with your order number to our whatsapp (Elec.Store) through Whatsapp.</p>
<p>Wait for our reply (we always try to reply as soon as we can).</p>
<p>Our customer service team will inform customers within 7-14 working days after inspection.</p>
<br>
<h1>Refunds</h1>
<p>Please take note that we do not provide refunds on any purchase made.</p>
<?php include 'components/bottom.php'?>
</body>
</html>