<?php

namespace Ado\Spark\Http\Controllers;

use Carbon\Carbon;
use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Contracts\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(
            'updateLastReadAnnouncementsTimestamp'
        );
    }

    /**
     * Get the current user of the application.
     *
     * @return Response
     */
    public function current()
    {
        return Spark::interact(UserRepository::class.'@current');
    }

    /**
     * Update the last read announcements timestamp.
     *
     * @param  Request  $request
     * @return Response
     */
    public function updateLastReadAnnouncementsTimestamp(Request $request)
    {
        $request->user()->forceFill([
            'last_read_announcements_at' => Carbon::now(),
        ])->save();
    }
}
