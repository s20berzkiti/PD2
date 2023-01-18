<?php

  

namespace App\Console\Commands;

  

use Illuminate\Console\Command;

use File;

  

class MakeviewsCommand extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'make:views {views}';

  

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

        $views = $this->argument('views');

  

        $path = $this->viewsPath($views);

  

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

     * Get the views full path.

     *

     * @param string $views

     *

     * @return string

     */

    public function viewsPath($views)

    {

        $views = str_replace('.', '/', $views) . '.blade.php';

  

        $path = "resources/views/{$views}";

  

        return $path;

    }

  

    /**

     * Create views directory if not exists.

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
