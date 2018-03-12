<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstallerController extends Controller
{

    //ПРОВЕРКА ПОДКЛЮЧЕНИЕ К БАЗЕ ЕСЛИ ЕСТЬ ВОЗВРАЩАЕМ TRUE НЕТ ТО 404 ЛИБО НА СТАРИЦУ УСТАНОВКИ
    public function check(){

        $connecton = true;

//        try {
//            DB::connection()->getPdo;
//        } catch (\Exception $e){
//            $connecton = false;
//        }

        if ($connecton == false){
            return abort(404);
        }
    }

    public function requirements(){

        $this->check();
        $phpv = phpversion();
        $requirements[] = null;
        if ($phpv < 5){
            $requirements[] = "PHP версия $phpv - устарела!";
        }
        if (!function_exists('mail')){
            $requirements[] = "Функция PHP Mail не включена!";
        }
        if (!(bool)ini_get('short_open_tag')){
            $requirements[] = "Функция short_open_tag не включена!";
        }
        if (!extension_loaded('mbstring')){
            $requirements[] = "Расширение <a href='http://php.net/mbstring'>mbstring</a> не загружено!";
        }
        if (!extension_loaded('curl')){
            $requirements[] = "Расширение <a href='http://php.net/curl'>curl</a> не загружено!";
        }

        return view('install.requirements')->with(compact('requirements'));
    }

    public function database(){
        $this->check();
        $error = '';
        $data = $_POST;
        if (isset($data['install'])){
            $conn = @mysqli_connect($data['host'], $data['user'], $data['password']);
            if ($conn){
                if (@mysqli_select_db($conn, $data['name'])){
                    $config_env = file_get_contents('../.env');
                    $config_env = str_replace('{host}', $data['host'], $config_env);
                    $config_env = str_replace('{database}', $data['name'], $config_env);
                    $config_env = str_replace('{username}', $data['user'], $config_env);
                    $config_env = str_replace('{password}', $data['password'], $config_env);
                    dump($config_env);
                }else{
                    $error = 'Все верно кроме названия Базы вот ошибка - '. mysqli_error($conn);
                }
            }else{
                $error = 'Нет соединения с Базой!';
            }

//            dump($conn);
        }



//        dump($test);

        return view('install.database')->with(compact('error'));
    }

    public function configurations(){

    }

    public function success(){

    }

}
