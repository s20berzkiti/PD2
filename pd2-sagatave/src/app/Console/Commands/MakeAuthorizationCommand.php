<?php

  

namespace App\Console\Commands;

  

use Illuminate\Console\Command;

use File;

  

class MakeauthorizationCommand extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'make:authorization {authorization}';

  

    /**

     * The console command description.

     *

     * @var string

     */

    protected $description = 'Create a new blade template.';

  

    /**

     * Execute the console command.

     *

     * @return mixed

     */

    public function handle()

    {

        $authorization = $this->argument('authorization');

  

        $path = $this->authorizationPath($authorization);

  

        $this->createDir($path);

  

        if (File::exists($path))

        {

            $this->error("File {$path} already exists!");

            return;

        }

  

        File::put($path, $path);

  

        $this->info("File {$path} created.");

    }

  

     /**

     * Get the authorization full path.

     *

     * @param string $authorization

     *

     * @return string

     */

    public function authorizationPath($authorization)

    {

        $authorization = str_replace('.', '/', $authorization) . '.blade.php';

  

        $path = "resources/views/authorization/{$authorization}";

  

        return $path;

    }

  

    /**

     * Create authorization directory if not exists.

     *

     * @param $path

     */

    public function createDir($path)

    {

        $dir = dirname($path);

  

        if (!file_exists($dir))

        {

            mkdir($dir, 0777, true);

        }

    }

}
