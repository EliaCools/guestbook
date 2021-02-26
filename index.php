<?php
declare(strict_types=1);
session_start();
require "class/PostLoader.php";
require "class/Post.php";
require "PostPusher.php";

$postLoader = new PostLoader();


$post = new Post();
if(isset($_POST["send"])){$inputdata = $post->inputdata();}



$newAndDb =  $postLoader ->getArrayobject();
 $newAndDb[]=$inputdata;



if(isset($_POST["send"]) && !empty($_POST["title"])&& !empty($_POST["content"])&& !empty($_POST["author"])){
    $postPusher = new PostPusher();
    $postPusher->setPusher($newAndDb);
    $postPusher->addToDb();
}else{
    unset($_POST);
}
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
    <input type="text" id="title" name="title" value="">
    <label for="content">Content</label>
    <input type="text" id="content" name="content" value="">
    <label for="author">author</label>
    <input type="text" id="author" name="author" value="">
    <input type="" id="date" name="date" READONLY value=" <?php echo $post->currentDate() ?> ">
    <input type="submit" id="send" name="send">

</form>
<div>
    <?php //for($i=count($array)-1; $i>=count($array)-21 ;$i--){
     for($i=1; $i<=min(20,count($newAndDb)) ; $i++){
         $displayposts=$newAndDb[count($newAndDb)-$i];

            echo

                '<h2>' . htmlspecialchars($displayposts->title) . '</h2> <p>' . htmlspecialchars($displayposts->content) . '</p> <p>' . htmlspecialchars($displayposts->author) .'</p> <i> '  .htmlspecialchars($displayposts->date) . ' </i></p>';


    }      ?>






</div>

</body>
<footer></footer>
</html>