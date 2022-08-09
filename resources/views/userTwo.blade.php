<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/chat.css">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <title>Rakib</title>


</head>

<body>
	<!-- 	<div class="blog">Visit <a href="#" target="_blank">My Blog</a></div> -->
	<div class="container">
		<div class="chat_box">
			<div class="head">
				<div class="user">
					<div class="avatar">
						<img src="https://picsum.photos/g/40/40" />
					</div>
					<div class="name">Rakib Hosen</div>
				</div>
				<ul class="bar_tool">
					<li><span class="alink"><i class="fas fa-phone"></i></span></li>
					<li><span class="alink"><i class="fas fa-video"></i></span></li>
					<li><span class="alink"><i class="fas fa-ellipsis-v"></i></span></li>
				</ul>
			</div>
			<div class="body">

                <div class="incoming">
					<!-- <div id="incomingBubble" class="bubble"></div> -->
				</div>
				<div class="outgoing">
					<!-- <div id="outgoingBubble" class="bubble"></div> -->
				</div>
				
			</div>
			<div class="foot">
				<input type="text" id="msg2" class="msg" placeholder="Type a message..." require />
				<button type="submit"><i class=" submitBtn fas fa-paper-plane"></i></button>
			</div>
		</div>
	</div>
     <script>

        $(document).ready(function(){  
            $(".submitBtn").click(function(){ 
            
                var messageTwo = $("#msg2").val();
                    
                    $.ajax({
                        type: "GET",
                        url: '/eventTwo',
                        data: {
                            messageTwo: messageTwo,
                        },
                        cache: false,
                        success: function(data) {
                            console.log(data);
                            $("#msg2").val('');
                        }
                    });
            });  
}); 



    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('e1ae740b12b367a28285', {
      cluster: 'ap2'
    });

    var channel1 = pusher.subscribe('channelOne');
    channel1.bind('channelOneMessage', function(data) {
        $(".incoming").append('<div id="incomingBubble" class="bubble" ><p>'+data.messageOne+'</p></div>');
   
    });



    var channel2 = pusher.subscribe('channelTwo');
    channel2.bind('channelTwoMessage', function(data) {
        $(".outgoing").append('<div id="outgoingBubble" class="bubble" ><p>'+data.messageTwo+'</p></div>');

    });

  </script>

</body>

</html>