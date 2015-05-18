<?php

namespace spec\MeadSteve\DiceApi\Renderer;

use MeadSteve\DiceApi\Dice;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MeadSteve\DiceApi\Renderer\Json');
    }

    function it_uses_the_json_encode_function_of_the_dice(Dice $dice)
    {
        $dice->roll()->willReturn(5);
        $dice->size()->willReturn(6);

        $expectedJson = '{"success":true,"dice":[{"value":5,"size":"d6"}]}';
        $this->renderDice([$dice])->shouldReturn($expectedJson);
    }
}
