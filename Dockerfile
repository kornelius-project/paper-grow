FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd pdo_pgsql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . /app

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install NPM dependencies and build
RUN npm install
RUN npm run build

# Expose port (Render uses port 10000 by default for web services)
EXPOSE 10000

# Start command (menggunakan artisan serve agar lebih mudah tanpa nginx setup)
CMD php artisan serve --host=0.0.0.0 --port=10000
