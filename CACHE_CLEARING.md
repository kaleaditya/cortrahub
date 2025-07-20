# Cache Clearing System

This Laravel application includes a comprehensive cache clearing system that allows you to clear various types of caches through both web interface and command line.

## Features

- Clear all caches at once
- Clear specific cache types individually
- Web-based interface for cache management
- Command-line interface for cache clearing
- Cache status monitoring
- Secure access control

## Available Routes

### Public Routes (No Authentication Required)
- `GET /cache/clear-all` - Clear all caches
- `POST /cache/clear-specific` - Clear specific cache type
- `GET /cache/status` - Get cache status

### Protected Routes (Authentication Required)
- `GET /admin/cache` - Cache management dashboard
- `GET /admin/cache/clear-all` - Clear all caches (admin)
- `POST /admin/cache/clear-specific` - Clear specific cache type (admin)
- `GET /admin/cache/status` - Get cache status (admin)

## Cache Types

The system can clear the following cache types:

1. **Config Cache** - Configuration files cache
2. **Route Cache** - Route definitions cache
3. **View Cache** - Compiled Blade templates
4. **Application Cache** - General application cache
5. **Compiled Files** - Compiled class files
6. **Cache Facade** - Cache facade data
7. **Storage Cache** - Storage-based cache
8. **Bootstrap Cache** - Bootstrap cache files
9. **Session Files** - File-based session data

## Usage

### Web Interface

1. Navigate to `/admin/cache` (requires authentication)
2. View current cache status
3. Click "Clear All Caches" to clear everything
4. Or use individual buttons to clear specific cache types

### Command Line

#### Clear All Caches
```bash
php artisan cache:clear-all
```

#### Clear Specific Cache Type
```bash
php artisan cache:clear-all --type=config
php artisan cache:clear-all --type=route
php artisan cache:clear-all --type=view
php artisan cache:clear-all --type=cache
php artisan cache:clear-all --type=compiled
```

### API Endpoints

#### Clear All Caches
```bash
curl -X GET http://your-domain.com/cache/clear-all
```

#### Clear Specific Cache
```bash
curl -X POST http://your-domain.com/cache/clear-specific \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "type=config"
```

#### Get Cache Status
```bash
curl -X GET http://your-domain.com/cache/status
```

## Response Format

All endpoints return JSON responses:

### Success Response
```json
{
    "success": true,
    "message": "All caches cleared successfully",
    "results": {
        "config": "Config cache cleared successfully",
        "route": "Route cache cleared successfully",
        "view": "View cache cleared successfully",
        "cache": "Application cache cleared successfully",
        "compiled": "Compiled class files cleared successfully",
        "cache_facade": "Cache facade cleared successfully",
        "storage_cache": "Storage cache cleared successfully",
        "bootstrap_cache": "Bootstrap cache cleared successfully",
        "sessions": "Session files cleared successfully"
    }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error clearing caches: [error details]",
    "results": {}
}
```

### Status Response
```json
{
    "success": true,
    "status": {
        "config_cache_exists": true,
        "route_cache_exists": false,
        "view_cache_exists": true,
        "cache_size": 1024000,
        "sessions_size": 512000
    }
}
```

## Security Considerations

- Protected routes require authentication
- CSRF protection is enabled for POST requests
- All operations are logged
- Error handling prevents sensitive information leakage

## Troubleshooting

### Common Issues

1. **Permission Denied**: Ensure the web server has write permissions to the storage directory
2. **Cache Not Clearing**: Some caches may be stored in external services (Redis, Memcached)
3. **Session Issues**: Clearing session files will log out all users

### Manual Cache Clearing

If the automated system fails, you can manually clear caches:

```bash
# Clear config cache
php artisan config:clear

# Clear route cache
php artisan route:clear

# Clear view cache
php artisan view:clear

# Clear application cache
php artisan cache:clear

# Clear compiled files
php artisan clear-compiled
```

## Files Created/Modified

- `app/Http/Controllers/CacheController.php` - Main controller
- `app/Console/Commands/ClearAllCaches.php` - Artisan command
- `resources/views/cache/index.blade.php` - Web interface
- `routes/web.php` - Route definitions
- `CACHE_CLEARING.md` - This documentation

## Dependencies

- Laravel Framework
- Bootstrap (for UI)
- Font Awesome (for icons)
- jQuery (for AJAX requests)

## Support

For issues or questions regarding the cache clearing system, please check the Laravel documentation or contact the development team. 