////////////////////////////

// hide the activeChat on page load
var activeChat  = document.getElementById('activeChat');
activeChat.style.display = "none";
// reciever_userid of the active chat
var reciever_userid = 0; // initialize it to 0
var current_userid = 0;

/**
*	This funtion populates the activeChat space 
* 	with selected user data
*/
function showActiveChat(data, current_user){
	// show the activeChat when a user is selected
	activeChat.style.display = "block";
	// update the activeChat name and pic
	document.getElementById('activeChatName').innerHTML = data.name;
	document.getElementById('activeChatPic').src = data.image_path;
	
	// update the reciever_userid
	reciever_userid = data.user_id;
	// update the current user id
	current_userid = current_user;
	// get conversation history
	getChat(current_userid, reciever_userid);
}


/**
*	This function updates the active chat conversation
*/
function getChat(sender_userid, reciever_userid){
    var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// get the sever response
			var response = this.responseText;
			// update the chat history with the response
			document.getElementById('chatHistory').innerHTML = response;
			// make the browser focus on the last message
			var objDiv = document.getElementById("chatHistory");
            objDiv.scrollTop = objDiv.scrollHeight;
		}
	};
	xhttp.open("POST", "includes/chat-async-includes.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("sender_userid="+sender_userid+"&reciever_userid="+reciever_userid+"&getChat=true");
}


/**
*	This function sends the user's chat to the server for storage
*/
function sendMessage(sender_userid){
	message= document.getElementById('messageBox').innerHTML;
	// clear the text box
	document.getElementById('messageBox').innerHTML = '';
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			// call the getChat function to update the active chat converstion
			getChat(sender_userid, reciever_userid);
		}
	};
	xhttp.open("POST", "includes/chat-async-includes.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("sender_userid="+sender_userid+"&reciever_userid="+reciever_userid+"&message="+message+"&sendChat=true");
}

// update the conversation every 5 seconds
var interval = setInterval(updateConversation, 5000);
function updateConversation() {
    /* 
    * make sure the reciever_userid and current_userid 
    * are not equal to 0 before updating conversation
    */
    if((reciever_userid != 0) && (current_userid != 0)){
        // update conversation
        getChat(current_userid, reciever_userid);
    }
}
