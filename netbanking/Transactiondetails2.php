<?php
session_start();
include("header.php");
include("dbconnection.php");
$rectrans=mysql_query("select * from transaction where transactionid='$_GET[trid]'");
$recs = mysql_fetch_array($rectrans);

$rectransa=mysql_query("select * from registered_payee where payeeid='$recs[payeeid]'");
$recsa = mysql_fetch_array($rectransa);
?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<h2>Transaction Details</h2>
									
        	<form id="form1" name="form1" method="post" action="">
        	  <table width="677" border="1">
        	    <tr>
        	      <td height="32" colspan="2"><a href="Transactionmade.php?pst=Complete"><strong>&lt;&lt; Back</strong></a></td>
       	        </tr>
        	    <tr>
        	      <td width="289" height="32">Tansaction Number</td>
        	      <td width="346"><?php echo $recs['transactionid']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">Customer ID<br />
        	        <br /></td>
        	      <td><?php echo $recs['customerid']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">Credit account number</td>
        	      <td>&nbsp;<?php echo $recs['accountnumber']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">Payee name</td>
        	      <td>&nbsp;<?php echo $recsa['payeename']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">Account type</td>
        	      <td>&nbsp;<?php echo $recsa['accounttype']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">Bank name</td>
        	      <td>&nbsp;<?php echo $recsa['bankname']; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="31">IFSC Code</td>
        	      <td>&nbsp;<?php echo $recsa['ifsccode']; ?></td>
      	      </tr>
        	    
        	    
        	    <tr>
        	      <td height="32">Transaction date</td>
        	      <td><?php echo $recs['transactiondate']; ?></td>
      	      </tr>
    
        	    <tr>
        	      <td height="31">Transaction Amount</td>
        	      <td>&nbsp;<?php echo $recs['amount']; ?></td>
      	      </tr>
        	    
        	    
        	    <tr>
        	      <td height="31">Payment Status</td>
        	      <td><?php echo $recs['paymentstat']; ?></td>
      	      </tr>
       	    </table>
<form>
<input type="button" value="Print" onClick="window.print()">
</form>
       	  </form>
<div class="cleaner_h50"></div>
        </div><!-- end of content -->

       <div id="templatemo_sidebar">
          
              <div class="cleaner_h40"></div>
                
                <h2>&nbsp;</h2>
</div>
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
include("footer.php");
?>