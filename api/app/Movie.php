<?php
namespace App;

class Movie implements \JsonSerializable
{

    private $id; 
    private $poster; 
    private $backgroundImage; 
    private $durationInMinutes; 
    private $tagline; 
    private $status; 
    private $voteAverage; 
    private $voteCount; 
    private $budget; 
    private $name; 
    private $overview; 
    private $releaseDate; 
    private $genres;

    public function __construct(
        int $id, 
        string $poster, 
        string $backgroundImage, 
        int $durationInMinutes, 
        string $tagline, 
        string $status, 
        float $voteAverage, 
        int $voteCount, 
        float $budget, 
        string $name, 
        string $overview, 
        string $releaseDate, 
        array $genres
    )
    {
        $this->id = $id;
        $this->poster = $poster;
        $this->backgroundImage = $backgroundImage;
        $this->durationInMinutes = $durationInMinutes;
        $this->tagline = $tagline;
        $this->status = $status;
        $this->voteAverage = $voteAverage;
        $this->voteCount = $voteCount;
        $this->budget = $budget;
        $this->name = $name;
        $this->overview = $overview;
        $this->releaseDate = $releaseDate;
        $this->genres = $genres;
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'poster' => $this->poster,
            'backgroundImage' => $this->backgroundImage,
            'durationInMinutes' => $this->durationInMinutes,
            'tagline' => $this->tagline,
            'status' => $this->status,
            'voteAverage' => $this->voteAverage,
            'voteCount' => $this->voteCount,
            'budget' => $this->budget,
            'name' => $this->name,
            'overview' => $this->overview,
            'releaseDate' => $this->releaseDate, 
            'genres' => $this->genres 
        ];
    }
}