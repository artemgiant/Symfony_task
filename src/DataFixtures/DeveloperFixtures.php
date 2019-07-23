<?php

namespace App\DataFixtures;

use App\Entity\Developer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DeveloperFixtures extends BaseFixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    protected function loadData(ObjectManager $manager)
    {
    $this->createMany(10,'dev_user',function ($i)use ($manager){
        $dev = new Developer();
        $dev->setEmail(sprintf('admin%d@test.com',$i));
        $dev->setName($this->faker->name);

        return $dev;

    });
        $manager->flush();
    }

}
