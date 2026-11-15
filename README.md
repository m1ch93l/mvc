## PHP and HTMX with MVC Approach

This project mvc is a PHP project that uses the HTMX library to build web applications with a MVC like approach.

The code follows a PSR-4 style, framework-free MVC layout:

```
app/            application code (Controllers, Models, Core)
bootstrap/      boots autoloading, config and the container
config/         configuration arrays
public/         web root: front controller + assets
resources/views layouts, pages and partials
routes/         route definitions
storage/logs/   application logs
```

# Requirements

- PHP **8.4** or newer
- PDO MySQL extension
- Apache with `mod_rewrite` (for the `.htaccess` front-controller rewriting)

# Installation

To install the mvc project, you can run the following command:

1. Clone the repository:
   ```sh
   git clone https://github.com/m1ch93l/mvc.git
   ```
2. Navigate to the project directory:
   ```sh
   cd mvc
   ```
3. Install dependencies (optional — a fallback autoloader is included):
   ```sh
   composer install
   ```
4. Create your environment file and set your database credentials:
   ```sh
   cp .env.example .env
   ```
5. Import the database schema (`mvc.sql`) and seed the `pages` table.
6. Start a local server:

   - With PHP's built-in server (document root **must** be `public/`):
     ```sh
     php -S localhost:8000 -t public
     ```
   - Or use Herd, XAMPP, Laragon or ServBay and point the site's document root to `public/`.
   - Access the application via your web browser, e.g. `http://localhost:8000` or `http://mvc.test`.

Pages are routed through the `?page=` query string, defined in `routes/web.php`:

- `?page=home`
- `?page=about`

## Adding a page

1. Add the route in `routes/web.php`.
2. Add a controller in `app/Controllers/`.
3. Add the template in `resources/views/pages/`.

## License

The mvc software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
