<?php

namespace MachOrgUa\Base;


class Zone
{
    const PATTERN = '~([a-zA-z]+)([0-9]+)~';

    /**
     * @var Quality
     */
    protected $quality;

    /**
     * @var Field
     */
    protected $field;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $string
     * @return Zone
     */
    public static function createFromString(string $string) : self
    {
        preg_match(self::PATTERN, $string, $fieldQuality);
        $field = $fieldQuality[1];
        $quality = $fieldQuality[2];

        $fieldLower = strtolower($field);
        $system = ($field === $fieldLower) ? System::SHAFT : System::HOLE;

        return new self(
            new Field($fieldLower, new System($system)),
            new Quality($quality)
        );
    }

    /**
     * Zone constructor.
     * @param Field $field
     * @param Quality $quality
     */
    public function __construct(Field $field, Quality $quality)
    {
        $this->field = $field;
        $this->quality = $quality;

        $fieldValue = $field->getSystem() == System::HOLE ? strtoupper($field->getValue()) : $field->getValue();
        $this->value = $fieldValue . $quality->getValue();
    }

    /**
     * @return Field
     */
    public function getField(): Field
    {
        return $this->field;
    }

    /**
     * @return Quality
     */
    public function getQuality(): Quality
    {
        return $this->quality;
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
    public function getSystem() : System
    {
        return $this->field->getSystem();
    }
}