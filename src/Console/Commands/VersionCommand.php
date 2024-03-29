<?php

namespace Ado\Spark\Console\Commands;

use Ado\Spark\Spark;
use Illuminate\Console\Command;

class VersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spark:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View the current Spark version';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('<info>Ado Spark</info> version <comment>'.Spark::$version.'</comment>');
    }
}
