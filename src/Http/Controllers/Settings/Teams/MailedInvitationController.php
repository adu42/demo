<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams;

use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Invitation;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\TeamRepository;
use Ado\Spark\Http\Requests\Settings\Teams\CreateInvitationRequest;
use Ado\Spark\Contracts\Interactions\Settings\Teams\SendInvitation;

class MailedInvitationController extends Controller
{
    /**
     * The team repository implementation.
     *
     * @var \Ado\Spark\Contracts\Repositories\TeamRepository
     */
    protected $teams;

    /**
     * Create a new controller instance.
     *
     * @param  TeamRepository  $teams
     * @return void
     */
    public function __construct(TeamRepository $teams)
    {
        $this->teams = $teams;

        $this->middleware('auth');
    }

    /**
     * Get all of the mailed invitations for the given team.
     *
     * @param  Request  $request
     * @param  \Ado\Spark\Team  $team
     * @return Response
     */
    public function all(Request $request, $team)
    {
        abort_unless($request->user()->onTeam($team), 404);

        return $team->invitations;
    }

    /**
     * Create a new invitation.
     *
     * @param  CreateInvitationRequest  $request
     * @param  \Ado\Spark\Team  $team
     * @return Response
     */
    public function store(CreateInvitationRequest $request, $team)
    {
        Spark::interact(SendInvitation::class, [$team, $request->email]);
    }

    /**
     * Cancel / delete the given invitation.
     *
     * @param  Request  $request
     * @param  \Ado\Spark\Invitation  $invitation
     * @return Response
     */
    public function destroy(Request $request, Invitation $invitation)
    {
        abort_unless($request->user()->ownsTeam($invitation->team), 404);

        $invitation->delete();
    }
}
