FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application
COPY . .

# Create .env file from build args
RUN echo "APP_NAME=SamusQuoteOfTheMinute" > .env && \
    echo "APP_ENV=production" >> .env && \
    echo "APP_KEY={{APP_KEY}}" >> .env && \
    echo "APP_DEBUG=false" >> .env && \
    echo "APP_URL=https://samusquoteoftheminute-192358317681.us-central1.run.app" >> .env && \
    echo "LOG_CHANNEL=stack" >> .env && \
    echo "LOG_LEVEL=debug" >> .env && \
    echo "DB_CONNECTION=mysql" >> .env && \
    echo "DB_HOST=34.41.161.243" >> .env && \
    echo "DB_PORT=3306" >> .env && \
    echo "DB_DATABASE=samusquoteoftheminute" >> .env && \
    echo "DB_USERNAME=servicosimples" >> .env && \
    echo "DB_PASSWORD=servicosimples123" >> .env && \
    echo "BROADCAST_DRIVER=log" >> .env && \
    echo "CACHE_DRIVER=file" >> .env && \
    echo "QUEUE_CONNECTION=sync" >> .env && \
    echo "SESSION_DRIVER=file" >> .env

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate key
RUN php artisan key:generate --force

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Copy entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose port
EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]
