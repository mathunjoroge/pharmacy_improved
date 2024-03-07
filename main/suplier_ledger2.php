<?php 
require_once('auth.php');
$supplier=$_GET['cname'];
function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
?><html><head>
<title>
supplier Ledger
</title>
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />

</head>
<body style="text-transform:capitalize;">

<?php include('navfixed.php');?>
	
	
	
	<div class="container">
      
	<div class="contentheader">
			<i class="icon-list"></i> Supplier Legder
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Supplier Legder</li>
			</ul>

<div id="maintable">
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="statementslist.php"><button class="btn btn-success btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
<?php
include('../connect.php');
$resulta = $db->prepare("SELECT * FROM supliers WHERE suplier_name= :a");
$resulta->bindParam(':a', $supplier);
$resulta->execute();
for($i=0; $rowa = $resulta->fetch(); $i++){
$name=$rowa['suplier_name'];

}
$resultas = $db->prepare("SELECT * FROM supliers WHERE suplier_name= :b");
$resultas->bindParam(':b', $name);
$resultas->execute();
for($i=0; $rowas = $resultas->fetch(); $i++){
echo 'Name : '.$rowas['suplier_name'].'<br>';
echo 'Address : '.$rowas['suplier_address'].'<br>';
echo 'Contact person: '.$rowas['suplier_contact'].'<br>';
echo 'Contact  '.$rowas['contact_person'].'<br>';
}
?>
	<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	
			<tr>
			<th colspan="1" style="border-top:1px solid #999999"> Total credit purcheases: </th>
			<th colspan="1" style="border-top:1px solid #999999">  
				 
			<?php
				$c='credit';
				
				$results = $db->prepare("SELECT sum(amount) FROM purchases2 WHERE type LIKE '%".$c."%' AND name LIKE '%".$supplier."%'");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$salec=$rows['sum(amount)'];
				echo formatMoney($salec, true);
				}
				?>
			</th>

		</tr>
	</table>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
		<tr>
			 <caption>Payment history</caption>
			<th> date </th>
			
			<th> amount </th>
			
		</tr>
	
	<tbody>
			
			<?php
			$result = $db->prepare("SELECT * FROM payments WHERE name= :userid");
				$result->bindParam(':userid', $supplier);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date2']; ?></td>
			<td><?php echo $row['amount2']; ?></td>
			
			</tr>

			<?php
				}
			?>
			<tr>
			<th colspan="1" style="border-top:1px solid #999999"> Total payments: </th>
			<th colspan="1" style="border-top:1px solid #999999">  
				 
			<?php
								
				$results = $db->prepare("SELECT sum(amount2) FROM payments WHERE name LIKE '%".$supplier."%' ORDER BY `date2`");
				
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$payments=$rows['sum(amount2)'];
				echo formatMoney($payments, true);
				}
				?>
			</th>

		</tr>
		
			<?php
				
			?>
			<tr>
			<th colspan="1" style="border-top:1px solid #999999"> balance: </th>
			<th colspan="1" style="border-top:1px solid #999999">  
				 
			<?php
				
				echo  formatMoney($salec-$payments, true);;
				
				?>
			</th>

		</tr>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</body>
<?php include('footer.php');?>


</html>