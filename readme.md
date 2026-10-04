## front-line-php.com

This repo contains the source code of https://front-line-php.com

## Deployment

This site runs on [Laravel Cloud](https://cloud.laravel.com). Every push to `main` is deployed automatically.

The static files in `public` are served from a public Laravel Cloud bucket, so requests for them never wake the app. The build command ends with `php artisan upload-assets-to-bucket`, which uploads them under a versioned prefix with a long `Cache-Control` header and points `asset()` and `mix()` to that prefix. The bucket is configured with the `ASSETS_BUCKET`, `ASSETS_BUCKET_ENDPOINT`, `ASSETS_BUCKET_URL`, `ASSETS_BUCKET_ACCESS_KEY_ID` and `ASSETS_BUCKET_SECRET_ACCESS_KEY` environment variables. Without them, the app serves its own assets.
