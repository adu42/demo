<?php

namespace Ado\Spark\Http\Controllers\Settings;

use Ado\Spark\Http\Controllers\Controller;

class DashboardController extends Controller
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
     * Show the settings dashboard.
     *
     * @return Response
     */
    public function show()
    {
        return view('spark::settings');
    }
}
