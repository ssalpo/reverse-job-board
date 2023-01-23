<?php

namespace App\Http\Middleware;

use App\Models\DeveloperProfile;
use Closure;
use Illuminate\Http\Request;

class RedirectIfDeveloperProfileExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $profile = DeveloperProfile::my()->first();

        // Redirect to edit page if profile already exists
        if($profile) {
            return redirect()->route('developers.profile.edit', $profile->id);
        }

        return $next($request);
    }
}
