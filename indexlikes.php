<!--this is the code written by onkar jha of tech with onkar youtube channal looking for people response towards this system-->
<!DOCTYPE html>
<html>
   <head>
      <title>Like/unlike system in php & mysql</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600;900&display=swap" rel="stylesheet">
      <style type="text/css">
         *{
         margin:0;
         padding: 0;
         box-sizing: border-box;
         }:root{
         --f:'Mulish', sans-serif;}
         body{
         background: #26306b;
         font-family: var(--f);
         }.q{
         position: absolute;top:50%;
         left: 50%;
         transform: translate(-50% , -50%);
         }.uploads{
         width:450px;
         padding: 20px;
         border-radius: 2px;
         background: white;margin-top:10px;
         }.like{margin-top:10px;display: flex;align-items: center;}
         .like_icon{
         width:23px;
         width:23px;margin: 10px;
         }h3{
         font-weight: lighter;
         }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
          $(".like").click(function() {
          	var id=$(this).attr("title");
          	var i=$(this).children(".like_icon").attr("src");
          	if(i=="heart.svg"){
          		$(this).children(".like_icon").attr("src","red_heart.svg");
          		$(this).children("span").text("liked");
          	}else if(i=="red_heart.svg"){
          		$(this).children(".like_icon").attr("src","heart.svg");
          		$(this).children("span").text("unliked");
          	}
          	$.post("get.php",{data:id,how:'c'});
          });
         });
      </script>
   </head>
   <body>
      <div class="q">
         <?php
            $conn=new mysqli("localhost","root","","captcha");
            $sql="select * from uploads";
            session_start();
            $_SESSION['user_id']=1;
            $res=$conn->query($sql);
            if($res->num_rows>0){
            	while($row=$res->fetch_assoc()){
            		$id=$row['id'];
            		$text=$row['text'];
            		$count=$row['count'];
                    echo "<div class='uploads'>
                              <h3>".$text."</h3>
                              <div class='like' title=".$id.">     
                                 <img class='like_icon' src='heart.svg'>
                                 <span>".$count."</span>
                               </div>
                          </div>";
            	}
            }else{
            	echo "No record found.";
            }
            ?>
      </div>
   </body>
</html>