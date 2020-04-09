<?php

namespace MachOrgUa\Base;


use MachOrgUa\Exceptions\Exception;

class Field
{
    const A = 'a';
    const B = 'b';
    const C = 'c';
    const D = 'd';
    const E = 'e';
    const F = 'f';
    const G = 'g';
    const H = 'h';
    const JS = 'js';
    const K = 'k';
    const M = 'm';
    const N = 'n';
    const P = 'p';
    const R = 'r';
    const S = 's';
    const T = 't';
    const U = 'u';
    const V = 'v';
    const X = 'x';
    const Y = 'y';
    const Z = 'z';

    /**
     * One of the values defined in constants of this class
     * @var string
     */
    protected $value;

    /**
     * @var System
     */
    protected $system;

    /**
     * @return array
     */
    public static function getAll() : array
    {
        $class = new \ReflectionClass(self::class);
        return array_values($class->getConstants());
    }

    /**
     * Field constructor.
     * @param string $value
     * @param System $system
     * @throws Exception
     */
    public function __construct($value, System $system)
    {
        if (!in_array($value, self::getAll())) {
            throw new Exception("Value '$value' is not allowed for field object");
        }
        $this->value = $value;
        $this->system = $system;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system;
    }
}