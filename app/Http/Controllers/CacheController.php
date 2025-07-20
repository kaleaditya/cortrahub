<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CacheController extends Controller
{
    /**
     * Clear all caches
     */
    public function clearAll()
    {
        try {
            $results = [];
            
            // Clear config cache
            Artisan::call('config:clear');
            $results['config'] = 'Config cache cleared successfully';
            
            // Clear route cache
            Artisan::call('route:clear');
            $results['route'] = 'Route cache cleared successfully';
            
            // Clear view cache
            Artisan::call('view:clear');
            $results['view'] = 'View cache cleared successfully';
            
            // Clear application cache
            Artisan::call('cache:clear');
            $results['cache'] = 'Application cache cleared successfully';
            
            // Clear compiled class files
            Artisan::call('clear-compiled');
            $results['compiled'] = 'Compiled class files cleared successfully';
            
            // Clear application cache using Cache facade
            Cache::flush();
            $results['cache_facade'] = 'Cache facade cleared successfully';
            
            // Clear storage cache if exists
            if (Storage::disk('local')->exists('framework/cache')) {
                Storage::disk('local')->deleteDirectory('framework/cache');
                $results['storage_cache'] = 'Storage cache cleared successfully';
            }
            
            // Clear bootstrap cache
            if (file_exists(storage_path('framework/cache'))) {
                $this->deleteDirectory(storage_path('framework/cache'));
                $results['bootstrap_cache'] = 'Bootstrap cache cleared successfully';
            }
            
            // Clear session files if using file driver
            if (config('session.driver') === 'file') {
                $this->deleteDirectory(storage_path('framework/sessions'));
                $results['sessions'] = 'Session files cleared successfully';
            }
            
            return response()->json([
                'success' => true,
                'message' => 'All caches cleared successfully',
                'results' => $results
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error clearing caches: ' . $e->getMessage(),
                'results' => $results ?? []
            ], 500);
        }
    }
    
    /**
     * Clear specific cache type
     */
    public function clearSpecific(Request $request)
    {
        $type = $request->input('type');
        
        try {
            switch ($type) {
                case 'config':
                    Artisan::call('config:clear');
                    $message = 'Config cache cleared successfully';
                    break;
                    
                case 'route':
                    Artisan::call('route:clear');
                    $message = 'Route cache cleared successfully';
                    break;
                    
                case 'view':
                    Artisan::call('view:clear');
                    $message = 'View cache cleared successfully';
                    break;
                    
                case 'cache':
                    Artisan::call('cache:clear');
                    $message = 'Application cache cleared successfully';
                    break;
                    
                case 'compiled':
                    Artisan::call('clear-compiled');
                    $message = 'Compiled class files cleared successfully';
                    break;
                    
                default:
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid cache type specified'
                    ], 400);
            }
            
            return response()->json([
                'success' => true,
                'message' => $message
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error clearing cache: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Get cache status
     */
    public function status()
    {
        $status = [
            'config_cache_exists' => file_exists(storage_path('framework/cache/config.php')),
            'route_cache_exists' => file_exists(storage_path('framework/cache/routes.php')),
            'view_cache_exists' => is_dir(storage_path('framework/views')),
            'cache_size' => $this->getDirectorySize(storage_path('framework/cache')),
            'sessions_size' => $this->getDirectorySize(storage_path('framework/sessions')),
        ];
        
        return response()->json([
            'success' => true,
            'status' => $status
        ]);
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
    
    /**
     * Helper method to get directory size
     */
    private function getDirectorySize($path)
    {
        if (!is_dir($path)) {
            return 0;
        }
        
        $size = 0;
        $files = array_diff(scandir($path), ['.', '..']);
        
        foreach ($files as $file) {
            $filePath = $path . DIRECTORY_SEPARATOR . $file;
            
            if (is_dir($filePath)) {
                $size += $this->getDirectorySize($filePath);
            } else {
                $size += filesize($filePath);
            }
        }
        
        return $size;
    }
} 