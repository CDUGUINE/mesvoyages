<?php

namespace App\Tests\Validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Description of VisiteValidationsTest
 *
 * @author cduguine
 */
class VisiteValidationsTest extends KernelTestCase{
    public function getVisite(): Visite {
        return (new Visite())
            ->setVille("New York")
            ->setPays("USA");
    }
    
    public function testValidNoteVisite() {
        $visite = $this->getVisite()->SetNote(10);
        $this->assertErrors($visite, 0);
    }
    
    public function assertErrors(Visite $visite, int $nbErreursAttendues, string $message="") {
        self::bootKernel();
        $validator = self::getContainer()->get(ValidatorInterface::class);
        $error = $validator->validate($visite);
        $this->assertCount($nbErreursAttendues, $error, $message);
    }
    
    public function testNonValidNoteVisite() {
        $visite = $this->getVisite()->SetNote(21);
        $this->assertErrors($visite, 1);        
    }
    
    public function testNonValidTempMaxVisite() {
        $visite = $this->getVisite()
                ->setTempmin(20)
                ->SetTempmax(18);
        $this->assertErrors($visite, 1, "min=20, max=18 devrait échouer");        
    }
    
}
