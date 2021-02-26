<?php


class PostPusher
{
    private array $pusher;
    private const  FILE = "data.json";

    public function setPusher(array $pusher): void
    {
        $this->pusher = $pusher;
    }

    private function convert() :string{
       return json_encode($this->pusher);
    }

    public function addToDb()
   {
        file_put_contents(self::FILE, $this->convert());

   }
   public function __construct(){

}


}