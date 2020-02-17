<?php

require_once "configuration.php";



if(isset($_REQUEST["action"])&&$_REQUEST["action"]=="register"){
  $user = new User();
  $user->email = $_REQUEST["email"];
  $user->password = $_REQUEST["password"];
  $user->nickName = $_REQUEST["nickname"];
  try{
    $user->createNew();
    $smsg = "User Created";
  } catch(Exception $e){
    $fmsg = "Cannot created user".$e;
  }
}

if(isset($_REQUEST["action"])&&$_REQUEST["action"]=="login"){
  if(Auth::login($_REQUEST["email"], $_REQUEST["password"])){
    header("Location: dashboard.php");
    exit();
  } else {
    $fmsg = "Check your username or password";
  }
}

?>
<html>
<head>
</head>
<body>

  <?php if(isset($fmsg)) {?><div><?=$fmsg?></div><?php }?>
  <?php if(isset($smsg)) {?><div><?=$smsg?></div><?php }?>
  <form method="POST" >
    <input type="hidden" name="action" value="register"/>
    Email: <input type="email" name="email" placeholder="Email..." required/></br></br>
    Password: <input type="password" name="password" placeholder="Password..." pattern=".{6,}" required/></br></br>
    Reenter Password: <input type="password" name="password" placeholder="Reenter Password..." required/></br></br>
    Nick Name: <input type="text" name="nickname" placeholder="Nick Name..." required/></br></br>
      city Name: <input type="text" name="cityname" placeholder="City Name..." required/></br></br>
        Phone Number: <input type="text" name="phonenumber" placeholder="Phone Number..." required/></br></br>

    <button>Register</button>
  </form>

  <form method="POST" >
    <input type="hidden" name="action" value="login"/>
    Email: <input type="email" name="email" placeholder="Email..."/>
    Password: <input type="password" name="password" placeholder="Password..."/>
    <button>Login</button>
  </form>

</body>
