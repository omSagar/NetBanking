<?php
session_start();
include("header.php");
include("dbconnection.php");
$transactionarray = mysql_query("select * from transaction");
?>		
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
  	<h2>Transaction Details</h2>
    <table width="933" border="1">
      <tr>	
        <th width="120" scope="col">Transaction ID</th>
        <th width="112" scope="col">Transaction Date</th>
        <th width="60" scope="col">Customer ID</th>
        <th width="60" scope="col">Payee ID</th>
        <th width="95" scope="col">Receive ID</th>
        <th width="104" scope="col">Amount</th>
        <th width="128" scope="col"><p>Payment Status</p></th>
        <th width="128" scope="col"><p>Action</p></th>
      </tr>
      
      <?php	
 while($transaction = mysql_fetch_array($transactionarray))
	  {
	  	$action = "--";
	  	
		if($transaction['paymentstat']=="Pending"){
			//$action = "Clear";
			$action = "<a href='cleartransaction.php?trancid=$transaction[transactionid]'>Clear</a>";
		}
echo "
      <tr>
        <td>&nbsp;$transaction[transactionid]</td>
        <td>&nbsp;$transaction[transactiondate]</td>
        <td>&nbsp;$transaction[customerid]</td>
        <td>&nbsp;$transaction[payeeid]</td>
        <td>&nbsp;$transaction[receiveid]</td>
        <td>&nbsp;$transaction[amount]</td>
		<td>&nbsp;$transaction[paymentstat]</td>
		<td>&nbsp;$action</td>
		
		
      </tr>";
	  }
	  ?>
    </table>
</div><!-- end of content -->
            
            
                
		<div class="cleaner"></div>
  </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>