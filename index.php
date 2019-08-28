<?php
require_once("dbcontroller.php");


$db_handle = new DBController();
$query ="SELECT * FROM province";
$results = $db_handle->runQuery($query);
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<style>
body{width:610px;font-family:calibri;}
.frmDronpDown {border: 1px solid #7ddaff;background-color:#C8EEFD;margin: 2px 0px;padding:40px;border-radius:4px;}
.demoInputBox {padding: 10px;border: #bdbdbd 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'province_id='+val,
	success: function(data){
		$("#amphur-list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
	<h2>FORM: Death and Injury</h2> 
<div class="frmDronpDown">

<div class="row">
<label>Country:</label><br/>
<select name="province" id="province-list" class="demoInputBox" onChange="getState(this.value);">
<option value="">Select Country</option>
<?php
foreach($results as $province) {
?>
<option value="<?php echo $province["PROVINCE_ID"]; ?>"><?php echo $province ["PROVINCE_NAME"]; ?></option>
<?php
}
?>
</select>
</div>
<div class="row"> 
<label>State:</label><br/>
<select name="amphur" id="amphur-list" class="demoInputBox">
<option value="">Select State</option>
</select>
</div>
</div>
</body>
</html>