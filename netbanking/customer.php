<?php
session_start();
include("header.php");
include("dbconnection.php");

$succres = "";

?>
 <script language="javascript">

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

<script type="text/javascript">
function valid()
{
	if(document.form1.brname.value=="")
	{
		alert("INVALID BRANCH NAME");
		return false;
	}
	if(document.form1.firstname.value=="")
	{
		alert("INVALID FIRST NAME");
		return false;
	}
	if(document.form1.lastname.value=="")
	{
		alert("INVALID LAST NAME");
		return false;
	}
	if(document.form1.loginid.value=="")
	{
		alert("INVALID LOGIN ID");
		return false;
	}
	if(document.form1.accountpassword.value=="")
	{
		alert("INVALID ACCOUNT PASSWORD");
		return false;
	}
	if(document.form1.confirmpassword.value=="")
	{
		alert("INVALID CONFIRM PASSWORD");
		return false;
	}
	if(document.form1.transactionpassword.value=="")
	{
		alert("INVALID TRANSACTION PASSWORD");
		return false;
	}
	if(document.form1.accstatus.value=="")
	{
		alert("INVALID ACCOUNT STATUS");
		return false;
	}
	if(document.form1.country.value=="")
	{
		alert("INVALID COUNTRY");
		return false;
	}
	if(document.form1.state.value=="")
	{
		alert("INVALID STATE");
		return false;
	}
	if(document.form1.city.value=="")
	{
		alert("INVALID CITY");
		return false;
	}
}
</script>
<?php
$m=date("Y-m-d");
if(isset($_POST["button"]))
{
$sql="INSERT INTO customers (ifsccode, firstname, lastname,loginid,accpassword,transpasword,accstatus,country,state,city,accopendate)
VALUES
('$_POST[brname]','$_POST[firstname]','$_POST[lastname]','$_POST[loginid]','$_POST[accountpassword]','$_POST[transactionpassword]','$_POST[accountstatus]','$_POST[country]','$_POST[state]','$_POST[city]','$m')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
 $succres ="Customer Record Added Successfully.....";
}
$resq = mysql_query("select * from branch");
?>
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
  
<form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
    <p>&nbsp;<?php echo $succres; ?></p>
    <p> 
    	<label for="brname" align="left">Branch Name
      <select name="brname" id="brname">
        <?php
	  while($rta = mysql_fetch_array($resq) )
	  {
		  echo "<option value='$rta[ifsccode]'>$rta[branchname]</value>";
	  }
	  ?>
      </select>
    </p>
    <p> 
      <label for="firstname" align="left">First Name</label>
      <input type="text" name="firstname" onKeyPress="return isNumberKey(event)" id="firstname" />
    </p>
    <p> 
      <label for="lastname"  >Last Name</label>
      <input type="text" name="lastname" onKeyPress="return isNumberKey(event)" id="lastname" />
  </p>
<p>  
  <label for="loginid" align="left">Login ID</label>
  <input type="text" name="loginid" id="loginid" />
</p>
<p>
  <label for="accountpassword" align="left">Account Password</label>
  <input type="password" name="accountpassword" id="accountpassword" />
</p>
  <p>
    <label for="confirmpassword" align="left">Confirm Password</label>
    <input type="password" name="confirmpassword" id="confirmpassword" />
  </p>
  <p>
    <label for="transactionpassword" align="left">Transaction Password</label>
    <input type="password" name="transactionpassword" id="transactionpassword" />
  </p>
  <p>
    <label for="textfield" align="left">Account Status</label>
    <select name="accstatus" id="accstatus">
    <option value="">Select</option>
      <option value="active">ACTIVE</option>
      <option value="inactive">INACTIVE</option>
    </select>
</p>
  <p>
    <label for="textfield" align="left">Country</label>
    <select name="country" id="country">
    <option value="">Select</option>
      <option value="Canada">Canada</option>
    </select>
  </p>
  <p>
    <label for="textfield" align="left">State</label>
    <select name="state" id="state">
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
    </select>
  </p>
  <p>
    <label for="city" align="left">City</label>
    <input type="text" name="city" id="city" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Add"   class="submit_btn float_r"/>
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp; </p>
  </div><!-- end of content -->

  <div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>