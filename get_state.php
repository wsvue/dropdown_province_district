<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["province_id"])) {
	$query ="SELECT * FROM amphur WHERE PROVINCE_ID = '" . $_POST["province_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select State</option>
<?php
	foreach($results as $amphur) { 
?>
	<option value="<?php echo $amphur["AMPHUR_ID"]; ?>"><?php echo $amphur["AMPHUR_NAME"]; ?></option>
<?php
	}
}
?>
