<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<h2>Payments Details</h2>

        	<form id="form1" name="form1" method="post" action="">
        	  <table width="697" height="61" border="1">
        	    <tr>
        	      <td height="26" colspan="9"><strong><a href="transferfunds.php">&lt;&lt; Back</a></strong></td>
       	        </tr>
        	    <tr>
        	      <td width="32" height="27"><strong>Transaction No.</strong></td>
                  <td width="62"><strong>Date</strong></td>
                  <td width="62"><strong>Paying ID</strong></td>
                  <td width="62"><strong>Receiving ID</strong></td>
        	      <td width="51"><strong>Amount</strong></td>
            	  <td width="67"><strong>Status</strong></td>
            	  <td width="32"><strong></strong></td>
      	      </tr>
<?php
$rectrans=mysql_query("select * from transaction where paymentstat='$_GET[pst]' ORDER BY transactiondate DESC");
while($recs = mysql_fetch_array($rectrans))
{
		$transactionid = $recs['transactionid'];
		
		echo "<tr>
        	      <td>$transactionid</td>
        	      <td>$recs[transactiondate]</td>
        	      <td>$recs[payeeid]</td>
        	      <td>$recs[receiveid]</td>
        	      <td>$recs[amount]</td>
        	      <td>$recs[paymentstat]</td>
				<td><a href='Transactiondetails2.php?trid=$transactionid'>More</a></td>
      	      </tr>";


}
?>
      	    </table>
        	  <p>&nbsp;

<input type="button" value="Print Transaction detail" onClick="window.print()">
</p>
        	  <p>&nbsp;</p>
<p>&nbsp;</p>
        	  <p>&nbsp;</p>
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