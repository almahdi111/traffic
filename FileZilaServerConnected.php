<?php 
$ftpHost   = 'server4.streamserver24.com';
$ftpUsername = '';
$ftpPassword = '*****';

// open an FTP connection
$ftp = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");

// login to FTP server
$ftpLogin = ftp_login($ftp, $ftpUsername, $ftpPassword);

ftp_mlsd();
ftp_get();
ftp_delete($ftp, $file);
ftp_close($ftp);

?>