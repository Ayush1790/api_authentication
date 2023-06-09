<?php

namespace MyApp\Component;

class Product
{
    public function add($data)
    {
        $data = json_encode($data);
        $ch = curl_init();
        $url = 'http://192.168.32.6/api/product?role=admin';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // execute!
        return json_decode(curl_exec($ch));
    }
    public function view()
    {
        $ch = curl_init();
        $url = 'http://192.168.32.6/api/product?role=admin';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        // execute!
        return json_decode(curl_exec($ch));
    }
    public function delete($data)
    {

        $ch = curl_init();
        $data = (int)$data;
        $url = 'http://192.168.32.6/api/product/' . $data . '?role=admin';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "delete");
        // execute!
        return  json_decode(curl_exec($ch));
    }
    public function searchById($id)
    {
        $ch = curl_init();
        $url = 'http://192.168.32.6/api/product/search/' . $id . '?role=admin';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        // execute!
        return json_decode(curl_exec($ch));
    }
    public function update($data)
    {
        $ch = curl_init();
        $url = 'http://192.168.32.6/api/product/' . $data['id'] . '?role=admin';
        $data = json_encode($data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "put");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        return json_decode(curl_exec($ch));
    }
}
