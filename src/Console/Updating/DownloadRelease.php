<?php

namespace Ado\Spark\Console\Updating;

use ZipArchive;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Filesystem\Filesystem;
// use Ado\Spark\InteractsWithSparkApi;
use GuzzleHttp\Exception\ClientException;
// use Ado\Spark\InteractsWithSparkConfiguration;

class DownloadRelease
{
   // use InteractsWithSparkConfiguration;

    /**
     * The command instance.
     *
     * @var \Illuminate\Console\Command
     */
    protected $command;

    /**
     * Create a new downloader instance.
     *
     * @param  \Illuminate\Console\Command  $command
     * @return void
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * Download the latest Spark release.
     *
     * @param  string  $release
     * @return string
     */
    public function download($release)
    {
        exit(1);
    }
}
