<?php

  

namespace App\Console\Commands;

  

use Illuminate\Console\Command;

use File;

  

class MakegenreCommand extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'make:genre {genre}';

  

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

        $genre = $this->argument('genre');

  

        $path = $this->genrePath($genre);

  

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

     * Get the genre full path.

     *

     * @param string $genre

     *

     * @return string

     */

    public function genrePath($genre)

    {

        $genre = str_replace('.', '/', $genre) . '.blade.php';

  

        $path = "resources/views/genre/{$genre}";

  

        return $path;

    }

  

    /**

     * Create genre directory if not exists.

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
