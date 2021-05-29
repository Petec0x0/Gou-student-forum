////////////////////////////

// hide the activeChat on page load
var activeChat  = document.getElementById('activeChat');
activeChat.style.display = "none";

function showActiveChat(data){
	// show the activeChat when a user is selected
	activeChat.style.display = "block";
	
	document.getElementById('activeChatName').innerHTML = data.name;
	document.getElementById('activeChatPic').src = data.image_path;
	
}

