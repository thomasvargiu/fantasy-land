<?php

declare(strict_types=1);

namespace FunctionalPHP\FantasyLand;

interface Apply extends Functor
{
    /**
     * @param Apply $applicative
     *
     * @return Apply
     */
    public function ap(Apply $applicative): Apply;
}
