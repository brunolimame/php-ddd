<?php


namespace PhpDdd\Tests\Entity\ValueObject;


use PhpDdd\Entity\ValueObject\EntityValueUuid;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid as RamseyUuid;

class EntityValueObjectUuidTest extends TestCase
{

    public function testFactoryUuid(){
        $entityUuid = EntityValueUuid::factory();
        $this->assertTrue(RamseyUuid::isValid($entityUuid->value()));
    }
    public function testValidateUuid(){
        $uuid = RamseyUuid::uuid4()->toString();
        $entityUuid = new EntityValueUuid($uuid);
        $this->assertEquals($uuid,$entityUuid->value(),'O valores são diferentes');
        $this->assertTrue($entityUuid->equal($entityUuid),'Erro na comparação do UUid');
    }
}