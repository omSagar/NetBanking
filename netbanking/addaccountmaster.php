<?php
session_start();
include("header.php");
include("dbconnection.php");
?>
<script type="text/javascript">
function valid()
{
	if(document.form1.acctype.value=="")
	{
		alert("INVALID ACCOUNT TYPE");
		return false;
	}
	if(document.form1.prefix.value=="")
	{
		alert("INVALID PREFIX");
		return false;
	}
	if(document.form1.minbalance.value=="")
	{
		alert("INVALID MINIMUMBALANCE");
		return false;
	}
	if(document.form1.interest.value=="")
	{
		alert("INVALID INTERST");
		return false;
	}
}
</script>
<?php
$m=date("Y-m-d");
if(isset($_POST["add"]))
{
$sql="INSERT INTO accountmaster (accounttype,prefix,minbalance,interest)
VALUES
('$_POST[acctype]','$_POST[prefix]','$_POST[minbalance]','$_POST[interest]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
}
$sql1 = mysql_query("select * from accountmaster");
?>
<div id="templatemo_main"><span class="main_top"></span>
	<h2>Account Type Details</h2>
  <div id="templatemo_content">
    <table width="883" border="1">
      <tr>
        <th width="113" scope="col"><a href="viewbranch.php">Branch</a></th>
        <th width="133" scope="col"><a href="addaccountmaster.php">Account Type</a></th>
        <th width="87" scope="col"><a href="viewemp.php">Employees</a></th>
        <th width="162" scope="col"><a href="viewloantype.php">Loan Type</a></th>
      </tr>
    </table>
    <p>
    <label for="ifsccode"></label>
    <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
      <table width="507" height="179" border="0">
        <tr>
          <th scope="row" align="left">Account Type</th>
          <td><input type="text" name="acctype" id="acctype" /></td>
        </tr>
        <tr>
          <th scope="row" align="left">Prefix</th>
          <td><input type="text" name="prefix" id="prefix" /></td>
        </tr>
        <tr>
          <th scope="row" align="left">Minimum Balance</th>
          <td><input type="text" name="minbalance" id="minbalance" /></td>
        </tr>
        <tr>
          <th scope="row" align="left">Interest</th>
          <td><input type="text" name="interest" id="interest" /></td>
        </tr>
        <tr>
          <th colspan="2" scope="row">
          	<input type="submit" name="add" id="add" value="ADD" />
          </th>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
    <table width="500" border="1">
      <tr>
        <th scope="col">ACCOUNT TYPE</th>
        <th scope="col">PREFIX</th>
        <th scope="col">MINIMUM BALANCE</th>
        <th scope="col">INTEREST</th>
      </tr>			
     <?php
      while($arrayvar = mysql_fetch_array($sql1))
	  {
echo "	  <tr>
        <td>&nbsp; $arrayvar[accounttype] </td>
        <td>&nbsp; $arrayvar[prefix]</td>
        <td>&nbsp; $arrayvar[minbalance] </td>
        <td>&nbsp; $arrayvar[interest]</td>
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