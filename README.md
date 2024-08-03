# Email Sending API

## Requirements

- PHP 7.4+
- Composer
- Docker
- Docker-Compose

## Setup

1. Clone the repository and navigate to the project directory.
2. Create the `.env` file and set the necessary environment variables:

System Design
The system consists of a REST API built in PHP without any framework. The API sends emails using PHPMailer and stores email data in a PostgreSQL database. OAuth2 is used for authentication. Docker and Docker-Compose are used for containerization.

The following components are included:

src/index.php: Main API endpoint.
src/EmailSender.php: Handles email sending.
src/Database.php: Handles database connections.
config/config.php: Configuration file.
Docker and Docker-Compose for containerization.
