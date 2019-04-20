<?php

namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
	public function getUser(Request $request, int $id)
    {	
        return DB::table('users')
        	->select('username', 'steamid', 'avatar')
        	->where('steamid', $id)
        	->get();
    }

    public function getInventory(Request $request, int $id)
    {
    	$inventoryURL = 'https://steamcommunity.com/inventory/' . (string) $id . '/730/2?l=english&count=5000';

    	$client = new Client();
    	$res = $client->request('GET', $inventoryURL);
    	return $res->getBody();
    }
}