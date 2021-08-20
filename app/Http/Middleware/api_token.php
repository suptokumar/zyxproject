<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Hash;
class api_token
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
        $hash = "aaa";
        $token = '$2y$10$r.vc8Xw4WmAMXnB0uX3uo.mjqqAiJzKmZgYmxEkHxcY7CWau.HGuu';
        if(!$request->token){
        echo json_encode(["status"=>201,"message"=>"Token Not Found"]);

        exit();
        }
        if(!Hash::check($hash,$request->token)){
        echo json_encode(["status"=>201,"message"=>"Token Not Valid"]);

        exit();
        }
        return $next($request);
    }
}
