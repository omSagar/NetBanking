<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST["pay"])){
	$payto = $_POST["payto"];
	$payamt = $_POST["pay_amt"];
	$payacno= $_POST["ac_no"];
	$passerr = "";

	$result = mysql_query("select * from registered_payee WHERE payeeid='$payto'");
	//echo "abclkdsf sdfjknsdf sdf ".$payto;
	$arrpayment = mysql_fetch_array($result);
}


if(isset($_POST["pay2"])){
	
	$accountnumber= $_POST['accountnumber'];
	$payeeid = $_POST["payeeid"];
	$payeename = $_POST["payeename"];
	$receiveid = $_POST["receiveid"];
	$receivename = $_POST["receivename"];
	$amount = $_POST["amount"];
	
	$dt = date("Y-m-d h:i:s");

	$resultpass = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
	$arrpayment1 = mysql_fetch_array($resultpass);

	if($_POST['trpass'] == $arrpayment1['transpassword'])
	{
		mysql_query("UPDATE accounts SET unclearbalance = unclearbalance + $amount WHERE customerid = '$_SESSION[customerid]' and accno ='$accountnumber'");
		$sql="INSERT INTO transaction 
		(customerid,accountnumber,transactiondate,payeeid,payeename,receiveid,receivename,amount,paymentstat)
		VALUES
		('$_SESSION[customerid]','$accountnumber','$dt','$payeeid','$payeename','$receiveid','$receivename','$amount','Pending')";
		
				if (!mysql_query($sql,$con))
				  {
				  die('Error: ' . mysql_error());
				  }
				if(mysql_affected_rows() == 1)
				  {
					$successresult = "Transaction successfull";
					header("Location: Makepayment3.php");
				  }
				else
				  {
					  $successresult = "Failed to transfer";
				  }
	}
	else
	{
	$passerr = "<b>Invalid password entered...<br> Please re-enter transaction password</b>";
	$payto = $_POST['payeeid'];
	$payamt = $_POST['amount'];
	$payacno= $_POST['accountnumber'];
	
	$result = mysql_query("select * from registered_payee WHERE accountnumber='$payto'");

	$arrpayment = mysql_fetch_array($result);
	
	}		  
}


$acc= mysql_query("select * from accounts where customerid='$_SESSION[customerid]'");

?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<form id="form1" name="form1" method="post" action="Makepayment2.php">
  

      
     	<h2>&nbsp;Make Payment To <?php echo $arrpayment['payeename']; ?></h2>
              <table width="564" height="220" border="1">
                <?php
				if($passerr != "")
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
                <tr>
                  <td width="203"><strong>Pay To</strong></td>
                  <td width="322">
				  <?php
				echo "<b>&nbsp;Payee Name : </b>".$arrpayment['payeename'];
				echo "<br><b>&nbsp;Account No. : </b>".$arrpayment['accountnumber'];
				echo "<br><b>&nbsp;Account Type : </b>".$arrpayment['accounttype'];
				echo "<br><b>&nbsp;Bank Name : </b>".$arrpayment['bankname'];
				echo "<br><b>&nbsp;IFSC Code : </b>".$arrpayment['ifsccode'];
	
                  ?>
                  
					<input type="hidden" name="payeeid" value="<?php echo $arrpayment['payeeid']; ?>"  />
					<input type="hidden" name="payeename" value="<?php echo $arrpayment['payeename']; ?>"  />
					<input type="hidden" name="receiveid" value="<?php echo ''; ?>"  />
					<input type="hidden" name="receivename" value="<?php echo ''; ?>"  />
					<input type="hidden" name="amount" value="<?php echo $payamt; ?>"  />
					<input type="hidden" name="accountnumber" value="<?php echo $payacno; ?>"  />
				  </td>
                </tr>
                <tr>
                  <td><strong>Payment Amount</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
                </tr>
                <tr>
                  <td><strong>Your Account No.</strong></td>
                  <td>&nbsp;<?php echo $payacno; ?></td>
                </tr>
                <tr>
                  <td><strong>Transaction Password</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                    <input name="button" type="button" onclick="<?php echo "window.location.href='alerts.php'"; ?>" value="Cancel" alt="Pay Now" />
                  </div></td>
                </tr>
              </table>
  

<p>&nbsp;</p>
        	  <p>&nbsp;</p>
       	  </form>
<div class="cleaner_h50"></div>
        </div><!-- end of content -->
            
            <div id="templatemo_sidebar">
            
                <?php
				include("custsidebar.php");
				transferfunds();
				?>
              <div class="cleaner_h40"></div>
                
                <h2>&nbsp;</h2>
</div>
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
include("footer.php");
?>