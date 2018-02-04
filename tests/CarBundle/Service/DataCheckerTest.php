<?php
/**
 * Created by PhpStorm.
 * User: williamdelrosario
 * Date: 04/02/2018
 * Time: 22:25
 */

namespace Tests\CarBundle\Service;

use CarBundle\Service\DataChecker;
use Doctrine\ORM\EntityManager;

class DataCheckerTest extends \PHPUnit_Framework_TestCase
{
    /** @var EntityManager|\PHPUnit_Framework_MockObject_MockObject */
    protected $entityManager;

    public function setUp()
    {
        $this->entityManager = $this->getMockBuilder('Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();
    }

    public function testCheckCarWithRequiredPhotosWillReturnFalse()
    {
        $subject        = new DataChecker($this->entityManager, true);
        $expectedResult = false;

        $car    = $this->getMock('CarBundle\Entity\Car');
        $car->expects($this->once())
            ->method('setPromote')
            ->with($expectedResult);

        $this->entityManager->expects($this->once())
            ->method('persist')
            ->with($car);
        $this->entityManager->expects($this->once())
            ->method('flush');
        
        $result = $subject->checkCar($car);
        $this->assertEquals($expectedResult, $result);
    }


}
