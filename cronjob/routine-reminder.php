<?php
// import the database connection
include_once "../includes/config.php";

function getUser($userId){
	global $conn;
	$sql = "SELECT firstname, email FROM students WHERE id = '$userId' 
	            UNION SELECT firstname, email FROM lecturer WHERE id = '$userId'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	return array('firstname'=>$row["firstname"], 'email'=>$row["email"]);
}

// this function updates the routine status to false
function updateRoutine($routine_id){
    global $conn;
    $sql = "UPDATE routine SET status = 0 WHERE id = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, 'i', $routine_id);
    // Execute the statement.
    mysqli_stmt_execute($stmt);
}


// change the time zone to Europe/London
date_default_timezone_set('Europe/London');

// create an of days of week
$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
$todays_day_of_the_week = date("l");

// fetch all active routine from the database using the SELECT statement								
$sql = "SELECT * FROM routine WHERE status = 1";
$result = mysqli_query($conn, $sql);
// iterate through the fetched result and display it
while($row = mysqli_fetch_array($result)) {
    // get routine day of the week
    $routine_day = $row['day_id'];
    // check if the routine day is the same as todays day of the week
    if($days[$routine_day] == $todays_day_of_the_week){
        $routine_time = strtotime($row['time']);
        $current_time = strtotime('now');
        $limit_time = strtotime("+1 minutes", $current_time);
        // check if routine time is greater than current time
        if(($routine_time >= $current_time) && ($routine_time < $limit_time)){
            /* 
            * update the routine status using the created updateRoutine($routine_id)
            * funtion if the routine is not on repeat
            */
            if(!($row['repeat_status'])){
                updateRoutine($row['id']);
            }
            
            // send an email to the routine creator
            $to = getUser($row['owner_id'])['email'];
            $subject = "Routine Reminder";
            
            $message = '<!DOCTYPE html>
            <html lang="en">
               <head>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <meta name="description" content="">
                  <meta name="keywords" content="">
                  <meta charset="UTF-8">
                  <title>Routine Reminder</title>
               </head>
               <!--body-->
               <body style="font-family: calibri; padding: 10px 10px;color: #222B40" >
                  <div style="width: 90%; margin: auto; text-align: center">
                     <div>
                        <div style="    margin-bottom: 40px;">
                           <div class="phone-logo">
                           </div>
                        </div>
                        <img src="https://images.unsplash.com/photo-1512314889357-e157c22f938d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80" style="width: 300px; background: #212121;" >
                     </div>
                     <div >
                        <p style="font-size: 14px;color: #222B40;text-align: center;">
                            This is a gentle reminder about your today\'s routine at '.$row['time'].'
                        </p>
                        <div style="background: #222B40; padding: 20px">
                           <p style="color: #fff">For more info:  <a href="mailto:hq@email.com" style="color: #fff">hq@email.com </a> </p>
                        </div>
                     </div>
                  </div>
               </body>';
            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <all@triskelioncoin.com>' . "\r\n";
            $headers .= 'Cc: hq@email.com' . "\r\n";
            
            mail($to,$subject,$message,$headers);
        }
    }
}   

