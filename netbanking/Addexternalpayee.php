<?php
session_start();
?>

<script>
function validateForm()
{
	var x	=	document.forms["form1"]["p_name"].value;
	var y	=	document.forms["form1"]["ac_no"].value;
	var z	=	document.forms["form1"]["code"].value;
  if (x==null || x=="")
  {
  alert("Payee name must be filled out");
  return false;
  }
  if (y==null || y=="")
  {
  alert("Account number must be filled out");
  return false;
  }
  if (z==null || z=="")
  {
  alert("Ifsc code must be filled out");
  return false;
  }
}
</script>
<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST["adda3"]))
{
	$sql="INSERT INTO registered_payee
	(customerid, payeename,accountnumber,accounttype,bankname,ifsccode)
	VALUES
	('$_SESSION[customerid]','$_POST[payeename3]','$_POST[accountnumber3]','$_POST[accounttype3]','$_POST[bankname3]','$_POST[ifsccode3]')";
	
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	$successresult = "Record Added Successfully";
}

if(isset($_POST["update3"]))
{ 					
	mysql_query("UPDATE registered_payee SET payeename='$_POST[payeename3]',accountnumber='$_POST[accountnumber3]',accounttype='$_POST[accounttype3]',bankname='$_POST[bankname3]',ifsccode='$_POST[ifsccode3]' WHERE payeeid='$_POST[payeeid3]'");
	$updt= mysql_affected_rows();
	if($updt==1)
	{
	$successresult="Record Updated Successfully";
	}	

}

if(isset($_POST["delete3"]))
{
	mysql_query("DELETE FROM registered_payee WHERE payeeid='$_POST[payeeid3]'");
	$updt= mysql_affected_rows();
	if($updt==1)
	{
	$successresult="Record Deleted Successfully";
	}	
}

if(isset($_POST["btncancel"]))
{
	unset($_GET["payeeid3"]);
}

$result = "";

if(isset($_GET["payeeid"]))        	
{
	$result = mysql_query("select * from registered_payee WHERE payeeid='$_GET[payeeid]'");
}else{
	$result = mysql_query("select * from registered_payee WHERE payeeid='0'");
}

$arrvar = mysql_fetch_array($result);

?>
    
    
     <div id="templatemo_main"><span class="main_top"></span> 
     	
        <div id="templatemo_content">
       	  <h2>External Payee Details</h2>
        <b></b><form id="form1" name="form1" method="post" action=""onsubmit="return validateForm()">
<?php
if(isset($_POST["adda3"]) || isset($_POST["update3"]))
{
	?>
        	
       	  <table width="519" height="198" border="1">
        	 
        	    <tr>
        	      <td colspan="2"><div align="center"><strong><?php echo $successresult; ?></strong></div></td>
       	        </tr>
        	    <tr>
        	      <td width="206" height="26"><strong>Payee Name</strong></td>
        	      <td width="222"><label>
                 
        	        <?php echo $_POST["payeename3"]; ?>
      	          </label></td>
      	      </tr>
        	    <tr>
        	      <td height="27"><strong>Bank Name</strong></td>
        	      <td><label>
                  <?php
				 echo  $_POST["bankname3"];
					?>        	         
      	      
      	          </label></td>
      	      </tr>
        	    <tr>
        	      <td height="29"><strong>Account Number</strong></td>
        	      <td><label>
        	        <?php echo $_POST["accountnumber3"]; ?>
      	          </label></td>
      	      </tr>
        	  
        	    <tr>
        	      <td height="26"><strong>Account Type</strong></td>
        	      <td> <?php echo $_POST["accounttype3"]; ?></td>
      	      </tr>
        	    <tr>
        	      <td height="26"><strong>IFSC Code</strong></td>
        	      <td>
        	    <?php echo $_POST["ifsccode3"]; ?>
      			</td>
      	      </tr>
      	      <tr>
      	      	<td colspan="2" align="center"><strong><a href="transferfunds.php">OK</a></strong></td>
      	      </tr>
       	      </table>
<?php
}
else if(isset($_POST["delete3"]))
{
?>	  <table width="519" height="89" border="1">
        	    <tr>
        	      <td width="428" height="83"><div align="center"><strong><?php echo $successresult; ?></strong></div></td>
      	      </tr>
      	    </table>
<?php
}
else
{
?>      
            
        	  <table width="519" height="344" border="1">
        	    <tr>
        	      <td colspan="2"><div align="center"><strong>External Payee Details</strong></div></td>
      	      </tr>
        	    <tr>
        	      <td width="206"><strong>Payee name</strong></td>
        	      <td width="222"><label>
        	        <input name="payeeid3" type="hidden" id="payeeid3" value="<?php echo $arrvar['payeeid']; ?>" />
        	        <input name="payeename3" type="text" id="payeename3" size="35" value="<?php echo $arrvar['payeename']; ?>" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>Bank name</strong></td>
        	      <td><label>
        
				  
				
        	        <select name="bankname3" id="bankname3">
        	          <option value="">Select Bank name</option>
					  <?php
					  $arr = array("Bank Of Canada","TD Bank","Scotia Bank","BMO","CIBC");
					foreach($arr as $value)
					{
						if($arrvar[bankname] == $value)
						{	
						echo "<option value='$value' selected>$value</option>";	
						}
						else
						{
						echo "<option value='$value'>$value</option>";	
						}
					}
					?>
      	          </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>Account number</strong></td>
        	      <td><label>
        	        <input name="accountnumber3" type="text" id="accountnumber3" size="35"  value="<?php echo $arrvar['accountnumber']; ?>" />
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td><strong>Account type</strong></td>
        	      <td>
                    <?php            
					$arr = array("CURRENT","DFD","SALARY","SAVING");
					echo "<select name='accounttype3' id='accounttype3'>";
						foreach($arr as $value) 
						{
							if($arrvar[accounttype] == $value)
							{	
							echo "<option value='$value' selected>$value</option>";
							}
							else
							{
							echo "<option value='$value'>$value</option>";	
							}
						}
					?>
      	        </select>
                </td>
      	      </tr>
        	    <tr>
        	      <td><strong>IFSC code</strong></td>
        	      <td><input name="ifsccode3" type="text" id="ifsccode3" size="35"  value="<?php echo $arrvar['ifsccode']; ?>"  /></td>
      	      </tr>
        	    <tr>
        	      <td height="54" colspan="2"><div align="center">
        	        <?php
if(isset($_GET["payeeid"]))        	
{
?>
        	        <input type="submit" name="update3" id="update3" value="Update" />
        	        <input type="submit" name="btncancel3" id="btncancel3" value="Cancel" />
        	        <input type="submit" name="delete3" id="delete3" value="Delete" />
        	        <?php
}
else
{
	?>
        	        <input type="submit" name="adda3" id="adda3" value="Add" />
        	        <?php
}
?>
      	        </div></td>
      	      </tr>
      	    </table>
<?php
}
?>
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