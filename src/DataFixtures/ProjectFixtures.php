<?php

namespace App\DataFixtures;

use App\Entity\Progect;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends BaseFixture
{

    protected function loadData(ObjectManager $manager)
    {

      $this->createMany(30,'dev_project',function($i)use($manager){

          $project = new Progect();
        $project->setTitle($this->faker->streetName);
        $project->addDeveloper($this->getRandomReference('dev_user'));

        return $project;
    });



        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            DeveloperFixtures::class,
        ];
    }
}
