<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MovieSpec extends ObjectBehavior
{

    function let()
    {
      $this->beConstructedWith('The Matrix', 0);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Movie');
    }

    function it_should_return_a_title()
    {
        $this->getTitle()->shouldEqual('The Matrix');
    }

    function it_should_return_a_price_code()
    {
        $this->getPriceCode()->shouldEqual(0);
    }

    function it_should_update_the_price_code()
    {
        $this->setPriceCode(2);
        $this->getPriceCode()->shouldEqual(2);   
    }
}
