<?php

namespace spec\App;

use App\Movie;
use App\Rental;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    protected $dummyRental1;
    protected $dummyRental2;
    protected $dummyRental3;

    function let()
    {
        $movie1 = new Movie('Planet of The Apes', 0);
        $movie2 = new Movie('X-Men', 1);
        $movie3 = new Movie('Avengers', 2);
        $this->dummyRental1 = new Rental($movie1, 3);
        $this->dummyRental2 = new Rental($movie2, 1);
        $this->dummyRental3 = new Rental($movie3, 2);

        $this->beConstructedWith('Kevin McCallister');
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Customer');
    }

    function it_should_return_a_name()
    {
        $this->getName()->shouldReturn('Kevin McCallister');
    }

    function it_should_add_a_rental()
    {
        $this->addRental($this->dummyRental1)->shouldEqual(1);
    }

    function it_should_add_multiple_rentals()
    {
        $this->addRental($this->dummyRental1);
        $this->addRental($this->dummyRental2);
        $this->addRental($this->dummyRental3)->shouldReturn(3);
    }

    function it_should_return_a_string_based_statement_for_one_rental()
    {
        $this->addRental($this->dummyRental1);

        $this->statement()->shouldEqual(
        'Rental Statement for Kevin McCallister Planet of The Apes 3.5 Amount owed is 3.5 You earned 1 frequent renter points'
        );

    }

    function it_should_return_a_string_based_statement_for_several_rentals()
    {
        $this->addRental($this->dummyRental1);
        $this->addRental($this->dummyRental2);
        $this->addRental($this->dummyRental3);

        $this->statement()->shouldEqual(
        'Rental Statement for Kevin McCallister Planet of The Apes 3.5 X-Men 3 Avengers 1.5 Amount owed is 8 You earned 3 frequent renter points'
        );

    }

}
