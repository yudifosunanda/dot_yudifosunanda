# dot_yudifosunanda

Panduan Penggunaan

Set up awal
-------------------

1.Lakukan Pull request dari repository ini.<br>
2.Masuk ke folder Project melalui command prompt.<br>
3.Jalankan perintah <b>Composer install</b> pada command prompt untuk menginstall semua yang di butuhkan.<br>

Set up Database
-------------------
1.Copy file .env.example dan rename menjadi .env .<br>
2.Buatlah sebuah Database sesuai dengan yang tertera pada file .env .<br>
3.Jalankan perintah <b>php artisan migrate</b> pada command prompt untuk memasukan semua table yang ada ke dalam Database.<br>
4.Jalankan perintah <b>php artisan db:seed --class=UserSeeder</b> pada command prompt untuk memasukan dummy data user ke table users<br>
5.Setelah selesai jalankan perintah <b>php artisan key:generate</b> pada command prompt untuk menggenerate key project.<br>

Cara penggunaan sistem
-------------------
1.Jalankan <b>start /b php artisan serve</b> untuk menjalankan project.<br>
2.Untuk melakukan <b> Fetching Data dari Raja ongkir ke dalam Database </b> jalankan command <b>php artisan fetching_raja_ongkir_command</b>.<br>
3.Untuk mengakses endpoint untuk mengambil data Provinsi & Kota, terlebih dahulu harus melakukan login pada <b>[POST] /api/login</b> dengan:<br>
  Email:admin@gmail.com<br>
  Password:admin<br>
4.Setelah login baru lah endpoint <b>[GET] /search/provinces?id={province_id}</b> dan <b>[GET] /search/cities?id={city_id}</b> bisa di akses.<br>
5.Untuk melakukan <b>swapable implementation</b>, anda dapat mengganti konfigurasinya pada <b>config/type_fetch.php</b>. Ganti value dari <b>type</b> ke metode fetching yang di inginkan yaitu <b>database</b> untuk mengambil data dari DATABASE & <b>direct_api</b> untuk mengambil data langsung dari Raja Ongkir.

Terimakasih.


