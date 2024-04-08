<?php

namespace App\Helpers;

class JsonHelper
{
    public static function readJson($filePath)
    {
        if (file_exists($filePath)) {
            $jsonString = file_get_contents($filePath);
            return json_decode($jsonString, true);
        }
        return [];
    }

    public static function writeJson($data, $filePath)
    {
        $jsonString = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($filePath, $jsonString);
    }
}
