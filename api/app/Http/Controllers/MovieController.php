<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Factory\MovieFactory;
use  GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class MovieController extends Controller
{

    private const apiKey = '4ec327e462149c3710d63be84b81cf4f';
    private const apiKeyQueryParameter = '?api_key=';
    private const baseUri = 'https://api.themoviedb.org/3/';
    private $client;
    private $trendingMoviesUri;
    private $singleMovieUri;

    public function __construct() {
       $this->client = new Client(['base_uri' => self::baseUri]); 
       $this->trendingMoviesUri = 'trending/movie/week';
       $this->singleMovieUri = 'movie/';
    }

    public function index()
    {
        $trendingMoviesResponse = $this->doRequest($this->trendingMoviesUri);
        $foundTrendingMovies = json_decode($trendingMoviesResponse->getBody(), true);
        
        $allTrendingMovies = [];
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
    
    private function doRequest($uri): Response
    {
        return $this->client->request(
            'GET', 
            $uri . self::apiKeyQueryParameter . self::apiKey
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