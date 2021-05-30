<?php
// import the database connection
include_once "config.php";

// check if a create-discussion post request have been sent
if (isset($_POST['sendChat'])) {
    $sender_userid = $_POST['sender_userid'];
    $reciever_userid = $_POST['reciever_userid'];
    $message = test_input($_POST['message']);
    
    // store the collected data to the database
    $sql = "INSERT INTO personal_chat (`sender_userid`,`reciever_userid`,`message`) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "iis", $sender_userid, $reciever_userid, $message);
    mysqli_stmt_execute($stmt);
}

// check if a create-discussion post request have been sent
if (isset($_POST['getChat'])) {
    $sender_userid = $_POST['sender_userid'];
    $reciever_userid = $_POST['reciever_userid'];
    
    // fetch all categories from the database using the SELECT statement								
	$sql = "SELECT * FROM personal_chat WHERE 
	        (sender_userid = '$sender_userid' AND reciever_userid = '$reciever_userid') OR 
	        (sender_userid = '$reciever_userid' AND reciever_userid = '$sender_userid')";
	$result = mysqli_query($conn, $sql);
	// iterate through the fetched result and display it
	while($row = mysqli_fetch_array($result)) {
	    $time = strtotime($row['timestamp']);
        $formatedDateTime = date("m/d/y g:i A", $time);
		if($row['sender_userid'] == $sender_userid){
		    echo '<div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>'.$row['message'].'</p>
                        <span class="time_date"> '.$formatedDateTime.'</span> </div>
                    </div>';
		}else{
		    echo '<div class="incoming_msg">
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>'.$row['message'].'</p>
                          <span class="time_date"> '.$formatedDateTime.'</span></div>
                      </div>
                    </div>';
		}
	}
	echo '<hr>';
}
