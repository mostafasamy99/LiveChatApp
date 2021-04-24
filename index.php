<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css"/>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<body>
  

    <div id="wrapper">
    <h1>hiiiiiiiiiiiiiiiiii</h1>

        <div class="chat_wrapper">
        
            <div id="chat"></div>
            
                <form action="" method="POST" id="messageform">
                    <textarea name="message" cols="30" rows="7" class="textarea"></textarea>
                </form>
            
    
        </div>    
    
    </div>

    <script>

    loadchat();
    setInterval(function()  {
        loadchat();
    }, 1000);
    function loadchat(){
        $.post('handlers/messages.php?action=getMessage',function(response){
            $('#chat').html(response);
        });

    }





    $('.textarea').keyup(function(e){
        if(e.which==13){
            $('form').submit();
        }
    });

    $('form').submit(function(){
       var message=$('.textarea').val();
       $.post('handlers/messages.php?action=sendMessage&message='+message,function(response){

          if(response==1){
            loadchat();
              document.getElementById('messageform').reset();
          }
       });
        return false;
    });
    </script>

</body>
</html>