<?php

namespace App\Http\Controllers;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Factory\GenreFactory;

class GenreController extends Controller
{
    use ApiTrait;
    private $genreUri;

    public function __construct() {
        $this->loadApiData(); 
        $this->genresUri= 'genre/movie/list';
    }

    public function index()
    {
        $genresResponse = $this->doRequest($this->genresUri);
        $foundGenres= json_decode($genresResponse->getBody(), true);
        
        foreach($foundGenres['genres'] as $genre) { 
            $allGenres['genres'][] = GenreFactory::create($genre)->name;
        }

        return response() ->json(
            $allGenres,
            $genresResponse->getStatusCode() 
        );
    }
}