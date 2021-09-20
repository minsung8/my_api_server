<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FruitController extends Controller
{
    public function token() {       
        $token = DB::table('tokens')->where('name', 'product')->first();        // 저장된 토큰값
        if (!$token)
            return false;
            
        $data = [];
        $data['accessToken'] = $token->token;
        return $data;
    }

    public function index() {
        
        $fruits = DB::table('fruits')->get();       // 저장된 모든 과일
        $data = [];
        foreach ($fruits as $fruit)
            array_push($data, $fruit->name);        // 모든 과일의 이름을 리스트에 담기 
        return $data; 
    }

    public function show(Request $request) {
        $name = $request->name;
        $fruit = DB::table('fruits')->where('name', $name)->first();        // 조회하는 과일 이름 찾기
        if (!$fruit)        // 해당 과일이 없다면
            abort( response()->json('해당 과일을 찾을 수 없습니다.', 400) );

        $data['name'] = $fruit->name;
        $data['price'] = $fruit->price;
        return $data;
    }
}
