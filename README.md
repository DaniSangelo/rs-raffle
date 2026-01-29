# Raffle App

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

## Installation

1. Clone the repository.
2. Run the setup script:

    ```bash
    composer run setup
    ```

## Usage

Start the development server:

```bash
composer run dev
```

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
