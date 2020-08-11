<?php


namespace ishop;


class Cache
{
    use TSingleton;

    public function set($key, $data, $seconds = 3600)
    {
        if($seconds){
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if(file_put_contents(CACHE . '/' . $key . '.txt', serialize($content))){
                return true;
            }
        }
        return false;
    }


    public function get($key)
    {
        $file = CACHE . '/' . $key . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']){
               // debug($content['data']);
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }


    public function delete($key)
    {
        $file = CACHE . '/' . $key . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }
}