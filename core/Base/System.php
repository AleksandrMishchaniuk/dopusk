<?php

namespace MachOrgUa\Base;


use MachOrgUa\Exceptions\Exception;

class System
{
    const HOLE = 'hole';
    const SHAFT = 'shaft';

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
     * System constructor.
     * @param string $value
     * @throws Exception
     */
    public function __construct($value)
    {
        if (!in_array($value, self::getAll())) {
            throw new Exception("Value '$value' is not allowed for system object");
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