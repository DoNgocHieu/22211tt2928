<?php

class Category extends Database
{
    public static function all()
    {
        $sql = parent::$connection->prepare("select * from categories");
        return parent::select($sql);
    }
}