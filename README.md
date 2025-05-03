# ELK Stack with Laravel Integration

This project sets up a complete ELK (Elasticsearch, Logstash, Kibana) stack with Filebeat for log collection, integrated with a Laravel application. The stack is containerized using Docker Compose for easy deployment and management.

## Components

- **Elasticsearch**: Search and analytics engine
- **Logstash**: Data processing pipeline
- **Kibana**: Data visualization dashboard
- **Filebeat**: Lightweight log shipper
- **Redis**: Used as a buffer for logs
- **Laravel**: PHP web application framework
- **Nginx**: Web server

## Architecture

The logging pipeline works as follows:
1. Filebeat collects logs from Docker containers
2. Logs are sent to Logstash Agent
3. Logstash Agent processes logs and sends them to Redis
4. Logstash Central reads from Redis and sends to Elasticsearch
5. Kibana visualizes the data stored in Elasticsearch

## Prerequisites

- Docker
- Docker Compose
- Git

## Configuration

1. Create a `.env` file with the following variable:
   ```
   ELK_VERSION=8.13.4
   ```

2. The project uses the following ports:
   - Elasticsearch: 9200
   - Kibana: 5601
   - Laravel/Nginx: 8000
   - Logstash Agent: 5044

## Getting Started

1. Clone the repository
2. Create your Laravel application in the `laravel` directory
3. Run the following command to start all services:
   ```bash
   docker-compose up -d
   ```

## Accessing Services

- Laravel Application: http://localhost:8000
- Kibana Dashboard: http://localhost:5601
- Elasticsearch API: http://localhost:9200

## Logging Configuration

- Filebeat is configured to collect logs from Docker containers
- Logstash processes logs with the following features:
  - Unicode decoding
  - Timestamp and log level extraction
  - Filtering of unwanted messages
- Logs are stored in Elasticsearch with daily indices (format: laravel-logs-YYYY.MM.dd)

## Directory Structure

```
.
├── docker-compose.yml
├── Dockerfile
├── default.conf
├── .env
├── filebeat/
│   └── filebeat.yml
├── logstash/
│   ├── logstash_agent.conf
│   └── logstash_center.conf
└── laravel/
    └── (Your Laravel application)
```

## Maintenance

- To stop all services:
  ```bash
  docker-compose down
  ```

- To view logs:
  ```bash
  docker-compose logs -f
  ```

## Security Notes

- Elasticsearch security is currently disabled (xpack.security.enabled=false)
- Consider enabling security features for production use
- Filebeat runs as root to access Docker logs
- Redis is used as an internal buffer and not exposed externally

## Contributing

Feel free to submit issues and enhancement requests.
