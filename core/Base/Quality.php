<?php

namespace MachOrgUa\Base;


use MachOrgUa\Exceptions\Exception;

class Quality
{
    const _01 = '01';
    const _0 = '0';
    const _1 = '1';
    const _2 = '2';
    const _3 = '3';
    const _4 = '4';
    const _5 = '5';
    const _6 = '6';
    const _7 = '7';
    const _8 = '8';
    const _9 = '9';
    const _10 = '10';
    const _11 = '11';
    const _12 = '12';
    const _13 = '13';
    const _14 = '14';
    const _15 = '15';
    const _16 = '16';
    const _17 = '17';
    const _18 = '18';

    /**
     * One of the values defined in constants of this class
     * @var string
     */
    protected $value;

    /**
     * @return array
     */
    public static function getAll() : array
    {
        $class = new \ReflectionClass(self::class);
        return array_values($class->getConstants());
    }

    /**
     * Quality constructor.
     * @param string $value
     * @throws Exception
     */
    public function __construct($value)
    {
        if (!in_array($value, self::getAll())) {
            throw new Exception("Value '$value' is not allowed for quality object");
        }
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}