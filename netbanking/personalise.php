<?php
session_start();
include("header.php");
include("dbconnection.php");
$result = mysql_query("select * from registered_payee WHERE customerid='$_SESSION[customerid]'");
?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
                
        	<h2>Update Personalise</h2>

        	<form id="form1" name="form1" method="post" action="">
        	  <p>Using this option, you can change your personal details.</p>
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