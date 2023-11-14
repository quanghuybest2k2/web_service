# 1. Lỗi khi chạy http://localhost/soap/server.php

`[Fatal error: Uncaught Error: Class 'SoapServer' not found in C:\xampp\htdocs\soap\server.php:12 Stack trace: #0 {main} thrown in C:\xampp\htdocs\soap\server.php on line 12]`

## Lỗi trên do chưa enable gói SOAP. Cách sửa:

`[a) Locate your php.ini file. This is normally under your <php_home> folder (for example, C:/xampp/php).`

`b) Search for and uncomment the line that says ;extension=soap, by removing the first ; character, to make it looks like extension=soap; and save php.ini.`

`c) Then restart your server (stop and start XAMPP]`
