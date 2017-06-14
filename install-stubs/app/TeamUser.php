<?php

namespace App;

use Ado\Spark\CanJoinTeams;
use Ado\Spark\User as SparkUser;

class TeamUser extends SparkUser
{
    use CanJoinTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'team_user';
    public $timestamps=false;
    protected $fillable = array('user_id', 'team_id');
}
