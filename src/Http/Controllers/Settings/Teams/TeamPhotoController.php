<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams;

use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Interactions\Settings\Teams\UpdateTeamPhoto;
use Ado\Spark\Http\Requests\Settings\Teams\UpdateTeamPhotoRequest;

class TeamPhotoController extends Controller
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
     * Update the given team's photo.
     *
     * @param  UpdateTeamPhotoRequest  $request
     * @param  \Ado\Spark\Team  $team
     * @return Response
     */
    public function update(UpdateTeamPhotoRequest $request, $team)
    {
        $this->interaction(
            $request, UpdateTeamPhoto::class,
            [$team, $request->all()]
        );
    }
}
