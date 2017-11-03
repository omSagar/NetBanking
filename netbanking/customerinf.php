<?php
session_start();
include("header.php");
include("dbconnection.php");

$customerid = $_GET['custid'];

$results = mysql_query("SELECT * FROM customers where customerid='$customerid'");
while($arrow = mysql_fetch_array($results))
{
	$custname = $arrow['firstname'];
	$ifsccode=$arrow['ifsccode'];
	$loginid=$arrow['loginid'];
	$accstatus=$arrow['accstatus'];
	$city=$arrow['city'];
    $state=$arrow['state'];
	$country=$arrow['country'];
    $accopendate=$arrow['accopendate'];
    $lastlogin=$arrow['lastlogin'];
}
$resultsd = mysql_query("SELECT * FROM accounts where customerid='$customerid'");
mysql_num_rows($resultsd);
?>
<div id="templatemo_main">

  <p class="main_top">&nbsp;</p>
  <form id="form2" name="form2" method="post" action="">
    <blockquote>
      <table width="519" height="242" border="1">
        <tr>
          <td width="224" height="32" scope="col"><strong>
          	<label for="custname">&nbsp; Customer Name</label>
          </strong></td>
          <td width="285"><?php echo $custname; ?></th>
        </tr>
        <tr>
          <td><strong>
            <label for="branch">&nbsp; Branch</label>
          </strong></td>
          <td>&nbsp;<?php echo $ifsccode; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="loginid">&nbsp; Loging ID</label>
          </strong></td>
          <td>&nbsp;<?php echo $loginid; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accstatus">&nbsp; Account Status</label>
          </strong></td>
          <td>&nbsp;<?php echo $accstatus; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="city">&nbsp; City</label>
          </strong></td>
          <td>&nbsp;<?php echo $city; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="state">&nbsp; State</label>
          </strong></td>
          <td>&nbsp;<?php echo $state; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="country">&nbsp; Country</label>
          </strong></td>
          <td>&nbsp;<?php echo $country; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="accopendate">&nbsp; Account Open Date</label>
          </strong></td>
          <td>&nbsp;<?php echo $accopendate; ?></td>
        </tr>
        <tr>
          <td><strong>
          <label for="lastlogin">&nbsp; Last Login</label>
          </strong></td>
          <td>&nbsp;<?php echo $lastlogin; ?></td>
        </tr>
      </table>

    </blockquote>
    <table width="777" border="1">
      <tr>
        <th colspan="8" scope="col"><a href="account.php?custid=$customerid'">Add New Customer</a></th>
      </tr>
      <tr>
        <th colspan="8" scope="col"><strong>Customer Accounts</strong></th>
        </tr>
      <tr>
        <th width="91" scope="col"><strong>Account No</strong></th>
        <th width="67" scope="col"><strong>Status</strong></th>
        <th width="100" scope="col"><strong>Primary Account</strong></th>
        <th width="80" scope="col"><strong>Open Date</strong></th>
        <th width="81" scope="col"><strong>Account Type</strong></th>
        <th width="76" scope="col"><strong>Balance</strong></th>
        <th width="113" scope="col"><strong>Unclear Balance</strong></th>
        <th width="117" scope="col"><strong>Accured Interest</strong></th>
      </tr>
      <?php
	 while($arrow=mysql_fetch_array($resultsd))
	 {
	 ?>
        <tr>
        <td>&nbsp;<?php echo $arrow['accno'];?></td>
        <td>&nbsp;<?php echo $arrow['accstatus'];?></td>
        <td>&nbsp;<?php echo $arrow['primaryacc'];?></td>
        <td>&nbsp;<?php echo $arrow['accopendate'];?></td>
        <td>&nbsp;<?php echo $arrow['accounttype'];?></td>
        <td>&nbsp;<?php echo $arrow['accountbalance'];?></td>
        <td>&nbsp;<?php echo $arrow['unclearbalance'];?></td>
        <td>&nbsp;<?php echo $arrow['accuredinterest']; ?></td>
      </tr>
     <?php
     }
	 ?>
</table>
    <p>&nbsp;</p>
  </form>

  <div id="templatemo_content"></div>
  <strong><!-- end of content -->
            
    </strong>
  <div class="cleaner"></div>
  </div>     <!-- end of main -->
    <div id="templatemo_main_bottom"></div><!-- end of main -->
    
    <?php
	include("footer.php");
	?>