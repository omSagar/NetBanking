<?php
session_start();
include("header.php");
include("dbconnection.php");



$accno = "";
	
if(isset($_POST['accno'])){
	$accno = $_POST['accno'];
}
	
$query = sprintf("select * from accounts where accno='%s'",
    mysql_real_escape_string($accno));

$acc = mysql_query($query);

$Accountnumber = "";
$Accountbalance = "";

while($rows = mysql_fetch_array($acc))
{
	$Accountnumber = $rows["accno"];
	$Accountbalance= $rows["accountbalance"];
}
$result = mysql_query("select * from accounts WHERE customerid='$_SESSION[customerid]'");

$result1 = mysql_query("select * from transaction WHERE customerid='$_SESSION[customerid]'");

?>
<div id="templatemo_main"><span class="main_top"></span> 
     	
<div id="templatemo_content">

<?php
if(isset($_POST['submit']))
{
?>
    	<h2>Mini Statements</h2>

        	<form id="form1" name="form1" method="post" action="">
        	  <table width="561" border="1">
        	    <tr>
        	      <th colspan="2" scope="col">Balance Details <?php echo $_SESSION['customername']; ?>
                  [Details on <?php echo date("d-m-Y");?>]</th>
       	        </tr>
        	    <tr>
        	      <td width="275"><strong>Account Number</strong></td>
        	      <td width="270"><?php echo $Accountnumber;?>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td><strong>Account Balance</strong></td>
        	      <td><?php echo $Accountbalance; ?>&nbsp;</td>
      	      </tr>
              
      	    </table>
        	  <br />
        	  <table width="558" border="1">
  <tr>
    <th colspan="5" scope="col">Transaction Made</th>
    </tr>
  <tr bgcolor="#CCCCCC">
    <td><strong>Trasanction No.</strong></td>
    <td><strong>Date</strong></td>
    <td><strong>Paying ID</strong></td>
    <td><strong>Receiving ID</strong></td>
    <td><strong>Amount</strong></td>
    <td><strong>Status</strong></td>
  </tr>
   <?php
			  while($arrvar = mysql_fetch_array($result1))
			  {
			  	
				$transactionid = "";
				$transactiondate = "";
				$payeeid = "";
				$receiveid = "";
				$amount = "";
				$status = "";
				if(isset($arrvar["transactionid"]))
				{ $transactionid = $arrvar["transactionid"]; }
				
				if(isset($arrvar["transactiondate"]))
				{ $transactiondate = $arrvar["transactiondate"]; }
				
				if(isset($arrvar["payeeid"]))
				{ $payeeid = $arrvar["payeeid"]; }
				
				if(isset($arrvar["receiveid"]))
				{ $receiveid = $arrvar["receiveid"]; }
				
				if(isset($arrvar["amount"]))
				{ $amount = $arrvar["amount"]; }
				
				if(isset($arrvar["status"]))
				{ $status = $arrvar["status"]; }
				
        	   echo " <tr>
        	      <td>$transactionid</td>
        	      <td>$transactiondate</td>
				  <td>$payeeid</td>
        	      <td>$receiveid</td>
				  <td>$amount</td>
				  <td>$status</td>
      	      </tr>";
			  }
			  ?>
</table>


       	  </form>
   <?php
}
else
{
	?>
           
           	<form id="form1" name="form1" method="POST" action="">
        	  <table width="520" height="127" border="0">
        	    <tr>
        	      <td height="41"> <strong>Select an Account Number</strong></td>
      	      </tr>
        	    <tr>
        	      <td valign="top">Account number  <label for="ac_no"></label>
        	        <select name="accno" id="accno">
        	            <?php
        	           while($arrvar = mysql_fetch_array($result))
					  	{
        		        echo "<option value='$arrvar[accno]'>$arrvar[accno]</option>";
               			}
					   ?>
                  </select>
       	          <input type="submit" name="submit" id="submit" value="Select account number" /></td>
      	      </tr>
      	    </table>
       	  </form>
           <?php
}
?>
     		 <p>&nbsp;</p>
     <p>&nbsp;</p>
        
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