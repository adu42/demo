<?php

namespace Ado\Spark\Http\Middleware;

use Ado\Spark\Spark;

class VerifyUserHasTeam
{
    /**
     * Verify the incoming request's user belongs to team.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if (Spark::usesTeams() && $request->user() && ! $request->user()->hasTeams()) {
            return redirect('missing-'.Spark::teamString());
        }

        return $next($request);
    }
}
