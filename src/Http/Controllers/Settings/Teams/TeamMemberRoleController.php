<?php

namespace Ado\Spark\Http\Controllers\Settings\Teams;

use Ado\Spark\Spark;
use Ado\Spark\Http\Controllers\Controller;

class TeamMemberRoleController extends Controller
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
     * Get the available team member roles.
     *
     * @return Response
     */
    public function all()
    {
        $roles = [];

        foreach (Spark::roles() as $key => $value) {
            $roles[] = ['value' => $key, 'text' => $value];
        }

        return response()->json($roles);
    }
}
