<?php
// require 'core/config.php';

switch ($_GET['hit']) {
	case 'sudah':
	$db->go("SELECT * FROM data_peserta WHERE status='1' OR status='2'");

	$row = $db->numRows();
	$temp = array("total"=>$row);
	break;
	
	case 'belum':
	$db->go("SELECT * FROM data_peserta WHERE status='0'");
	$row = $db->numRows();
	$temp = array("total"=>$row);
	break;

	case 'tidaksesuai':
	$db->go("SELECT * FROM data_peserta WHERE status='2'");
	$row = $db->numRows();
	$temp = array("total"=>$row);
	break;

	case 'total':
	$db->go("SELECT * FROM data_peserta");
	$row = $db->numRows();
	$temp = array("total"=>$row);
	break;

	default:
	$temp = array("total"=>"success");
	break;
}
$data=json_encode($temp);
echo $data;
?>