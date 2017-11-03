<?php
//session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bank Of Canada</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
</head>
<body>

<div id="templatemo_wrapper">

    <div id="templatemo_header">
        <div id="site_title">
        
            <h1><a href="index.php"><img src="images/banking.png" alt="logo" width="222" height="31" /><span>Bank Of Canada</span></a></h1>
            
        </div> <!-- end of site_title -->
    </div> <!-- end of header -->
    
  <div id="templatemo_menu">
    <?php
	if(isset($_SESSION["empid"]))
	{
	?>
        <ul>
            <li><a href="employeealerts.php">Dashboard</a></li>
            <li><a href="viewbranch.php">Activities</a></li>
            <li><a href="viewcustomer.php">Customers</a></li>
            <li><a href="viewtransaction.php">Transactions</a></li>
            <li><a href="mailinbox.php">Mail</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul> 
        <?php
		}
		else if (isset($_SESSION["customerid"]))
		{
		?>
        <ul>
            <li><a href="customeralerts.php">My Accounts</a></li>
            <li><a href="transferfunds.php">Transfer Funds</a></li>
            <li><a href="payloans.php">Pay Loans</a></li>
            <li><a href="mailinbox.php">Mails</a></li>
            <li><a href="personalise.php">Personalise</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <?php
		}
		else
		{
		?>
             <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
        <?php
		}
		?>
    </div> <!-- end of templatemo_menu -->