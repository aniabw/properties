<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property; 

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PropertiesController extends Controller
{
    
    public function index() 
	{
		$properties = Property::all();
		return view('properties.index', compact('properties'));
	}
	
	public function show(Property $property) 
	{
	    return view('properties.show', compact('property'));
	}
	
	public function create() 
	{
		return view('properties.create');
	}
	
	public function store()
	{
	    //  these 3 fields are required, we need them to prepare latitude and longitude
		$this->validate(request(), [
				'address_line_1' => 'required|min:1',
				'city' => 'required',
				'postcode'	=> 'required|min:5'
 		]);
		
		
		// preparing latitude and longitude based on address 
		$address_line_1 = request('address_line_1');
		$city = request('city');
		$postcode = request('postcode');
		
		$url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($address_line_1.' '.$city.' '.$postcode);
		
		$client = new Client();
		$geocodeResponse = $client->get($url)->getBody();
		$geocodeData = json_decode($geocodeResponse);
		
		if(!empty($geocodeData) && $geocodeData->status != 'ZERO_RESULTS' && isset($geocodeData->results)) {
			$latitude = $geocodeData->results[0]->geometry->location->lat;
			$longitude = $geocodeData->results[0]->geometry->location->lng;
		}
		else {
			$latitude = 0;
			$longitude = 0;
		}
		
		
		Property::create([
			'address_line_1'   => $address_line_1,
			'address_line_2'   => request('address_line_2'),
			'city'             => $city,
			'postcode'         => $postcode,
			'latitude'         => $latitude,
			'longitude'        => $longitude,
		]);
		
		session()->flash('message','Your property has been added');
		
		return redirect('/properties');
	}
	/**/
}