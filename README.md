# Raffle App

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/livewire-%234e56a6.svg?style=for-the-badge&logo=livewire&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/alpinejs-%238BC0D0.svg?style=for-the-badge&logo=alpine.js&logoColor=white)
![Vite](https://img.shields.io/badge/vite-%23646CFF.svg?style=for-the-badge&logo=vite&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
![Pest](https://img.shields.io/badge/pest-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

A simple application to manage raffles and applicants. The main goal is to learn how to use Livewire and its features.

## Features

- **Raffle Management**: Create and manage multiple raffles.
- **Applicant Registration**: Users can sign up for raffles easily.
- **Live Draw System**:
    - Randomize winner selection.
    - Confetti animation for the winner reveal.
    - "Rolette" style effect for picking names.
- **Winner Tracking**: Keep a history of winners for each raffle.
- **Responsive Design**: Built with TailwindCSS for a seamless mobile and desktop experience.
- **Testing**: Comprehensive feature tests using Pest.

## Tech Stack

- **PHP**: 8.2+
- **Laravel**: 12.x
- **Livewire**: 3.x
- **TailwindCSS**: 4.x
- **Alpine.js**
- **Vite**
- **Database**: SQLite (default) / MySQL
- **Testing**: Pest PHP
- **Containerization**: Docker

## Installation

1. Clone the repository.
2. Run the setup script:

    ```bash
    composer run setup
    ```

## Usage

### Local Development

Start the development server:

```bash
composer run dev
```

### Docker

You can also run the application using Docker:

```bash
docker compose up -d --build
```

Access the application at [http://localhost:8000](http://localhost:8000).

## Running Tests

To run the automated tests:

```bash
composer run test
```

or

```bash
php artisan test
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
