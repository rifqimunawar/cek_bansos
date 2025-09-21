<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

![cekbansos](https://github.com/user-attachments/assets/efc08e12-cf6e-4fec-a57c-f5fc3feb7de5)


# 🧠 Sistem Prediksi Bantuan Sosial
![mesin lerning cek bansos](https://github.com/user-attachments/assets/979210ad-e121-4603-a46e-abae40067707)


Aplikasi prediksi kelayakan **bantuan sosial** berbasis data warga, menggunakan Laravel di sisi frontend dan Flask + Decision Tree di backend.

## 🔧 Teknologi yang Digunakan

- **Frontend:** Laravel 10+
- **Backend:** Flask (Python 3.10+) + scikit-learn
- **Model ML:** DecisionTreeClassifier
- **Penyimpanan Model:** `joblib`

## 📌 Fitur Utama

- Form input warga (status perkawinan, tanggal lahir, pendapatan, pendidikan, pekerjaan)
- Validasi input Laravel
- Hitung usia otomatis dari tanggal lahir
- Komunikasi Laravel → Flask melalui HTTP POST
- Model prediksi memutuskan apakah layak menerima bantuan sosial
- Hasil prediksi ditampilkan di Laravel (`Ya` / `Tidak`)

![image](https://github.com/user-attachments/assets/7611b78e-bbdc-4b04-9f21-45e4afd38800)

## 📥 Instalasi

### 1️⃣ Clone Repository
`git clone https://github.com/rifqimunawar/cek_bansos.git`
#### Masuk ke repository
`cd cek_bansos`

### 2️⃣ Menjalankan Backend (Flask)

Buka terminal pertama:
`cd flask_cek_bansos`

jalankan python
`python app.py`

Flask akan berjalan di http://127.0.0.1:5000 (default).

### 3️⃣ Menjalankan Frontend (Laravel)

Buka terminal lain:

```bash
cd laravel_cek_bansos
rm composer.lock
mkdir -p storage/framework/views
chmod -R 775 storage
php artisan config:clear 
php artisan cache:clear 
php artisan view:clear
composer install --optimize-autoloader
cp .env.example .env
php artisan migrate
php artisan migrate:refresh --seed
php artisan serve
```


### 🔑 Login Aplikasi
```bash
Username : admin
Password : admin
```






