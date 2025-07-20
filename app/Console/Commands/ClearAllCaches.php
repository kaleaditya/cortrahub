<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ClearAllCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-all {--type=all : Type of cache to clear (all, config, route, view, cache, compiled)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all Laravel caches including config, route, view, and application cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->option('type');
        
        $this->info('Starting cache clearing process...');
        
        try {
            switch ($type) {
                case 'all':
                    $this->clearAllCaches();
                    break;
                case 'config':
                    $this->clearConfigCache();
                    break;
                case 'route':
                    $this->clearRouteCache();
                    break;
                case 'view':
                    $this->clearViewCache();
                    break;
                case 'cache':
                    $this->clearApplicationCache();
                    break;
                case 'compiled':
                    $this->clearCompiledFiles();
                    break;
                default:
                    $this->error('Invalid cache type. Available types: all, config, route, view, cache, compiled');
                    return 1;
            }
            
            $this->info('Cache clearing completed successfully!');
            return 0;
            
        } catch (\Exception $e) {
            $this->error('Error clearing caches: ' . $e->getMessage());
            return 1;
        }
    }
    
    /**
     * Clear all caches
     */
    private function clearAllCaches()
    {
        $this->clearConfigCache();
        $this->clearRouteCache();
        $this->clearViewCache();
        $this->clearApplicationCache();
        $this->clearCompiledFiles();
        $this->clearCacheFacade();
        $this->clearStorageCache();
        $this->clearBootstrapCache();
        $this->clearSessionFiles();
    }
    
    /**
     * Clear config cache
     */
    private function clearConfigCache()
    {
        $this->info('Clearing config cache...');
        Artisan::call('config:clear');
        $this->info('✓ Config cache cleared');
    }
    
    /**
     * Clear route cache
     */
    private function clearRouteCache()
    {
        $this->info('Clearing route cache...');
        Artisan::call('route:clear');
        $this->info('✓ Route cache cleared');
    }
    
    /**
     * Clear view cache
     */
    private function clearViewCache()
    {
        $this->info('Clearing view cache...');
        Artisan::call('view:clear');
        $this->info('✓ View cache cleared');
    }
    
    /**
     * Clear application cache
     */
    private function clearApplicationCache()
    {
        $this->info('Clearing application cache...');
        Artisan::call('cache:clear');
        $this->info('✓ Application cache cleared');
    }
    
    /**
     * Clear compiled files
     */
    private function clearCompiledFiles()
    {
        $this->info('Clearing compiled class files...');
        Artisan::call('clear-compiled');
        $this->info('✓ Compiled class files cleared');
    }
    
    /**
     * Clear cache facade
     */
    private function clearCacheFacade()
    {
        $this->info('Clearing cache facade...');
        Cache::flush();
        $this->info('✓ Cache facade cleared');
    }
    
    /**
     * Clear storage cache
     */
    private function clearStorageCache()
    {
        $this->info('Clearing storage cache...');
        if (Storage::disk('local')->exists('framework/cache')) {
            Storage::disk('local')->deleteDirectory('framework/cache');
            $this->info('✓ Storage cache cleared');
        } else {
            $this->info('✓ Storage cache directory not found');
        }
    }
    
    /**
     * Clear bootstrap cache
     */
    private function clearBootstrapCache()
    {
        $this->info('Clearing bootstrap cache...');
        if (file_exists(storage_path('framework/cache'))) {
            $this->deleteDirectory(storage_path('framework/cache'));
            $this->info('✓ Bootstrap cache cleared');
        } else {
            $this->info('✓ Bootstrap cache directory not found');
        }
    }
    
    /**
     * Clear session files
     */
    private function clearSessionFiles()
    {
        $this->info('Clearing session files...');
        if (config('session.driver') === 'file') {
            $this->deleteDirectory(storage_path('framework/sessions'));
            $this->info('✓ Session files cleared');
        } else {
            $this->info('✓ Sessions not using file driver');
        }
    }
    
    /**
     * Helper method to delete directory recursively
     */
    private function deleteDirectory($path)
    {
        if (!is_dir($path)) {
            return;
        }
        
        $files = array_diff(scandir($path), ['.', '..']);
        
        foreach ($files as $file) {
            $filePath = $path . DIRECTORY_SEPARATOR . $file;
            
            if (is_dir($filePath)) {
                $this->deleteDirectory($filePath);
            } else {
                unlink($filePath);
            }
        }
        
        rmdir($path);
    }
} 