<?php
session_start();
include("header.php");
include("dbconnection.php");

$loan=mysql_query("select * from loan where customerid='$_SESSION[customerid]'");
?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<h2>Loan Accounts</h2>

        	<form id="form1" name="form1" method="post" action="">

        	  <table width="575" border="1">
                <tr>
                  <td width="35" height="42"><strong>Loan No.</strong></td>
                  <td width="57"><strong>Loan Type</strong></td>
                  <td width="58"><strong>Account Holder</strong></td>
                  <td width="58"><strong>Loan Amount</strong></td>
                  <td width="61"><strong>Interest</strong></td>
                  <td width="41"><strong>Created Date</strong></td>
                </tr>					
                 <?php
				  $i=1;
			  while($arrvar = mysql_fetch_array($loan))
			  {
				  $loan1=mysql_query("select * from loantype where loantype='$arrvar[loantype]'");
				$arrvar1 = mysql_fetch_array($loan1);
        	   echo " <tr>
        	      <td height='30'>$arrvar[loanid] </td>
        	      <td>$arrvar1[loantype]</td>
				  <td>$_SESSION[customername]</td>
				   <td>$arrvar[loanamt]</td>
        	      <td>$arrvar[interest] %</td>
				  <td>$arrvar[startdate]</td>

      	      </tr>";
				$i++;
			  }
			  ?>
              </table>
          
       	  </form>
<div class="cleaner_h50"></div>
        </div><!-- end of content -->
            
            <div id="templatemo_sidebar">
     <?php
	 include("custsidebar.php");
	 payloans();
	 ?> 
</div>
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
include("footer.php");
?>