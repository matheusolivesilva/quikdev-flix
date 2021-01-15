<?php

namespace App\Http\Controllers;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Factory\MovieFactory;

class MovieController extends Controller
{

    use ApiTrait;
    private $trendingMoviesUri;
    private $singleMovieUri;

    public function __construct() {
        $this->loadApiData(); 
        $this->trendingMoviesUri = 'trending/movie/week';
        $this->singleMovieUri = 'movie/';
    }

    public function index()
    {
        $trendingMoviesResponse = $this->doRequest($this->trendingMoviesUri);
        $foundTrendingMovies = json_decode($trendingMoviesResponse->getBody(), true);
        
        
        foreach($foundTrendingMovies['results'] as $movie) { 
            $allTrendingMovies['movies'][] = (object) $this->show($movie['id']);
        }

        $allTrendingMovies['movies'] = $this->orderMoviesByAlphabetically($allTrendingMovies['movies']);
        return response() ->json(
            $allTrendingMovies,
            $trendingMoviesResponse->getStatusCode() 
        );
    }
    
   public function show(int $id)
   {
        $singleMovieResponse = $this->doRequest($this->singleMovieUri . $id);
        $singleFoundMovie = json_decode($singleMovieResponse->getBody(), true);
        $movie = MovieFactory::create($singleFoundMovie);

        return response()->json(
            $movie,
            $singleMovieResponse->getStatusCode()
        );
    }
    
    private function orderMoviesByAlphabetically($allMovies)
    {
        usort($allMovies, function($currentMovie, $nextMovie) {
            $currentMovieEncoded = json_encode($currentMovie, true);
            $nextMovieEncoded = json_encode($nextMovie, true);
            $currentMovieDecoded = json_decode($currentMovieEncoded);
            $nextMovieDecoded = json_decode($nextMovieEncoded);
            return strcmp($currentMovieDecoded->original->name, $nextMovieDecoded->original->name);
        });
        return $allMovies;
    }
}