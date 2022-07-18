<?php
//set_time_limit(0);
class FTPConection
{
    
   public static ftpHost   = 'ftp.marketplace.envato.com';
   public static ftpUsername = 'K_Media2020';
   public static ftpPassword = 'hOtP8r05zsnBrbgZG1kMzC1jKJ0pGoiQ';
    // open an FTP connection
    public static ftp = ftp_ssl_connect($ftpHost); //or die("Couldn't connect to $ftpHost");
    
    // login to FTP server
    $ftpLogin = ftp_login($ftp, $ftpUsername, $ftpPassword);
    
    // if($ftpLogin)
    // echo "connected correct";
    
    ftp_pasv($ftp, true);
   
}
 ?>