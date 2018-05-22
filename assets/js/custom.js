var chatOffset  = 0;
var chatNumLogs = 0;
$(document).ready(function(){
	$('#ibox1').children('.ibox-content').toggleClass('sk-loading');

	$.ajax({
		type: 'POST',
		url: base_url+'home/start_chat',
		data: ({
			type: 'start_chat'
		}),
		dataType: "json",
		success: function(data){
			if(data.status == 'success'){
				startChat(data.chats);
				var elem = document.getElementById('chat-box');
				elem.scrollTop = elem.scrollHeight;
				setTimeout(function(){
					$('#ibox1').children('.ibox-content').toggleClass('sk-loading');
					chatNumLogs = data.chats.length;
					setInterval(function(){
						$.ajax({
							type: 'POST',
							url: base_url+'home/chat_log',
							data: ({
								type: 'chat_log',
								start: chatOffset
							}),
							dataType: "json",
							success: function(data){
								if(data.status == 'success'){
									if(data.chats != false){
										update(data.chats);
										var elem = document.getElementById('chat-box');
										elem.scrollTop = elem.scrollHeight;
									}
									// console.log('Updated');
								}
							}
						});
					},2500);
				},1000);
			}
		}
	});

	$('#msg').keyup(function (event) {
    if (event.keyCode == 13) {
        var content = this.value;  
        var caret = getCaret(this);          
        if(event.shiftKey){
            this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
            event.stopPropagation();
        } else {
            this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
            sendMsg();
        }
    }
	});

	$('#send').on('click', function(){
		sendMsg();
	});
});

function sendMsg(){
	var msg = $('#msg').val();
	$.ajax({
		type: 'POST',
		url: base_url+'home/sendMsg',
		data: ({
			type: 'sendMsg',
			msg: msg
		}),
		dataType: "json",
		success: function(data){
			if(data.status == 'success'){
				// console.log('Message Sent');
				$('#msg').val('');
				$.ajax({
					type: 'POST',
					url: base_url+'home/chat_log',
					data: ({
						type: 'chat_log',
						start: chatOffset
					}),
					dataType: "json",
					success: function(data){
						if(data.status == 'success'){
							if(data.chats != false){
								update(data.chats);
								var elem = document.getElementById('chat-box');
								elem.scrollTop = elem.scrollHeight;
							}
							// console.log('Updated');
						}
					}
				});
			}
		}
	});
}

function startChat(chat_log){
	for (var i=chat_log.length-1; i >= 0; i--) {
		var content = '<div class="chat-message right"><img class="message-avatar img-circle" src="'+base_url+'assets/img/users/'+chat_log[i].img+'"><div class="message"><a class="message-author" href="#">'+chat_log[i].name+'</a><span class="message-date">'+chat_log[i].time+'</span><span class="message-content">'+chat_log[i].msg+'</span></div></div>';
		$("#chat-box").append(content);

		if(i==0){
			chatOffset = chat_log[i].id;
		}
	}
}

function update(chat_log){
	for (var i=chat_log.length-1; i >= 0; i--) {
		if(chatNumLogs > 20){
			$('#chat-box div').first().remove();
		}
		var content = '<div class="chat-message right"><img class="message-avatar img-circle" src="'+base_url+'assets/img/users/'+chat_log[i].img+'"><div class="message"><a class="message-author" href="#">'+chat_log[i].name+'</a><span class="message-date">'+chat_log[i].time+'</span><span class="message-content">'+chat_log[i].msg+'</span></div></div>';
		$("#chat-box").append(content);
		chatNumLogs++;
		if(i==0){
			chatOffset = chat_log[i].id;
		}
	}
}

function getCaret(el) { 
    if (el.selectionStart) { 
        return el.selectionStart; 
    } else if (document.selection) { 
        el.focus();
        var r = document.selection.createRange(); 
        if (r == null) { 
            return 0;
        }
        var re = el.createTextRange(), rc = re.duplicate();
        re.moveToBookmark(r.getBookmark());
        rc.setEndPoint('EndToStart', re);
        return rc.text.length;
    }  
    return 0; 
}