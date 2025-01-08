<?php

namespace assets;

class Goods
{
    public function getItems($sql, $catId = 0)
    {
        $link = mysqli_connect("localhost", "root", "rooter123", "im");
        mysqli_set_charset($link, "utf8");

        if ($link !== false) {
            return mysqli_query($link, $sql);
        }
    }

    public function setItems($sql)
    {
        $link = mysqli_connect("localhost", "root", "rooter123", "im");
        mysqli_set_charset($link, "utf8");
        $link->query($sql);
    }

    public function getCategory($catName)
    {
        $catId = '';
        switch ($catName) {
            case 'Electronic': $catId = 1; break;
            case 'Clothes': $catId = 2; break;
        }
        return $catId;
    }
}