<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams;

use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Events\Teams\TeamMemberRemoved;
use Ado\Spark\Http\Requests\Settings\Teams\RemoveTeamMemberRequest;
use Ado\Spark\Contracts\Interactions\Settings\Teams\UpdateTeamMember;

class TeamMemberController extends Controller
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
     * Update the given team member.
     *
     * @param  Request  $request
     * @param  \Ado\Spark\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function update(Request $request, $team, $member)
    {
        abort_unless($request->user()->ownsTeam($team), 404);

        $this->interaction($request, UpdateTeamMember::class, [
            $team, $member, $request->all()
        ]);
    }

    /**
     * Remove the given team member from the team.
     *
     * @param  RemoveTeamMemberRequest  $request
     * @param  \Ado\Spark\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function destroy(RemoveTeamMemberRequest $request, $team, $member)
    {
        $team->users()->detach($member->id);

        event(new TeamMemberRemoved($team, $member));
    }
}
