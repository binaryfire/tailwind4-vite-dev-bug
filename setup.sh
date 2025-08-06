#!/bin/bash

# Copy .env.example to .env if .env doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

# Create database directory if it doesn't exist
mkdir -p database

# Create SQLite database file if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    echo "Creating SQLite database file..."
    touch database/database.sqlite
fi

# Install PHP dependencies
echo "Installing PHP dependencies..."
composer install

# Install Node.js dependencies
echo "Installing Node.js dependencies..."
npm install

# Build assets using Vite
echo "Building assets using Vite..."
npm run build

# Link storage directory
echo "Linking storage directory..."
php artisan storage:link

# Generate application key
echo "Generating application key..."
php artisan key:generate

# Run migrations with seeding
echo "Running database migrations and seeding..."
php artisan migrate:fresh --seed
