<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ApiLog
 *
 * @property int $id
 * @property string $method
 * @property string $endpoint
 * @property mixed|null $query_params
 * @property mixed|null $post_params
 * @property string|null $request_content
 * @property mixed $request_headers
 * @property mixed $ips
 * @property string|null $token
 * @property string $response_code
 * @property string $response_body
 * @property mixed|null $response_params
 * @property mixed $response_headers
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereEndpoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog wherePostParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereQueryParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereRequestContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereRequestHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereResponseBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereResponseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereResponseHeaders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereResponseParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ApiLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApiLog extends Model
{
    use HasTimestamps;

    protected $fillable = [
        'method', 'endpoint', 'query_params', 'post_params', 'request_content', 'request_headers', 'ips', 'token',
        'response_code', 'response_body', 'response_params', 'response_headers'
    ];

    protected $casts = [
        'query_params' => 'array',
        'post_params' => 'array',
        'ips' => 'array',
        'request_headers' => 'array',
        'response_params' => 'array',
        'response_headers' => 'array',
    ];
}
