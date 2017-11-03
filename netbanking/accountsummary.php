<?php
session_start();
include("header.php");
include("dbconnection.php");
$results = mysql_query("SELECT * FROM accounts WHERE  customerid='$_SESSION[customerid]'");
?>
<div id="templatemo_main"><span class="main_top"></span> 
     	
<div id="templatemo_content">
	  <h2>Accounts Summary</h2>
     		 <table width="616" border="1">
     		 	<tr>
     		     <th colspan="6" scope="col">Accounts Summary - <?php echo $_SESSION['customername'] ?></th>
   		     </tr>
     		   <tr>
     		     <th scope="col">Acc. Type</th>
     		     <th scope="col">Name</th>
     		     <th scope="col">Account Number</th>
     		     <th scope="col">Branch</th>
     		     <th scope="col">Currency</th>
     		     <th scope="col">A/C Balance</th>
   		     </tr> 
             <?php
			 while($arrow = mysql_fetch_array($results))
			{
				echo "<tr><td>$arrow[accounttype]</td>
     		     <td>$_SESSION[customername]</td>
     		     <td>$arrow[accno]</td>
     		     <td>$_SESSION[ifsccode]</td>
     		     <td>CAD</td>
     		     <td>$arrow[accountbalance]</td></tr>";
			}
		   ?>
     		 </table> <p>&nbsp;</p>
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