<?php

namespace Tksmrkm;

class Punycode extends \TrueBV\Punycode {
    private function split_url($method, $url, $utf = false){
        $url = explode('/', $url);
        if($method === 'decode'){
            $url[2] = $this->decode($url[2]);
            if($utf){
                foreach($url as $key => &$value){
                    if($key > 2)
                        $value = urldecode($value);
                }
            }
        }elseif($method === 'encode'){
            $url[2] = $this->encode($url[2]);
            if($utf){
                foreach($url as $key => &$value){
                    if($key > 2)
                        $value = urlencode($value);
                }
            }
        }
        $url = implode('/', $url);
        return $url;
    }
    public function encodeUrl($url, $utf = true){
        return $this->split_url('encode', $url, $utf);
    }
    public function decodeUrl($url, $utf = true){
        return $this->split_url('decode', $url, $utf);
    }
}