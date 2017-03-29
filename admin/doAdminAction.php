<?php
require_once '../include.php';
checkLogined();
$act=$_REQUEST['act'];
$id=$_REQUEST['id'];
if($act=="logout"){
	logout();
}elseif($act=="addAdmin"){
	$mes=addAdmin();
}elseif($act=="editAdmin"){
	$mes=editAdmin($id);
}elseif($act=="delAdmin"){
	$mes=delAdmin($id);
}elseif($act=="addNav"){
	$mes=addNav();
}elseif($act=="editNav"){
	$where="id={$id}";
	$mes=editNav($where);
}elseif($act=="delNav"){
    $mes=delNav($id);
}elseif($act=="addMes"){
	$mes=addMes();
}elseif($act=="editMes"){
	$mes=editMes($id);
}elseif($act=="delMes"){
	$mes=delMes($id);
}elseif($act=="addUser"){
	$mes=addUser();
}elseif($act=="delUser"){
		$mes=delUser($id);
}elseif($act=="editUser"){
	$mes=editUser($id);
}elseif($act=="waterText"){
	$mes=doWaterText($id);
}elseif($act=="waterPic"){
	$mes=doWaterPic($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
	if($mes){
		echo $mes;
	}
?>
</body>
</html>