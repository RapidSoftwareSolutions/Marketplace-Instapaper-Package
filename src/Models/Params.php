<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 24.07.17
 * Time: 12:04
 */

namespace Models;

class Params
{
    public static function createParams($requiredParams, $optionalParams, $requestParams)
    {
        $data = [];

        foreach ($requiredParams as $rapidName=>$vendorName)
        {
            $data[$vendorName] =  $requestParams[$rapidName];
        }

        foreach ($requestParams as $key=>$value)
        {
            if(array_key_exists($key, $optionalParams) && !empty($value))
            {
                $data[$optionalParams[$key]] = $value;
            }
        }

        return $data;
    }


    public static function createRequestBody($data, $bodyParams)
    {
        $requestBody = [];
        foreach ($bodyParams as $key=>$value)
        {
            foreach ($value as $param){
                if(array_key_exists($param, $data))
                {
                    if ($key == "body"){$requestBody[$key] = $data[$param];}
                    else {$requestBody[$key][$param] = $data[$param];}
                }
            }
        }
        return $requestBody;
    }
}