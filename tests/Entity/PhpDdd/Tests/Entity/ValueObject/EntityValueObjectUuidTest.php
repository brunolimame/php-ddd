<?php


namespace PhpDdd\Tests\Entity\ValueObject;


use PhpDdd\Entity\ValueObject\EntityValueUuid;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;

class EntityValueObjectUuidTest extends TestCase
{

    public function testUuid(){
        $uuid = EntityValueUuid::factory();
        $this->assertTrue(RamseyUuid::isValid($uuid->value()));
    }
}