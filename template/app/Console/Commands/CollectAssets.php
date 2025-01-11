<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CollectAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:collect-assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collect all assets into the public directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Copy CSS assets
        if (File::exists(resource_path('css'))) {
            File::copyDirectory(resource_path('css'), public_path('css'));
            $this->info('CSS assets copied successfully.');
        } else {
            $this->warn('No CSS assets found in resources/css.');
        }

        // Copy JS assets
        if (File::exists(resource_path('js'))) {
            File::copyDirectory(resource_path('js'), public_path('js'));
            $this->info('JS assets copied successfully.');
        } else {
            $this->warn('No JS assets found in resources/js.');
        }

        // Copy image assets
        if (File::exists(resource_path('images'))) {
            File::copyDirectory(resource_path('images'), public_path('images'));
            $this->info('Image assets copied successfully.');
        } else {
            $this->warn('No image assets found in resources/images.');
        }

        $this->info('All assets collected successfully!');
    }
}
