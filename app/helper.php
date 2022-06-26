<?php

if (!function_exists('download_file'))
{
    function download_file($file, $path)
    {
        $new_name = time() . '-' . $file->getClientOriginalName();
        $file->move($path, $new_name);
        return $new_name;
    }
}
