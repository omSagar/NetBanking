<?php
session_start();
include("header.php");
include("dbconnection.php");

$transactionid = $_GET['trancid'];
$results1 = mysql_query("select customerid,accountnumber,amount from transaction where transactionid = '$transactionid'");
while($transactionarray = mysql_fetch_array($results1))
{
	$customerid = $transactionarray['customerid'];
	$accountnumber=$transactionarray['accountnumber'];
	$amount=$transactionarray['amount'];
	
}

mysql_query("UPDATE accounts SET accountbalance=accountbalance - $amount, unclearbalance=unclearbalance-$amount WHERE customerid = '$customerid' and accno ='$accountnumber'");
mysql_query("UPDATE transaction SET paymentstat='Approved' WHERE transactionid = '$transactionid'");

$results = mysql_query("SELECT * FROM transaction where transactionid = '$transactionid'");
while($arrow = mysql_fetch_array($results))
{
	$transactionid = $arrow['transactionid'];
	$transactiondate=$arrow['transactiondate'];
	$customerid=$arrow['customerid'];
	$payeeid=$arrow['payeeid'];
	$receiveid=$arrow['receiveid'];
    $amount=$arrow['amount'];
	$paymentstat=$arrow['paymentstat'];
}

?>

<div id="templatemo_main">
  <p class="main_top">&nbsp;</p>
  <form id="form2" name="form2" method="post" action="">
    <blockquote>
      <table width="519" height="242" border="1">
        <tr>
          <td width="224" height="32" scope="col"><strong>
          	<label for="transactionid">&nbsp; Transaction ID</label>
          </strong></td>
          <td width="285"><?php echo $transactionid; ?></th>
        </tr>
        <tr>
          <td><strong>
            <label for="transactiondate">&nbsp; Transaction Date</label>
          </strong></td>
          <td>&nbsp;<?php echo $transactiondate; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="customerid">&nbsp; Customer ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $customerid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="payeeid">&nbsp; Payee ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $payeeid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="receiveid">&nbsp; Receive ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $receiveid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="amount">&nbsp; Amount</label>
          </strong></td>
          <td>&nbsp;<?php echo $amount; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="paymentstat">&nbsp; Payment Status</label>
          </strong></td>
          <td>&nbsp;<?php echo $paymentstat; ?></td>
        </tr>
      </table>

    </blockquote>
    <p>&nbsp;</p>
  </form>

  <div id="templatemo_content"></div>
  <strong><!-- end of content -->
            
    </strong>
  <div class="cleaner"></div>
  </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>