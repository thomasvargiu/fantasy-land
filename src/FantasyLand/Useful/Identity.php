<?php

declare(strict_types=1);

namespace FunctionalPHP\FantasyLand\Useful;

use FunctionalPHP\FantasyLand;

class Identity implements FantasyLand\Monad
{
    const of = 'FunctionalPHP\FantasyLand\Useful\Identity::of';

    /**
     * @var mixed
     */
    private $value;

    /**
     * @inheritdoc
     */
    public static function of($value)
    {
        return new self($value);
    }

    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdocus
     */
    public function map(callable $function): FantasyLand\Functor
    {
        return static::of($this->bind($function));
    }

    /**
     * @inheritdoc
     */
    public function ap(FantasyLand\Apply $applicative): FantasyLand\Apply
    {
        return $applicative->map($this->value);
    }

    /**
     * @inheritdoc
     */
    public function bind(callable $function)
    {
        return $function($this->value);
    }
}
