<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Movie;

class RentalSpec extends ObjectBehavior
{

    protected $matrix;

    function let()
    {
      $this->matrix = new Movie('The Matrix', 0);
      $daysRented = 2;
      $this->beConstructedWith($this->matrix, $daysRented);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Rental');
    }

    function it_should_have_a_movie_attached_to_it()
    {
        $this->getMovie()->shouldReturn($this->matrix);
    }

    function it_should_return_the_number_of_days_rented()
    {
        $this->getDaysRented()->shouldEqual(2);
    }

    function it_should_update_the_number_of_days_rented()
    {
        $this->setDaysRented(4);
        $this->getDaysRented()->shouldEqual(4);
    }
}
