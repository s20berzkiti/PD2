<?php

  

namespace App\Console\Commands;

  

use Illuminate\Console\Command;

use File;

  

class MakeauthorCommand extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'make:author {author}';

  

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

        $author = $this->argument('author');

  

        $path = $this->authorPath($author);

  

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

     * Get the author full path.

     *

     * @param string $author

     *

     * @return string

     */

    public function authorPath($author)

    {

        $author = str_replace('.', '/', $author) . '.blade.php';

  

        $path = "resources/views/authors/{$author}";

  

        return $path;

    }

  

    /**

     * Create author directory if not exists.

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
