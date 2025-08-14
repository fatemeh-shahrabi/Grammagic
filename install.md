<xaiArtifact artifact_id="8d20a2ed-fe1a-46b4-9820-66b311e87802" artifact_version_id="0eacbdbd-6296-44ea-b1a5-57c25c32adfc" title="install.md" contentType="text/markdown">

# Installation Guide for Grammagic

## Requirements
- PHP >= 8.0
- Composer
- SQLite
- Web server (e.g., Apache, Nginx)

## Setup Instructions

1. Download the project source code (do not clone from GitHub if sending as source code submission).
2. Navigate to the project directory.
3. Install dependencies:
   ```bash
   composer install
   ```

4. Create the SQLite database file:
   ```bash
   touch database/database.sqlite
   ```

5. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```

6. Update `.env`:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=./database/database.sqlite
   ```

7. Generate application key:
   ```bash
   php artisan key:generate
   ```

8. Run migrations:
   ```bash
   php artisan migrate
   ```

9. GPT API integration:
   To enable AI features, obtain your API key from Metis AI and add it to `.env`:
   ```
   OPENAI_API_KEY=your_metis_api_key
   ```
   Without this key, the application will still run and all UI/database functionality can be tested, but AI features will be disabled.

10. Start the local server:
    ```bash
    php artisan serve
    ```

Now the application should be accessible at `http://localhost:8000`.

</xaiArtifact>