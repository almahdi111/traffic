<?php
//set_time_limit(0);
require_once("DatabaseOpreation.php");

$ftpHost='ftp.marketplace.envato.com';
$ftpUsername = 'K_Media2020';
$ftpPassword = 'hOtP8r05zsnBrbgZG1kMzC1jKJ0pGoiQ';
// open an FTP connection
$ftp = ftp_ssl_connect($ftpHost);// or die("Couldn't connect to $ftpHost");

// login to FTP server
$ftpLogin = ftp_login($ftp, $ftpUsername, $ftpPassword);

// if($ftpLogin)
// echo "connected correct";

ftp_pasv($ftp, true);

//  $file = '14202220202001022022010112565699.jpg';
// $remote_file = '14202220202001022022010112565699.jpg';

// if (ftp_put($ftp, $remote_file, $file, FTP_BINARY)) {
//     echo "successfully uploaded $file\n";
//    } else {
//     echo "There was a problem while uploading $file\n";
//    }

// function ftp_recursive_list($resource, $dir)
// {
//     $files = ftp_nlist($resource, $dir);
    
//     foreach ($files as $file)
//     {
//         if ($file == '.' || $file == '..') continue;

//         $fullPath = $file;
//         if (!empty($dir) && !in_array($dir, array('.', '/')))
//         {
//             $fullPath = $dir . '/' . $fullPath;
//         }
//         $fileSize = ftp_size($resource, $fullPath);
//         $x=ftp_get($resource, "aaa\\".$fullPath, $fullPath,FTP_BINARY,0);

//         // Just outputting file/size instead of copying while testing
//         //printf("%s (%d)<br />", $fullPath, $fileSize);
//     //    if (ftp_get($resource, $file, $file,FTP_BINARY)) {
//     //             echo "Successfully written to $$file\n";
//     //       } else {
//     //             echo "There was a problem\n";
//     //       }
//        // if ($fileSize == -1) ftp_recursive_list($resource, $fullPath);

//     }
// }



   
   
 $files = ftp_nlist($ftp,'');
 echo gettype($files);
 foreach($files as $file)
 {
     if ($file == '.' || $file == '..' ) continue;

     $fullPath = $file;


       
     $fileSize = ftp_size($ftp, $fullPath);
     $values=array_map('intval',explode('-',$file,-1));
     

     $values[6]=$file; 
         var_dump($values);
     
     DatabaseOpreation::insertIntoTableDate('monitoring','Plate_Number, Id_violation, Id_plate, Id_camera, Id_provinces,Date, ImagePath',$values);
     
     if (ftp_delete($ftp, $file)) {
        echo "$file deleted successful\n";
       } else {
        echo "could not delete $file\n";
       }



    //  $ret = ftp_nb_get($ftp, $fullPath, $fullPath,FTP_BINARY);
    //  while ($ret == FTP_MOREDATA) {
        
    //     // Do whatever you want
    //     echo ".";
     
    //     // Continue downloading...
    //     $ret = ftp_nb_continue($ftp);
    //  }
    //  if ($ret != FTP_FINISHED) {
    //     echo "There was an error downloading the file...";
    //     exit(1);
    //  }
     // Just outputting file/size instead of copying while testing
     printf("%s (%d)<br />", $fullPath, $fileSize);
 //    if (ftp_get($resource, $file, $file,FTP_BINARY)) {
 //             echo "Successfully written to $$file\n";
 //       } else {
 //             echo "There was a problem\n";
 //       }
    //if ($fileSize != -1)
    //$x=ftp_get($ftp, "aaa\\".$fullPath, $fullPath,FTP_BINARY,0);

 }
 ftp_close($ftp);


// $ret = ftp_nb_get($ftp, $file, $file, FTP_BINARY,0);
// // OR: $ret = ftp_nb_get($ftp, "test", "README", 
// //                           FTP_BINARY, FTP_AUTORESUME);
// while ($ret == FTP_MOREDATA) {
   
//    // Do whatever you want
//    echo ".";

//    // Continue downloading...
//    $ret = ftp_nb_continue($ftp);
// }
// if ($ret != FTP_FINISHED) {
//    echo "There was an error downloading the file...";
//    exit(1);
// }


// foreach($buff as $i)
//     {
//         echo "<br>$i";
        
        
        
// }




// close the connection
//var_dump($buff);
// output the buffer
 






    






// // ftp_mlsd();
// // ftp_get();
// // ftp_delete($ftp, $file);
// // ftp_close($ftp);
// close the connection

// function list_all_files($conn_id, $path){
//     $buff = ftp_rawlist($conn_id, $path);
//     $res = parse_rawlist($buff) ;
//     static $flist = array();
//     if(count($res)>0){
//         foreach($res as $result){
//             // verify if is dir , if not add to the  list of files
//             if($result['size']== 0){
//                 // recursively call the function if this file is a folder
//                 list_all_files($conn_id, $path.'/'.$result['name']);
//             }
//             else{
//             // this is a file, add to final list
//                 $flist[] = $result;
//             }    
//         }
//     }
//     return $flist;
// }

?>