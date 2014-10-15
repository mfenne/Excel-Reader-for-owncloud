<?php
//Check for valid login 
OC_Util::checkLoggedIn();
OC_Util::checkAppEnabled('files_excel_reader');

//Collect vars
$user = OCP\USER::getUser();
OC_Filesystem::init( '/' . $user . '/' . '/' );
$dir=$_GET['dir'];
$filename=$_GET['filename'];
$filepath=$dir."/".$filename;
?>

<!-- CloseButton -->
<input type="image" title="Close" value="Close" onclick="parent.location.reload()" align="right" src="<?php echo OCP\Util::imagePath('files_excel_reader','close.png')?>"/>

<!-- Info -->
<?php echo '<center>'.$filename.'</center>'; ?>

<?php $absPath=OC_Filesystem::toTmpFile($filepath); ?>

<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader( $absPath );
?>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<?php echo $data->dump(true,true); ?>
</body>
</html>
