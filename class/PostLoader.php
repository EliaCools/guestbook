<?php
declare(strict_types=1);
class PostLoader
{
    private const  FILE = "data.json";
    private array $arrayobjects;



    private function loadComments(): string
    {
        return file_get_contents(self::FILE);

    }

    private function convertComments() :array
    {
      return  $this -> arrayobjects = json_decode($this->loadComments());
    }

    public function getArrayobject() : array{
        return $this->arrayobjects;
    }

    public function __construct()
    {
        if($this->loadComments()!=null){
            $this ->convertComments();
        }else{
            $this->arrayobjects=[];
        }


    }


}