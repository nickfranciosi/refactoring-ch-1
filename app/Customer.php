<?php

namespace App;


class Customer
{
    private $name;
    private $rentals = [];

    function __construct($name) {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
        return count($this->rentals);
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = "Rental Statement for " . $this->getName() . " ";

        foreach($this->rentals as $rental){
            $thisAmount = 0;

            //determine price for each rental
            switch($rental->getMovie()->getPriceCode()){
                case Movie::REGULAR :
                    $thisAmount = 2;
                    if($rental->getDaysRented() > 2){
                        $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                    }
                    break;
                case Movie::NEW_RELEASE :
                    $thisAmount += $rental->getDaysRented() * 3;
                    break;
                case Movie::CHILDRENS :
                    $thisAmount += 1.5;
                    if($rental->getDaysRented() > 3){
                        $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                    }
                    break;
            }

            //add frequent renter points
            $frequentRenterPoints++;
            //add bonus for a 2 day new release
            if (($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE ) && ($rental->getDaysRented() > 1)){
                $frequentRenterPoints++;
            }

            $result .= $rental->getMovie()->getTitle() . " " . $thisAmount . " ";
            $totalAmount += $thisAmount;
        }

        $result .="Amount owed is " . $totalAmount . " ";
        $result .="You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;

    }
}
