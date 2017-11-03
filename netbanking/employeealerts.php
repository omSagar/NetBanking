<?php
session_start();
include("header.php");
include("dbconnection.php");
$dts = date("Y-m-d h:i:s");
mysql_query("UPDATE employees SET lastlogin='$dts' WHERE empid='$_SESSION[empid]'");
$sqlq = mysql_query("select * from transaction where paymentstat='Pending'");
$mailreq = mysql_query("select * from mail where reciverid='$_SESSION[loginid]'");
?>
<div id="templatemo_main"><span class="main_top"></span> 
     	
<div id="templatemo_content">
     		 <h2>Alerts and Messages</h2>
     		 <table width="548" border="1">
     		   <tr>
     		     <td width="293">Employee Name</td>
     		     <td width="245"><?php echo $_SESSION['employeename']; ?></td>
   		     </tr>
     		   <tr>
     		     <td>User logged On</td>
     		     <td><?php echo $_SESSION['lastlogin']; ?> </td>
   		     </tr>
     		   <tr>
     		     <td>Pending Payments</td>
     		     <td><?php echo mysql_num_rows($sqlq); ?></td>
   		     </tr>
     		   <tr>
     		     <td>Your Mails</td>
     		     <td><?php echo mysql_num_rows($mailreq); ?></td>
   		     </tr>
   		   </table>
     		 <p>&nbsp;</p>
     <p>&nbsp;</p>
        
        <div class="cleaner_h30"></div>
  <div class="cleaner_h60"></div>
</div><!-- end of content -->
            
            <div id="templatemo_sidebar">
            
            <?php
	   include("employeeaccountssidebar.php");
	   ?>
              <div class="cleaner_h40"></div>
    </div>
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>