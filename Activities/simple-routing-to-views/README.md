# Simple Routing to Views Project

This is a simple Laravel project demonstrating basic routing and views using Laravel 11.x.

## Setup Instructions for GitHub Codespaces

1. Clone the repository and navigate to the project directory:
```bash
cd simple-routing-to-views
```

2. Install PHP dependencies:
```bash
composer install
```

3. Create and configure environment file:
```bash
cp .env.example .env
php artisan key:generate
```

4. Start the Laravel development server:
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

## Testing the Routes

This project includes two routes that demonstrate different ways of handling requests in Laravel:

### 1. Simple Route
- URL: `/hello`
- Description: Returns a simple text message "Hello, Laravel!"
- Access via: `https://<your-codespace-url>-8000.app.github.dev/hello`

### 2. Controller Route with View
- URL: `/greet`
- Description: Returns a blade view page with a greeting message
- Access via: `https://<your-codespace-url>-8000.app.github.dev/greet`

## Project Structure

- `routes/web.php` - Contains the route definitions
- `app/Http/Controllers/GreetController.php` - Contains the controller logic
- `resources/views/greet.blade.php` - Contains the blade template view

## Notes
- When running in GitHub Codespaces, make sure to use the Codespaces URL format: `https://<your-codespace-url>-8000.app.github.dev`
- The server must be started with `--host=0.0.0.0` to be accessible through GitHub Codespaces
