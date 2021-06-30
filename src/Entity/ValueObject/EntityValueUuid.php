<?php
declare(strict_types=1);

namespace PhpDdd\Entity\ValueObject;

use Ramsey\Uuid\Uuid as RamseyUuid;

class EntityValueUuid
{
    public function __construct(private string $value)
    {
        $this->isValid($value);
    }

    public static function factory():self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public function equal(EntityValueUuid $compare):bool
    {
        return $this->value() === $compare->value();
    }

    public function value():string
    {
        return $this->value;
    }

    public function __toString():string
    {
        return $this->value();
    }

    private function isValid(string $uuid):void
    {
        if (!RamseyUuid::isValid($uuid)) {
            throw new \InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $uuid));
        }
    }

}