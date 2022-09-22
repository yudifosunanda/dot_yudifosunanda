# dot_yudifosunanda

Panduan Penggunaan

Set up awal
-------------------

1.Lakukan Pull request dari repository ini.
2.Masuk ke folder Project melalui command prompt.
3.Jalankan perintah <b>Composer install</b> pada command prompt untuk menginstall semua yang di butuhkan.

Set up Database
-------------------
1.Copy file .env.example dan rename menjadi .env .
2.Buatlah sebuah Database sesuai dengan yang tertera pada file .env .
3.Jalankan perintah <b>php artisan migrate</b> pada command prompt untuk memasukan semua table yang ada ke dalam Database.
4.Setelah selesai jalankan perintah <b>php artisan key:generate</b> pada command prompt untuk menggenerate key project.

Cara penggunaan sistem
-------------------
1.Jalankan <b>start /b php artisan serve</b> untuk menjalankan project.
2.Untuk melakukan <b> Fetching Data dari Raja ongkir ke dalam Database </b> jalankan perintah <b>php artisan fetching_raja_ongkir_command</b>.
3.Jalankan perintah <b>php artisan migrate</b> pada command prompt untuk memasukan semua table yang ada ke dalam Database.
4.Setelah selesai jalankan perintah <b>php artisan key:generate</b> pada command prompt untuk menggenerate key project.


