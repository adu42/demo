<?php

namespace Ado\Spark;

trait HasApiTokens
{
    /**
     * The current authentication token in use.
     *
     * @var \Ado\Spark\Token
     */
    protected $currentToken;

    /**
     * Get all of the API tokens for the user.
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Determine if the current API token is granted a given ability.
     *
     * @param  string  $ability
     * @return bool
     */
    public function tokenCan($ability)
    {
        return $this->currentToken ? $this->currentToken->can($ability) : false;
    }

    /**
     * Get the currently used API token for the user.
     *
     * @return \Ado\Spark\Token
     */
    public function token()
    {
        return $this->currentToken;
    }

    /**
     * Set the current API token for the user.
     *
     * @param  \Ado\Spark\Token  $token
     * @return $this
     */
    public function setToken(Token $token)
    {
        $this->currentToken = $token;

        return $this;
    }
}
