<?php
declare(strict_types=1);
//method could be better
//property or method.
class PostLoader
{
    private const  FILE = "data.txt";
    private stdClass $comment;
    private array $arrayobjects;
    private Post $post;
    public function loadComments(): string
    {
        return file_get_contents("data.txt");

    }

    public function convertComments() :stdClass
    {
        return json_decode($this->loadComments());
    }

    public function push() :stdClass{
       return $this->arrayobjects[] = $this->convertComments();
    }

    public function getArrayobject() : array{
        return $this->arrayobjects;
    }

    //public function getTitle() : stdClass{
    // return $this->comment;
    //}
    public function __construct()
    {

        //return $this ->loadComments();
        //$this -> comment = new stdClass();
        $this ->push();
    }


}