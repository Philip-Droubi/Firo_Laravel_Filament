<p align="center"><img src="/public/assets/logo/full_logo.png" alt="Firo Logo"></p>
<p align="center">Logo was generated on <a href="https://myfreelogomaker.com" target="_blank">myfreelogomaker</a></p>

# Firo, Filament Training Project

This project is a training exercise to learn and implement Filament in a Laravel application, which is a powerful admin panel and form builder for Laravel.

Firo is a Laravel-based project designed to serve as the admin panel for a small freelancing platform. This project leverages Filament, a powerful admin panel and form builder for Laravel, to manage and oversee various aspects of the platform. While Firo focuses solely on the admin panel and does not include API functionalities, it provides a solid foundation for managing the platform’s data and operations.

## Table of Contents

- [Key Objectives](#key-objectives)
- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [License](#license)

## Key Objectives

- Admin Panel Development: Create a comprehensive admin panel using Filament to manage users, projects, and other resources.
- Learn Filament: Gain hands-on experience with Filament and its integration into a Laravel application.
- Resource Management: Implement CRUD operations for efficient resource management within the admin panel.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/Philip-Droubi/Firo_Laravel_Filament.git
    ```
     ```bash
    cd Firo_Laravel_Filament
    ```
2. Run
   ```bash
   composer install
   ```
4. Copy `.env.example` to `.env`.

   Or you can type `copy .env.example .env` if you're using Windows command prompt or `cp .env.example .env` if you're using Ubuntu.
5. Run
   ```bash
   php artisan key:generate
   ```
7. Run
   ``` bash
   php artisan migrate:fresh --seed
    ```
11. Run
    ```bash
    php artisan storage:link
    ```

## Usage

To start the development server, run:
```bash
php artisan serve
```

## Features

## License

This project is licensed under the MIT License. See the LICENSE file for details.
