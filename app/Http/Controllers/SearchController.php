<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Psr7\Request as HttpRequest;
use \GuzzleHttp\Client as GuzzleClient;

class SearchController extends Controller
{
    function __construct()
    {
    	$this->endpoint = "https://demo.otalab.com/api/airports/autocomplete/";
    	$this->postEndpoint = "https://static.otalab.com/assets/background/airports/banner/";
    	$this->airports = [];
        $this->client = new GuzzleClient();
    }

    /**
     * Displays the homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view("search");
    }

    /**
     * Process searching
     *
     * @param \Illuminate\Http\Request $request
     * @return json
     */
    public function search(Request $request)
    {
    	$term = $request->q;
		if (!empty($term)) {
			$request = new HttpRequest('GET', $this->endpoint.$term);
			$promise = $this->client->sendAsync($request)->then(function ($response) {
				$res = json_decode($response->getBody());
			    foreach ($res as $key => $airport) {
			    	$airport->value = $airport->iata;
			    	$this->airports[] = $airport;
			    }

			    echo json_encode($this->airports);
			    $this->airports = [];
			});

			$promise->wait();
		}
    }

    /**
     * Shows the banner image from the search submitted by the user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function showBanner(Request $request)
    {
    	$image = 'https://via.placeholder.com/500x500';
    	$iata = strtolower($request->search_val);
        $searchTerm = strtolower($request->search);

    	if (!empty($iata)) {
    		$image = $this->postEndpoint.$iata.".jpg";
    	} else {
            $image = $this->postEndpoint.$searchTerm.".jpg";
        }

    	return view("results")->withImage($image);
    }
}
