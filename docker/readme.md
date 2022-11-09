# Development

This is a quick scaffold with `docker-compose` to get
all the services that volt requires up and running.

You can use this setup or roll your own, manages the following:

- php-fpm
- nginx
- mysql
- redis
- meilisearch

## Usage

Copy the `.env.example` to `.env` and then bring the
system up with 

```bash
docker compose up -d
```
