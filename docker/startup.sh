#!/bin/sh

# Exit immediately if a command exits with a non-zero status
set -e

echo "Running startup tasks..."

# Optimize configurations, routes, and views for production
echo "Caching configurations, routes, and views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Seed database (uses updateOrCreate, safe to re-run)
echo "Seeding database..."
php artisan db:seed --force

# Create storage symlink
echo "Creating storage symlink..."
php artisan storage:link --force 2>/dev/null || true

echo "Startup tasks completed successfully!"
