<?php
session_start();
include("header.php");
include("dbconnection.php");
?> 
<script type="text/javascript">
function valid()
{
	if(document.form1.loantype.value=="")
	{
		alert("INVALID LOAN TYPE");
		return false;
	}
	if(document.form1.prefix.value=="")
	{
		alert("INVALID PREFIX");
		return false;
	}
	if(document.form1.maxamt.value=="")
	{
		alert("INVALID MAXIMUM AMOUNT");
		return false;
	}
	if(document.form1.minamt.value=="")
	{
		alert("INVALID MINIMUM AMOUNT");
		return false;
	}
	if(document.form1.interest.value=="")
	{
		alert("INVALID INTEREST");
		return false;
	}
	if(document.form1.status.value=="")
	{
		alert("INVALID STATUS");
		return false;
	}
	
}
</script>
<?php
$m=date("Y-m-d");
if(isset($_POST["add"]))
{
$sql="INSERT INTO loantype (loantype,prefix,maximumamt,minimumamt,interest,status)
VALUES
('$_POST[loantype]','$_POST[prefix]','$_POST[maxamt]','$_POST[minamt]','$_POST[interest]','$_POST[status]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
}
$sql2 = mysql_query("select * from loantype");
?>
<div id="templatemo_main"><span class="main_top"></span>
  <div id="templatemo_content">
  
<?php include("topmenu.php"); ?>
         <p>
    <label for="ifsccode"></label>
    <form onsubmit="return valid()" id="form1" name="form1" method="post" action="">
      <p>
        <label for="loantype">Loan Type</label>
        <input type="text" name="loantype" id="loantype" />
      </p>
      <p>
        <label for="prefix">Prefix</label>
        <input type="text" name="prefix" id="prefix" />
      </p>
      <p>Maximum Amount
        <label for="maxamt"></label>
        <input type="text" name="maxamt" id="maxamt" />
      </p>
      <p>Minimum Amount
        <label for="minamt"></label>
        <input type="text" name="minamt" id="minamt" />
      </p>
      <p>Interest
        <label for="interest"></label>
        <input type="text" name="interest" id="interest" />
      </p>
      <p>Account Status
    <label for="textfield"></label>
    <select name="accstatus" id="accstatus">
    <option value="">Select</option>
      <option value="ACTIVE">ACTIVE</option>
      <option value="INACTIVE">INACTIVE</option>
    </select>
  </p>
      <p>
        <input type="submit" name="add" id="add" value="Add" />
      </p>
    </form>
    <table width="758" border="1">
      <tr>
        <th width="120" scope="col">Loan Type</th>
        <th width="101" scope="col">Prefix</th>
        <th width="188" scope="col">Maximum Amount</th>
        <th width="162" scope="col">Minimum Amount</th>
        <th width="79" scope="col">Interest</th>
        <th width="68" scope="col">Status</th>
      </tr>
      <?php
       while($arrayvar = mysql_fetch_array($sql2))
	  {
     echo " <tr>
        <td>&nbsp;$arrayvar[loantype]</td>
        <td>&nbsp;$arrayvar[prefix]</td>
        <td>&nbsp;$arrayvar[maximumamt]</td>
        <td>&nbsp;$arrayvar[minimumamt]</td>
        <td>&nbsp;$arrayvar[interest]</td>
        <td>&nbsp;$arrayvar[status]</td>
      </tr>
	  ";
	  }	
      ?>
     
    </table>
    <p>&nbsp;</p>
<p>&nbsp; </p>
</div><!-- end of content -->
            
            <div id="templatemo_sidebar">
                                                         
            
            </div>
                
		<div class="cleaner"></div>
     </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>