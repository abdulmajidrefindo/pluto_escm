<p align="center"><img src="https://user-images.githubusercontent.com/28534765/204599469-f5ef98ee-8b87-48e8-bdd1-a0d0eca48bdc.png" width="400" alt="Pluto Logo"></p>


## Cara Install
https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/

Prolog
1. Pastikan sudah menginstall xampp dan membuka folder htdoc di dalam C:xampp/
2. Clone projek ini, ketikkan kode berikut di cmd/command promt: git clone linktogithubrepo.com/ projectName

Main Story
1. Download dan install https://getcomposer.org/Composer-Setup.exe
2. Download dan isntall https://nodejs.org/dist/v18.16.1/node-v18.16.1-x64.msi
3. Clone https://github.com/abdulmajidrefindo/pluto_escm.git ke folder htdoc
4. Masuk kedalam folder project, buka cmd, run "composer install"
5. Pada cmd, run "npm install"
6. Masih di cmd, run "cp .env.example .env"
7. Buka phpmyadmin, buat database baru.
8. Buka file .env, lalu edit isinya sesuai dengan database yang telah dibuat, pada bagian:
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nama_database
	DB_USERNAME=root
	DB_PASSWORD=

9. buka cmd lagi, lalu run ini, "php artisan key:generate"
10. Setelah itu lakukan migrasi database dengan run perintah berikut di cmd,
	"php artisan migrate"
11. Lalu isi database dengan data mockup dengan run perintah berikut,
	"php artisan db:seed"
12. Setelah semua berhasil dijalankan, run project dengan menjalankan perintah berikut di cmd, 
	"php artisan serve"
