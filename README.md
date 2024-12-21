<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Analisa Sistem
1. Ada 2 role user yaitu admin dan client
2. Costume bisa memiliki banyak category
3. 1 judul costume bisa lebih dari 1 dibedakan dengan code cotume
4. List costume bisa dilihat tanpa harus login
5. Bisa melakukan pencarian costume melalui judul atau category costume
6. Untuk meminjam costume harus membuat akun sebagai client
7. Untuk membuat akun sebagai client harus di approve oleh admin terlebih dahulu agar bisa login (cek validasi secara manual)
8. Admin bisa menambah data costume, category, dan assign category ke costume
9. Client hanya bisa meminjam maksimal 3 costume (jika 3 costume belum di kembalikan semua)
10. Client hanya bisa meminjam maksimal 3 hari, jika lebih akan terkena denda
11. Admin bisa melihat list costume yang sedang dipinjam
12. Jika costume sedang dipinjam maka stock menjadi kosong, jika sudah dikembalikan maka stock akan menjadi available kembali
13. Admin bisa melihat client yang terkena denda lalu melihat detail peminjamannya
14. Admin bisa melihat log peminjaman costume
