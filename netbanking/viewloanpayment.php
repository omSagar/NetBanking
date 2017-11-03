<?php
include("header.php");
include("dbconnection.php");
$loantypearray = mysql_query("select * from loanpayment");
?>		
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
    <table width="901" border="1">
      <tr>
        <th width="105" scope="col">Payment ID</th>
        <th width="93" scope="col">Date</th>
        <th width="101" scope="col">Paid Amount</th>
        <th width="144" scope="col">Total Amount</th>
        <th width="188" scope="col">Interest</th>
      </tr>
      <?php	
 while($loantype = mysql_fetch_array($loantypearray))
	  {
echo "
      <tr>
        <td>&nbsp;$loantype[paymentid]</td>
        <td>&nbsp;$loantype[date]</td>
        <td>&nbsp;$loantype[paidamt]</td>
        <td>&nbsp;$loantype[principleamt]</td>
        <td>&nbsp;$loantype[interestamt]</td>
        
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