
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
	$adminObj = new Admin_Class();
// Function to insert a new chat message
function insertMessage($adminObj, $chatRoomId, $msg, $userId)
{
    try {
        $currentDateTime = date("Y-m-d H:i:s"); // Get current date and time
        $stmt = $adminObj->db->prepare("INSERT INTO chat (chat_room_id, chat_msg, userid, chat_date) VALUES (:chatRoomId, :msg, :userId, :currentDateTime)");
        $stmt->bindParam(':chatRoomId', $chatRoomId, PDO::PARAM_INT);
        $stmt->bindParam(':msg', $msg, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':currentDateTime', $currentDateTime, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// Function to retrieve chat history
function getChatHistory($adminObj, $chatRoomId)
{
    date_default_timezone_set('Asia/Manila');
    try {
        $stmt = $adminObj->db->prepare("SELECT * FROM chat LEFT JOIN tbl_admin ON tbl_admin.user_id = chat.userid WHERE chat_room_id = :chatRoomId ORDER BY chat_date ASC");
        $stmt->bindParam(':chatRoomId', $chatRoomId, PDO::PARAM_INT);
        $stmt->execute();

        $result = '';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result .= '<div>';
            $result .= date('Y-m-d h:i A', strtotime($row['chat_date'])) . '<br>';
            $result .= $row['fullname'] . ': ' . $row['chat_msg'] . '<br>';
            $result .= '</div><br>';
        }

        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


if (isset($_POST['msg'])) {
    $msg = addslashes($_POST['msg']);
    $id = $_POST['id'];
    $userId = $user_id;

    insertMessage($adminObj, $id, $msg, $userId);
}

if (isset($_POST['res'])) {
    $id = $_POST['id'];
    echo getChatHistory($adminObj, $id);
}
    

$page_name="home";
include("include/sidebar.php");
?>
</div>


