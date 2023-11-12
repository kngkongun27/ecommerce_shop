<?php
namespace App\Ultilities;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Common 
{
    public static function uploadFile($file, $path) {
        $file_name_original = $file->getClientOriginalName();
        $file_extension = $file->getClientOriginalExtension();

        $file_name_without_extension = Str::replaceLast('.' . $file_extension, '', $file_name_original);
        $file_name_without_extension = Str::slug($file_name_without_extension);

        $str_time_now = Carbon::now()->format('ymd_his');
        $file_name = $file_name_without_extension . '_' . uniqid() . '_' . $str_time_now . '.' . $file_extension;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $file->move($path, $file_name);
        return $file_name;
    }

    public static function Print() {
        $e = '123';
       
        return $e;
    }
}

?>