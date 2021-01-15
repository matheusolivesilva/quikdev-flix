<?php
namespace App\Factory;
use App\Genre;
class GenreFactory implements FactoryInterface
{
    public static function create(array $data): object 
    {
        return new Genre(
            $data['id'],
            $data['name']
        );
    }
}