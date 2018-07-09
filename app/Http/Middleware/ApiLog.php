<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ApiLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $log = new \App\Models\ApiLog();

        $log->method = $request->method();
        $log->endpoint = $request->path();
        $log->query_params = $_GET;
        $log->post_params = $_POST;
        $log->request_content = $request->getContent();
        $log->request_headers = $request->headers->all();
        $log->ips = $request->ips();

        /** @var Response $response */
        $response = $next($request);

        $log->response_code = $response->getStatusCode();
        $log->response_body = substr($response->getContent(), 0, 30000);
        $log->response_params = json_decode($response->getContent(), true);
        $log->response_headers = $response->headers->all();

        $log->save();

        return $response;
    }
}
