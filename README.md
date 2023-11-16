
# Merdeka Belajar Kampus Merdeka (MBKM) - Politeknik Negeri Banyuwangi 🧑🏻‍🎓

Selamat Datang di Website MBKM Politeknik Negeri Banyuwangi. Website ini dirancang untuk mendukung Program MBKM dengan menyediakan lowongan magang di Perusahaan terbaik bagi Mahasiswa Poliwangi. Pilihlah tempat magang yang sesuai dengan matakuliah yang kamu ambil dan bentuk masa depan yang sesuai dengan aspirasi kariermu. VOKASI BISA!!!


## Preview Landing Page of MBKM Web App 🚀

![MBKM Landing Page 1](https://i.postimg.cc/HsKcDKFD/mbkm-1.png)

![MBKM Landing Page 2](https://i.postimg.cc/QMZFV7Xf/mbkm-2.png)

![MBKM Landing Page 3](https://i.postimg.cc/t4x1XkH1/mbkm-3.png)


## Installation Web App 📌

- Lakukan Kloning Aplikasi ke Lokal Proyek Anda :
```bash
  git clone https://github.com/tefamagang2023/mbkm-poliwangi

```

Install Paket :
- Instal Paket Composer :
```bash
  composer install

```
- Instal Paket Spatie 1 :
```bash
  composer require spatie/laravel-permission

```
- Instal Paket Spatie 2 :
```bash
  composer require laravelcollective/html

```
- Instal Paket Maatwebsite Excel : 
```bash
  composer require maatwebsite/excel ^3.1.4

```
- Instal Paket PHP Office : 
```bash
  composer require phpoffice/phpspreadsheet

```
- Instal Paket Laravolt Indonesia : 
```bash
  composer require laravolt/indonesia

```
- Instal Paket Sweet Alert : 
```bash
  composer require realrashid/sweet-alert

```
- Instal Paket Livewire 2.1 : 
```bash
  composer require livewire/livewire:^2.1

```

Public Vendor :
- Publish Vendor Spatie : 
```bash
  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

```
- Publish Vendor Laravolt Indonesia :
```bash
  php artisan vendor:publish --provider="Laravolt\Indonesia\ServiceProvider"

```
- Publish Vendor Sweet Alert : 
```bash
  php artisan sweetalert:publish

```
- Publish Vendor Livewire 2.1 : 
```bash
  php artisan livewire:publish --assets

```

Migrate Dan Seeder :
- Ubah File .env dan Sesuaikan Dengan Database Anda :
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=mbkm_poliwangi   

```
- Jalankan Migration :
```bash
  php artisan migrate:fresh

```
- Jalankan Seeder Spatie Permission :
```bash
  php artisan permission:create-permission-routes

```
- Jalankan Seeder Laravolt Indonesia :
```bash
  php artisan laravolt:Indonesia:seed

```
- Jalankan Seeder Project :
```bash
  php artisan db:seed

```
- Jalankan Storage Link :
```bash
  php artisan storage:link

```
- Runing app
```bash
  php artisan serve

```
## Support and Thanks ✨

For support credit, please email owner of this project : magangti2023@gmail.com. Thanks to our developper by TEFA Team 🎉🎉🎉

