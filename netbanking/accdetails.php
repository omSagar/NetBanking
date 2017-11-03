<?php
session_start();
include("header.php");
include("dbconnection.php");
$results = mysql_query("SELECT * FROM accounts where customerid='$_SESSION[customerid]'");
while($arrow = mysql_fetch_array($results))
{
	$acno = $arrow['accno'];	
	$arrow['customerid'];
	$status = $arrow['accstatus'];	
	$primaryacc = $arrow['primaryacc'];	
	$accopen = $arrow['accopendate'];	
	$acctype = $arrow['accounttype'];	
	$accbal = $arrow['accountbalance'];	
	$unclearbalance = $arrow['unclearbalance'];	
	$accruedinterest = $arrow['accuredinterest'];
}
?>
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
     		 <h2>Accounts Details</h2>
     		 <table width="560" border="1">
     		   <tr>
     		     <th colspan="2" scope="col">Account Details - <?php echo $_SESSION['customername'] ?></th>
   		     </tr>
     		   <tr>
     		     <td width="282" height="38">Account Number</td>
     		     <td width="262">&nbsp;<?php echo $acno ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="36">Account Type</td>
     		     <td>&nbsp;<?php echo $acctype ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="37">Account Status</td>
     		     <td>&nbsp;<?php echo $status ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="38">Primary Account</td>
     		     <td>&nbsp;<?php echo $primaryacc; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">Account Holder</td>
     		     <td>&nbsp;<?php echo $_SESSION['customername'] ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">Account Open Date</td>
     		     <td>&nbsp;<?php echo $accopen ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="39">Account Balance</td>
     		     <td>&nbsp;<?php echo $accbal ; ?></td>
   		     </tr>
   		   </table>
     	
        
        <div class="cleaner_h30"></div>
  <div class="cleaner_h60"></div>
</div><!-- end of content -->
            
            <div id="templatemo_sidebar">
            
       <?php
	   include("myaccountssidebar.php");
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