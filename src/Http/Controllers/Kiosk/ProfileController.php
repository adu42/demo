<?php

namespace Ado\Spark\Http\Controllers\Kiosk;

use Ado\Spark\Spark;
use Illuminate\Http\Request;
use Ado\Spark\Http\Controllers\Controller;
use Ado\Spark\Contracts\Repositories\UserRepository;
use Ado\Spark\Contracts\Repositories\PerformanceIndicatorsRepository;

class ProfileController extends Controller
{
    /**
     * The performance indicators repository instance.
     *
     * @var PerformanceIndicatorsRepository
     */
    protected $indicators;

    /**
     * Create a new controller instance.
     *
     * @param  PerformanceIndicatorsRepository  $indicators
     * @return void
     */
    public function __construct(PerformanceIndicatorsRepository $indicators)
    {
        $this->indicators = $indicators;

        $this->middleware('auth');
        $this->middleware('dev');
    }

    /**
     * Get the user to be displayed on the user profile screen.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $user = Spark::call(UserRepository::class.'@find', [$id]);

        return response()->json([
            'user' => $user,
            'revenue' => $this->indicators->totalRevenueForUser($user),
        ]);
    }
}
