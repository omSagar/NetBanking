<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<script type="text/javascript">
function valid()
{
	if(document.form1.ifsccode.value=="")
	{
		alert("Invalid ifsccode");
		return false;
	}
	if(document.form1.branchname.value=="")
	{
		alert("Invalid branchname");
		return false;
	}
	
     if(document.form1.city.value=="")
	  {
		alert("Invalid city");
		return false;
	  }
	  (document.form1.branchaddress.value=="")
	{
		alert("Invalid branchaddress");
		return false;
	}
	(document.form1.country.value=="")
	{
		alert("Invalid country");
		return false;
	}
	(document.form1.state.value=="")
	{
		alert("Invalid state");
		return false;
	}
}

  function isNumberKey(evt)
      {

         var charCode = (evt.which) ? evt.which : event.keyCode
		//alert(charCode);
         if (charCode > 65 && charCode < 91 )
      	 {              
		 return true;
	 }
	 else if (charCode > 96 && charCode < 122 )
      	 {
		 return true;
	 }
	 else
	 {
                             alert("should be alphabet");
	  	return false;
	 }
     }
</script>
<?php
$m=date("Y-m-d");
if(isset($_POST["addbranch"]))
{
$sql="INSERT INTO branch (ifsccode, branchname,city,branchaddress,	state,country)
VALUES
('$_POST[ifsccode]','$_POST[branchname]','$_POST[city]','$_POST[branchaddress]','$_POST[country]','$_POST[state]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
}
?>
<div id="templatemo_main"><span class="main_top"></span>
	<h2>Add New Branch</h2>
  <div id="templatemo_content">
   <?php include("topmenu.php"); ?>
         <p>
    <label for="ifsccode"></label>
         <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
      <table width="739" border="0">
        <tr>
          <th height="36" scope="row" align="left">IFSC Code </th>
          <td><input type="text" name="ifsccode" id="ifsccode" /></td>
        </tr>
        <tr>
          <th height="38" scope="row" align="left">Branch Name</th>
          <td><input type="text" name="branchname" id="branchname"   onKeyPress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <th height="32" scope="row" align="left">City</th>
          <td><input type="text" name="city" id="city"  onKeyPress="return isNumberKey(event)"/></td>
        </tr>
        <tr>
          <th height="97" scope="row" align="left">Branch Address</th>
          <td><textarea name="branchaddress" id="branchaddress" cols="45" rows="5" onKeyPress="return isNumberKey(event)"></textarea></td>
        </tr>
        <tr>
          <th height="39" scope="row" align="left">Country</th>
          <td><select name="country" id="country">
            <option value="Canada">Canada</option>
          </select></td>
        </tr>
        <tr>
          <th height="37" scope="row" align="left">State</th>
          <td><select name="state" id="state">
    		<option value="">Select</option>
    		<option value="Alberta">Alberta</option>
    		<option value="British Columbia">British Columbia</option>
    		<option value="Manitoba">Manitoba</option>
    		<option value="New Brunswick">New Brunswick</option>
    		<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
    		<option value="Nova Scotia">Nova Scotia</option>
    		<option value="Ontario">Ontario</option>
    		<option value="Prince Edward Island">Prince Edward Island</option>
    		<option value="Quebec">Quebec</option>
    		<option value="Saskatchewan">Saskatchewan</option>
    		</select></td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td><input type="submit" name="addbranch" id="addbranch" value="Add" /></td>
        </tr>
      </table>

    </form>
  
</div><!-- end of content -->
            
            
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>