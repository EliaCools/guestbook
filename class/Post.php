<?php
declare(strict_types=1);


class Post
{


    public function currentDate(): string
    {
        return date("d F o");
    }

    private function stringify(): string
    {
       return  json_encode($_POST);
    }
    public function inputdata(): stdClass
    {
       return  json_decode($this->stringify());
    }

    public function __CONSTRUCT()
    {
        //push array into existing array
    }

}