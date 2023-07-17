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
<h1>Pick-Up location & working hours:</h1>
<p>LEVEL 19, EQUATORIAL PLAZA</p>
<p>MON-SAT: 10PM-7:30PM</p>	
<p>SUN: 10PM-4:30PM</p>
<p>closed on public holidays</p>

<p>Pick-up orders can usually be processed and be ready for pick up within 2 working days upon order confirmation.</p>

<h1>1.How long does delivery take?</h1>
<p>For free shipping: Delivery within West Malaysia will take 7-10 working days, East Malaysia 10-15 working days and international delivery will take 20– 30 business days once your order has been shipped out from our warehouse.
</p>
<br>
<h1>2. How can I track my order?</h1>
<p>You can call to us and then we will go to contact with the delievery man.</p>
<p>For same-day delivery: A text message will be sent to the recipient's phone number (no parcel info included) once the order is processed and ready to send out.</p>
<br>
<h1>3. What are the shipping rates?</h1>
<p>Free shipping is available for all orders with no minimum spend required for all Malaysia and every country deliveries.</p>
<br>
<h1>4. Will my parcel be charged customs and import charges?</h1>
<p>Any customs or import duties are charged once the parcel reaches its destination country. These charges must be paid by the recipient of the parcel. Unfortunately, we have no control over these charges, and cannot tell you what the cost would be, as customs policies and import duties vary widely from country to country. If the parcel arrived, we will send you a receipt and you can bank to us.</p>
<br>
<h1>5. Which shipping courier do you use?</h1>
<p>We will choose which shipping courier is secure , faster and more cheaper.</p>
<br>
<h1>6. How can I change my order after it's been placed?</h1>
<p>ou may contact us via FB Messenger/ Instagram for the quickest reply to check if your order can still be changed.</p>
<br>
<h1>Will there be an additional charge for re-delivery?</h1>
<p>Yes, if parcel was not delivered to recipient and has returned to sender, a second delivery fee will be charged by the logistic partners. Note that the second delivery fee is the responsibility of the recipient.</p>

<?php include 'components/bottom.php'?>
</body>
</html>