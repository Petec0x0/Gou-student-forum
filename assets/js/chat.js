////////////////////////////

// hide the activeChat on page load
var activeChat  = document.getElementById('activeChat');
activeChat.style.display = "none";

/**
*	This funtion populates the activeChat space 
* 	with selected user data
*/
function showActiveChat(data){
	// show the activeChat when a user is selected
	activeChat.style.display = "block";
	// update the activeChat name and pic
	document.getElementById('activeChatName').innerHTML = data.name;
	document.getElementById('activeChatPic').src = data.image_path;
	
}

/**
*	
*/
function sendMessage(){
	message= document.getElementById('messageBox').innerHTML;
	alert(messageBox);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// do something!!!
		}
	};
	xhttp.open("POST", "asynchronously.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("options="+arrayToString+"&registration_no="+registration_no+"&course1=course1_score");
}
