<?php
session_start();
include("header.php");
include("dbconnection.php");
$result = mysql_query("select * from customers WHERE customerid='$_SESSION[customerid]'");
$rowrec = mysql_fetch_array($result);
?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<h2>Customer Profile</h2>


        	<form id="form1" name="form1" method="post" action="">
        	  <table width="523" border="1">
        	    <tr>
        	      <th width="199" scope="row" align="left">Customer ID</th>
        	      <td width="308">&nbsp;<?php echo $rowrec['customerid']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">IFSC Code</th>
        	      <td>&nbsp;<?php echo $rowrec['ifsccode']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">First Name</th>
        	      <td>&nbsp;<?php echo $rowrec['firstname']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">Last Name</th>
        	      <td>&nbsp;<?php echo $rowrec['lastname']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">Login ID</th>
        	      <td>&nbsp;<?php echo $rowrec['loginid']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">Account Status</th>
        	      <td>&nbsp;<?php echo $rowrec['accstatus']; ?></td>
      	 </tr>
          	    <tr>
        	      <th scope="row" align="left">City</th>
        	      <td>&nbsp;<?php echo $rowrec['city']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">State</th>
        	      <td>&nbsp;<?php echo $rowrec['state']; ?></td>
      	      </tr>
        	    <tr>
        	      <th scope="row" align="left">Country</th>
        	      <td>&nbsp;<?php echo $rowrec['country']; ?></td>
      	      </tr>
      	    </table>
        	
   	      </form>
          
    
<div class="cleaner_h50"></div>
        </div><!-- end of content -->
            
            <div id="templatemo_sidebar">
            
              <?php
			include("custsidebar.php");
            personalise();
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