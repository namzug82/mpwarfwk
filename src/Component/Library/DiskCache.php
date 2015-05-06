<?php


namespace src\Component\Library;


use src\Component\Library\Contracts\Cache;

class DiskCache implements Cache
{

    public function set($key, $component, $expiration)
    {

        $file = $this->file();
        $content = json_decode($file);

        $content->$key = json_decode(json_encode(array("expiration" => time() + $expiration, "value" => $component)));

        $content = json_encode($content);
        file_put_contents("cacheFile/cache.txt", $content);
    }

    public function get($key)
    {


        $file = json_decode($this->file());
        if(!property_exists($file, $key)){
            return false;
        }
        if($file->$key->expiration < time()){

            return false;
        }

        return $file->$key->value;
    }

    public function delete($key)
    {
        $fileArray = json_decode($this->file());

        if(!property_exists($fileArray, $key)){
            return false;
        }
        unset($fileArray->$key);

       $contents = json_encode($fileArray);
        file_put_contents("cacheFile/cache.txt", $contents);
    }

    public function getKeyName($parameters)
    {
        $controller = "";
        if (array_key_exists("controller", $parameters)) {
            $controller = $parameters["controller"];
            unset($parameters["controller"]);
        }
        ksort($parameters);
        $key = implode("_", $parameters);
        $key = (strlen($key) > 5) ? sha1($key) : $key;

        return $controller . "_" . $key;

    }

    public function file(){
        $file = "cacheFile/cache.txt";
        if (!file_exists($file)) {
            mkdir("cacheFile/", 0777);
            file_put_contents("cacheFile/cache.txt", "{}");
        }
        return file_get_contents("cacheFile/cache.txt");


    }
}