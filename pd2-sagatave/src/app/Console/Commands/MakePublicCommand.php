<?php

  

namespace App\Console\Commands;

  

use Illuminate\Console\Command;

use File;

  

class MakepublicCommand extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'make:public {public}';

  

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

        $public = $this->argument('public');

  

        $path = $this->publicPath($public);

  

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

     * Get the public full path.

     *

     * @param string $public

     *

     * @return string

     */

    public function publicPath($public)

    {

        $public = str_replace('.', '/', $public) . '.blade.php';

  

        $path = "resources/views/public/{$public}";

  

        return $path;

    }

  

    /**

     * Create public directory if not exists.

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
