<?php
session_start();
?>

<script>
function validateForm()
{
var x=document.forms["form1"]["trpass"].value;
var y=document.forms["form1"]["password"].value;

if (x==null || x=="")
  {
  alert("User id must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Password must be filled out");
  return false;
  }
}
</script>
<?php
include("header.php");
include("dbconnection.php");



$result = mysql_query("select * from loan WHERE customerid='$_SESSION[customerid]'");

$dt = date("Y-m-d h:i:s");
if(isset($_POST["pay2"]))
{
	
$sql="INSERT INTO loanpayment
(loanid,customerid,paidamt,interestamt,principleamt,date)
VALUES
('$_POST[paytoo]','$_SESSION[customerid]','$_POST[amt]','$_POST[interest]','$_POST[loanamt]','$dt')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  if(mysql_affected_rows() == 1)
  {
	$successresult = "Transaction successfull";
	header("Location: makeloanpayment3.php");
  }
  else
  {
	  $successresult = "Failed to transfer";
  }
}

$acc= mysql_query("select * from accounts where customerid='$_SESSION[customerid]'");

?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
            <?php
			if(isset($_POST['pay']))
			{
			$result1 = mysql_query("select * from loan WHERE loanid='$_POST[payto]'");
			$arrpayment = mysql_fetch_array($result1);
				?>
     	<h2>&nbsp;Make paymt to <?php echo $arrpayment['loantype'] ." : ".$arrpayment['loanid']; ?></h2>
              <table width="580" height="220" border="1">
                <tr>
                  <td width="203"><strong>Loan account information</strong></td>
                  <td width="361">
				  <?php	
				  		$result3 = mysql_query("select * from loantype WHERE loantype='$arrpayment[loantype]'");
			$arrpayment3 = mysql_fetch_array($result3);	 
				echo "<b>&nbsp;Loan No. : </b>".$arrpayment['loanid'];
		
				echo "<br><b>&nbsp;Loan type. : </b>".  $arrpayment3['loantype'] ." : ". $arrpayment3['prefix'] ;
				
				echo "<br><b>&nbsp;Loan amount : </b>".$arrpayment['loanamt'];
				echo "<br><b>&nbsp;Interest : </b>".$arrpayment['interest']. "%";
				echo "<br><b>&nbsp;Created at : </b>".$arrpayment['startdate'];
	
                  ?>
                <input type="hidden" name="paytoo" value="<?php echo $arrpayment['loanid']; ?>"  />
                <input type="hidden" name="amt" value="<?php echo $_POST['pay_amt']; ?>"  />
                <input type="hidden" name="payeeid" value="<?php echo $_POST['ac_no']; ?>"  />
                <input type="hidden" name="loanamt" value="<?php echo $arrpayment['loanamt']; ?>"  />
                <input type="hidden" name="interest" value="<?php echo $arrpayment['interest']. "%"; ?>"  />
				  </td>
                </tr>
                <tr>
                  <td><strong>Loan amount</strong></td>
                  <td>&nbsp;<?php echo number_format($_POST['pay_amt'],2); ?></td>
                </tr>
                <tr>
                  <td><strong>Debit account number</strong></td>
                  <td>&nbsp;<?php echo $_POST['ac_no']; ?></td>
                </tr>
                <tr>
                  <td><strong>Enter Transaction Password</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" /></td>
                </tr>
                <tr>
                  <td><strong>Confirm Password</strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                    <input name="button" type="button" onclick="<?php echo "window.location.href='payloans.php'"; ?>" value="Cancel" alt="Pay Now" />
                  </div></td>
                </tr>
              </table>
              
              <?php
			}
			?>
         
   	      </form>
<div class="cleaner_h50"></div>
        </div><!-- end of content -->
            
            <div id="templatemo_sidebar">
            
                <?php
				include("custsidebar.php");
				payloans();
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