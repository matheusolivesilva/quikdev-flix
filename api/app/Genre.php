<?php
namespace App;

class Genre implements \JsonSerializable 
{
    private $id;
    private $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}