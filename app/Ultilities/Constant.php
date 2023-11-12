<?php


namespace App\Ultilities;


class Constant {
    // Nơi định nghĩa các hàm số, role dùng chung cho toàn hệ thống

    //User

    const user_level_host = 0;
    const user_level_admin = 1;
    const user_level_client = 2;
   public static $user_level = [
    self::user_level_host => 'host',
    self::user_level_admin => 'admin',
    self::user_level_client => 'client',
   ];

}


?>