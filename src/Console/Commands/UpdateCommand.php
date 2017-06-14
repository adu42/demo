<?php

namespace Ado\Spark\Console\Commands;

use Ado\Spark\Spark;
use Illuminate\Console\Command;
use Ado\Spark\Console\Updating;
//use Ado\Spark\InteractsWithSparkApi;

class UpdateCommand extends Command
{
   // use InteractsWithSparkApi;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spark:update
                            {--major : Update Spark to the latest major release.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Spark installation';

    /**
     * The target Spark major version number.
     *
     * @var string
     */
    protected $targetMajorVersion;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('is coming soon!');
    }
}
