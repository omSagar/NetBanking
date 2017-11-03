<?php
session_start();
include("header.php");
include("dbconnection.php");
$results = mysql_query("SELECT * FROM employees where empid='$_SESSION[empid]'");
while($arrow = mysql_fetch_array($results))
{	
	
	$empid = $arrow['empid'];	
	$employee_name = $arrow['employee_name'];	
	$loginid = $arrow['loginid'];	
	$emailid = $arrow['emailid'];	
	$contactno = $arrow['contactno'];	
}
?>
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
     		 <h2>Employee Profile</h2>
     		 <table width="560" border="1">
     		   
     		   <tr>
     		     <td width="282" height="38">Employee Number</td>
     		     <td width="262">&nbsp;<?php echo $empid ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="36">Name</td>
     		     <td>&nbsp;<?php echo $employee_name ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="37">Login ID</td>
     		     <td>&nbsp;<?php echo $loginid ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="38">Email ID</td>
     		     <td>&nbsp;<?php echo $emailid; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">Contect No.</td>
     		     <td>&nbsp;<?php echo $contactno ; ?></td>
   		     </tr>
   		   </table>
     	
        
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