<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];

	if (!isset($user_id) ||(trim ($user_id) == '')) {
	header('location:index.php');
    exit();
	}

$page_name ="home";
include("include/sidebar.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Chatroom</title>
<style>
	#result {
		border: 2px solid #105469;
		padding: 10px;
		border-radius: 5px;
		background-color: #105469;
		color: white;
		width: 50%;
  		margin: 0 auto;
		margin-bottom: 20px;
	}
	input {
		width: 45%;
		height: 40px;
		padding: 20px;
		
	}


</style>
</head>
<body>
<div class="well well-custom">
	<h4>Welcome, <b><?php echo $user_name; ?></b></h4>
	<?php
		$adminObj = new Admin_Class();
		$tableName = 'chat_room';
		$data = $adminObj->get_all_data_from_table_using_pdo($tableName);
		while($row = $data->fetch(PDO::FETCH_ASSOC)){
			?>
				<div>
				<?php echo $row['chat_room_name']; ?><br>
				</div>
				<div id="result" style="overflow-y:scroll; height:400px;" ></div>
				<form><center>
					<input type="text" id="msg">
					<input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id="id">
					<button type="button" id="send_msg" class="btn btn-success" style="border-radius: 2px"><span style="font-size:25px; color:#fffff;" class="pull-right hidden-xs showopacity glyphicon glyphicon-send"></span></button>
		</center></form>
			<?php
		}
	?>
</div>

<script src = "jquery-3.1.1.js"></script>	
<script type = "text/javascript">

	$(document).ready(function(){
	displayResult();
	/* Send Message	*/	
		
		$('#send_msg').on('click', function(){
			if($('#msg').val() == ""){
				alert('Please write message first');
			}else{
				$msg = $('#msg').val();
				$id = $('#id').val();
				$.ajax({
					type: "POST",
					url: "send_message.php",
					data: {
						msg: $msg,
						id: $id,
					},
					success: function(){
						displayResult();
					}
				});
			}	
		});
	/*****	*****/
	});
	
	function displayResult(){
		$id = $('#id').val();
		$.ajax({
			url: 'send_message.php',
			type: 'POST',
			async: false,
			data:{
				id: $id,
				res: 1,
			},
			success: function(response){
				$('#result').html(response);
			}
		});
	}
	include("include/footer.php");
</script>

</body>
</html>