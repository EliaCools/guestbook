<?php
declare(strict_types=1);
session_start();
require "class/PostLoader.php";
require "class/Post.php";
require "PostPusher.php";


$post = new Post();

$postLoader = new PostLoader();

$newAndDb =  $postLoader ->getArrayobject();


if(isset($_POST["send"]) && !empty($_POST["title"])&& !empty($_POST["content"])&& !empty($_POST["author"])){
    $inputData = $post->inputdata();
    $newAndDb[] = $inputData;
    $postPusher = new PostPusher();
    $postPusher->setPusher($newAndDb);
    $postPusher->addToDb();
    header("location:http://guestbook.local/");
    exit;

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
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <title>guestbook</title>
</head>

<body>
<header>
    <h1 id="headerh1">SuperCoolWebsite</h1>

</header>

<div id="main-page">
    <h1 class="main-titles">Feel free to sign my guestbook!</h1>
    <div id="inputdiv">
<form method="post" id="commentForm" action="">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value=""><br/>
    <label for="content" id="contentLabel">Content</label>
    <textarea  id="content" name="content"> </textarea><br/>
    <label for="author">Author</label>
    <input type="text" id="author" name="author" value=""><br/>
    <input type="hidden" id="date" name="date" READONLY value=" <?php echo $post->currentDate() ?> "><br/>
    <input type="submit" id="send" name="send">
    </div>
</form>
    <hr>
<div>
    <div id="guestbook-posts">

    <?php //for($i=count($array)-1; $i>=count($array)-21 ;$i--){
     for($i=1; $i<=min(20,count($newAndDb)) ; $i++){
         $displayposts=$newAndDb[count($newAndDb)-$i];

            echo

                ' <div class="posts"><div class="posts-inner"><h2>' . htmlspecialchars($displayposts->title) . '</h2> <p>' . nl2br(htmlspecialchars($displayposts->content)) . '</p> <p>' . htmlspecialchars($displayposts->author) .'</p> <i> '  .htmlspecialchars($displayposts->date) . ' </i></p></div></div>';


    }      ?>
    </div>





</div>
</div>
</body>
<footer></footer>
</html>