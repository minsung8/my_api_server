<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VegetableController extends Controller
{
    public function token() {
        $token = DB::table('tokens')->where('name', 'item')->first();           // 저장된 토큰값
        if (!$token)
            return false;
            
        $data = [];
        $data['accessToken'] = $token->token;
        return $data;
    }

    public function index() {
        
        $vegetables = DB::table('vegetables')->get();       // 저장된 모든 채소
        $data = [];
        foreach ($vegetables as $vegetable)         // 모든 채소의 이름을 리스트에 담기 
            array_push($data, $vegetable->name);
        return $data;
    }

    public function show(Request $request) {
        $name = $request->name;
        $vegetable = DB::table('vegetables')->where('name', $name)->first();        // 조회하는 채소 이름 찾기
        if (!$vegetable)        // 해당 채소가 없다면
            abort( response()->json('해당 채소을 찾을 수 없습니다.', 400) );

        $data['name'] = $vegetable->name;
        $data['price'] = $vegetable->price;
        return $data;
    }
}
