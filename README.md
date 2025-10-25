## 🚀 Installation Guide

### Prerequisites

Pastikan sistem Anda sudah terinstall:
- PHP >= 8.3.6
- Composer
- MySQL >= 5.7
- Git

### Step 1: Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/bookstore-backend.git
cd bookstore-backend
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Environment Configuration

```bash
# Copy file .env.example
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Database Setup

Buat database baru di MySQL:

```sql
CREATE DATABASE bookstore_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Edit file `.env` sesuai konfigurasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookstore_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 5: Run Migrations

```bash
php artisan migrate
```

### Step 6: Seed Database

**Perhatian**: Proses seeding akan memakan waktu **5-10 menit** karena membuat 600,000+ records.

```bash
php artisan db:seed
```

Output yang akan Anda lihat:
```
Creating 100,000 books...
 100/100 [============================] 100%
100,000 Books created

Creating 500,000 ratings...
 500/500 [============================] 100%
500,000 Ratings created

=================================
All data seeded successfully!
=================================
```

### Step 7: Start Development Server

```bash
php artisan serve
```
