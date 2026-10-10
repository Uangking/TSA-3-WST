# IT0049 TFA3 — Forms, Validation, and File Upload

**Developer:** King Gee

This project is a small Point-of-Sale accounts application built with CodeIgniter 4. It lists customer and user accounts and includes beginner-friendly forms for adding and editing records. User profile images can be uploaded from the edit-user form.

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL with the `mysqli` PHP extension
- PHP `intl`, `mbstring`, `fileinfo`, and `gd` extensions

## Setup

1. Install the PHP requirements above and start MySQL.
2. Install the PHP dependencies from the project folder:

   ```bash
   composer install
   ```

3. Create a new, empty MySQL database for this project. The provided export creates/uses a database named `pos_db` and contains the original five customer and five user records:

   ```bash
   mysql -u your_local_mysql_user -p < database/pos_db_tfa3.sql
   ```

   Use this export only with a fresh database. It does not drop existing tables.

4. Copy the `env` file to `.env`. Set the local app URL and database settings in `.env`:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   database.default.hostname = 127.0.0.1
   database.default.database = pos_db
   database.default.username = your_local_mysql_user
   database.default.password = your_local_mysql_password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

   Replace the example MySQL username and password with your own local settings. Keep `.env` private and do not commit it.

5. Start the application:

   ```bash
   php spark serve
   ```

   Open `http://localhost:8080` in a browser.

## Available pages and routes

- `GET /` — Home
- `GET /about` — About
- `GET /customers` — Customer Accounts
- `GET|POST /customers/new` — Add a customer
- `GET|POST /customers/edit/{id}` — Edit a customer
- `GET /users` — User Accounts
- `GET|POST /users/new` — Add a user
- `GET|POST /users/edit/{id}` — Edit a user and optionally upload an avatar

The forms use CodeIgniter validation and CSRF protection. Customer names, emails, and optional phone numbers are validated before saving. Usernames are required, limited to 50 characters, and must be unique; editing a user may keep that user's existing username. User creation and editing do not change an account's ID or creation date.

## Avatar uploads

Avatars can be uploaded only while editing a user. Upload a genuine JPG/JPEG or PNG image no larger than 2 MB. CodeIgniter validates the upload and its image type, then the image service resizes it proportionally to fit within 300 by 300 pixels. A unique filename is saved under `public/uploads/avatars/`; only that filename is stored in the database. Leaving the avatar field empty keeps the existing avatar. The user list displays a 60 by 60 avatar when its file exists and a local placeholder otherwise.

## GitHub

Project repository: [https://github.com/Uangking/TSA-3-WST](https://github.com/Uangking/TSA-3-WST)
