<?php
declare(strict_types=1);


class Post
{

    private const  FILE = "data.txt";
    private array $commentArray;
    private stdClass $pulledclass;

    public function newobject() :stdClass{
        $this->pulledclass = new stdClass();
    }



    public function date(): string
    {
        return date("d F o");
    }

    public function stringify(): string
    {
       return  json_encode($_POST);
    }
   public function classi(): stdClass
    {
       return  json_decode($this->stringify());
    }


    public function database()
    {
         file_put_contents(self::FILE, $this->stringify());

    }


    public function __CONSTRUCT()
    {
        // I can put function in here or declare methods when instantiating the post.
        //push array into existing array

    }

}