<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOption\None;

class FruitController extends Controller
{
    public function token() {
        $token = DB::table('tokens')->where('name', 'fruit')->first();
        if (!$token)
            return false;
            
        $data = [];
        $data['accessToken'] = $token->token;
        return $data;
    }

    public function index() {
        $fruits = DB::table('fruits')->get();
        $data = [];

        foreach ($fruits as $fruit)
            array_push($data, $fruit->name);

        return $data;
    }

    public function show($name) {
        $fruit = DB::table('fruits')->where('name', $name)->first();
        $data['name'] = $fruit->name;
        $data['price'] = $fruit->price;
        return $data;
    }
}
