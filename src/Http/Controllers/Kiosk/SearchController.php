<?php

namespace Ado\Spark\Http\Controllers\Kiosk;

use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\UserRepository;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Get the users based on the incoming search query.
     *
     * @param  Request  $request
     * @return Response
     */
    public function performBasicSearch(Request $request)
    {
        $query = str_replace('*', '%', $request->input('query'));

        return Spark::interact(UserRepository::class.'@search', [
            $query, $request->user()
        ]);
    }
}
