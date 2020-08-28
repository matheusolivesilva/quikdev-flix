<?php
namespace App;

class Movie implements \JsonSerializable
{
    private $id;
    private $poster;
    private $name;
    private $overview;
    private $releaseDate;
    private $genres;

    public function __construct(int $id, string $poster, string $name, string $overview, string $releaseDate, array $genres)
    {
        $this->id = $id;
        $this->poster = $poster;
        $this->name = $name;
        $this->overview = $overview;
        $this->releaseDate = $releaseDate;
        $this->genres = $genres;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'poster' => $this->poster,
            'name' => $this->name,
            'overview' => $this->overview,
            'releaseDate' => $this->releaseDate, 
            'genres' => $this->genres 
        ];
    }
}