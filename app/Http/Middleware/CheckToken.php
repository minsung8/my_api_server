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
        $token = explode(" ", $request->header('Authorization'))[1];
        if (!$token)
            abort( response()->json('토큰이 필요합니다.', 400) );

        $uri = $request->path();
        $name = explode("/", $uri)[1];
        $confirm_token = DB::table('tokens')->where('name', $name)->first()->token;

        if (!$confirm_token)
            abort( response()->json('개발팀에 문의해주세요.', 400) );

        if ($token != $confirm_token)
            abort( response()->json('토큰이 유효하지 않습니다.', 400) );

        return $next($request);
    }
}
