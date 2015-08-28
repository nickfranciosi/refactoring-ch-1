<?php

namespace App;


class Movie
{
    private $title;
    private $priceCode;

    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;


    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceCode()
    {
        return $this->priceCode;
    }

    public function setPriceCode($value)
    {
        $this->priceCode  = $value;
    }
}
