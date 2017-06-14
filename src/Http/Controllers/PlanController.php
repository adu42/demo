<?php

namespace Ado\Spark\Http\Controllers;

use Ado\Spark\Spark;

class PlanController extends Controller
{
    /**
     * Get the all of the regular plans defined for the application.
     *
     * @return Response
     */
    public function all()
    {
        return response()->json(Spark::allPlans());
    }
}
