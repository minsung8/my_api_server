<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Illuminate\Support\Facades\DB;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        $token = explode(" ", $request->header('Authorization'))[1];        // 요청된 토큰값 
        if (!$token)        // 토큰값이 존재하지 않는다면
            abort( response()->json('토큰이 필요합니다.', 400) );

        $uri = $request->path();        
        $name = explode("/", $uri)[1];      // 요청 API 종류 (product or item)
        $confirm_token = DB::table('tokens')->where('name', $name)->first()->token;     // 해당 API에 대한 토큰값

        if (!$confirm_token)        // 해당 API에 대한 토큰값을 찾을 수 없다면
            abort( response()->json('개발팀에 문의해주세요.', 400) );

        if ($token != $confirm_token)       // 해당 API에 대한 토큰값과 다르다면
            abort( response()->json('토큰이 유효하지 않습니다.', 400) );

        return $next($request);
    }
}
