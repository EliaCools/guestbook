<?php
declare(strict_types=1);
session_start();
require "class/PostLoader.php";
require "class/Post.php";
//var_dump($_POST);


$post = new Post();
if(isset($_POST["send"])){$test = $post->classi();}

//var_dump($test);

$postload = new PostLoader();
$array =  $postload ->getArrayobject();
$ispushed = $array[]=$test;
var_dump($ispushed);
////var_dump($stdclass);
////echo $postload->loadComments()
//
//if(!isset($_SESSION["array"])){$_SESSION["array"]=$stdclass;};
//var_dump($_SESSION);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>guestbook</title>
</head>
<header></header>
<body>
<form method="post" id="commentForm" action="">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php  echo $_POST['title']?>">
    <label for="content">Content</label>
    <input type="text" id="content" name="content" value="<?php  echo $_POST['content'] ?>">
    <label for="author">author</label>
    <input type="text" id="author" name="author" value="<?php echo $_POST['author'] ?>">
    <input type="" id="date" name="date" READONLY value=" date "> <?php/* echo $test->date() */?>
    <input type="submit" id="send" name="send">

</form>
<div>
<p><?php  ?></p>
<p> hello</p>
<p>test</p>



</div>

</body>
<footer></footer>
</html>