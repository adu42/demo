<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams;

use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Events\Teams\TeamDeleted;
use Ado\Spark\Events\Teams\DeletingTeam;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Interactions\Settings\Teams\CreateTeam;

class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new team.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if (! Spark::createsAdditionalTeams()) {
            abort(404);
        }

        $this->interaction($request, CreateTeam::class, [
            $request->user(), $request->all()
        ]);
    }

    /**
     * Delete the given team.
     *
     * @param  Request  $request
     * @param  \Ado\Spark\Team  $team
     * @return Response
     */
    public function destroy(Request $request, $team)
    {
        if (! $request->user()->ownsTeam($team)) {
            abort(404);
        }

        event(new DeletingTeam($team));

        $team->detachUsersAndDestroy();

        event(new TeamDeleted($team));
    }
}
