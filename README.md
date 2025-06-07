# 🌾 AgriSoko

A Laravel-powered digital platform to empower small-scale farmers with real-time agricultural information, loans, and market data through USSD, SMS, and M-PESA integrations.

![AgriSoko Banner](https://via.placeholder.com/1000x300?text=AgriSoko+%7C+Empowering+Farming+Digitally)

---

## 🚀 Features

- 📲 **USSD Support** — Market prices, weather, agri-tips, and loan application
- 💰 **M-PESA STK Push** — Secure mobile money transactions (via Safaricom)
- ✉️ **SMS Notifications** — Instant feedback via Africa’s Talking
- 📊 **Admin Dashboard** — Real-time analytics on loan applications
- 🔒 Secure, scalable, and mobile-first Laravel backend

---

## 📦 Tech Stack

| Layer       | Technology               |
|------------|---------------------------|
| Backend     | Laravel (PHP)            |
| Database    | MySQL                    |
| USSD & SMS  | Africa's Talking API     |
| Payments    | Safaricom M-PESA API     |
| Admin Panel | Laravel Blade / Vue.js   |
| Server      | Laragon (for Windows)    |

---

## 📁 Project Structure

```
agrisoko/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── USSDController.php
│           ├── SMSController.php
│           ├── MpesaController.php
│           └── AdminController.php
├── routes/
│   └── api.php
├── database/
│   └── migrations/
├── .env
└── README.md
```

---

## ⚙️ Setup Instructions (with Laragon)

### 🖥 Prerequisites

- [Laragon](https://laragon.org/) (or XAMPP with Composer & PHP 8+)
- Composer
- PHP 8.x
- MySQL
- Africa’s Talking & Safaricom credentials

### 🛠 Installation

```bash
# Step into your Laragon www directory
cd C:\laragon\www

# Create Laravel project
composer create-project laravel/laravel agrisoko

# OR if cloning
git clone https://github.com/your-repo/agrisoko.git
cd agrisoko
composer install

# Environment config
cp .env.example .env
php artisan key:generate

# Create the database (via phpMyAdmin)
# Then edit .env to match DB name

php artisan migrate
php artisan serve
```

---

## 🔐 Environment Variables (.env)

```env
APP_NAME=AgriSoko
APP_URL=http://agrisoko.test

DB_DATABASE=agrisoko
DB_USERNAME=root
DB_PASSWORD=

AFRICASTALKING_USERNAME=your_username
AFRICASTALKING_API_KEY=your_api_key

MPESA_CONSUMER_KEY=your_consumer_key
MPESA_CONSUMER_SECRET=your_consumer_secret
MPESA_SHORTCODE=174379
MPESA_PASSKEY=your_passkey
```

---

## 📡 API Endpoints

| Endpoint               | Method | Description               |
|------------------------|--------|---------------------------|
| `/api/ussd`            | POST   | USSD interactions         |
| `/api/sms/send`        | POST   | Send SMS via AT           |
| `/api/mpesa/stkpush`   | POST   | Initiate M-PESA STK push  |
| `/api/admin/dashboard` | GET    | View loan statistics      |

---

## 📷 Screenshots

>  interface or screenshots .

---

## 📖 License

This project is open-source and free to use under the [MIT License](LICENSE).

---

## 🤝 Contribution & Ideas

Feel free to fork, raise issues, or suggest new features! Let's empower farmers together 🚜🌍

---

## 🙏 Acknowledgments

- [Africa's Talking](https://africastalking.com/)
- [Safaricom Developer Portal](https://developer.safaricom.co.ke/)
- [Laravel](https://laravel.com/)
