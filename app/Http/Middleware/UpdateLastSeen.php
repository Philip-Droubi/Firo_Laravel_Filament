<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class UpdateLastSeen
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        if ($user) {
            $user->last_seen = Carbon::now()->format('Y-m-d H:i:s');
            $user->timestamps = false;
            $user->save();
        }
        return $next($request);
    }
}