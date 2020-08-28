<?php
namespace App\Factory;
use App\Movie;
class MovieFactory implements FactoryInterface
{
    public static function create(array $data): object 
    {
     
        foreach($data['genres'] as $genre) {
               $moviesGenre[] = GenreFactory::create([
                   'id' => $genre['id'], 
                   'name' => $genre['name']
               ]
            );
        }

        return new Movie(
            $data['id'],
            $data['poster_path'],
            $data['title'],
            $data['overview'],
            $data['release_date'],
            $moviesGenre
        );
    }
}