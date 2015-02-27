<?php
namespace Per\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Per\JobeetBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em) {
        $design = new Category();
        $design->setName("Design");
        $design->setSlug($design->getName());
        
        $programming = new Category();
        $programming->setName("Programming");
        $programming->setSlug($programming->getName());
        
        $manager = new Category();
        $manager->setName("Manager");
        $manager->setSlug($manager->getName());
        
        $administrator = new Category();
        $administrator->setName("Administrator");
        $administrator->setSlug($administrator->getName());
        
        $em->persist($design);
        $em->persist($programming);
        $em->persist($manager);
        $em->persist($administrator);
        $em->flush();
        
        $this->addReference('category-design', $design);
        $this->addReference('category-programming', $programming);
        $this->addReference('category-manager', $manager);
        $this->addReference('category-administrator', $administrator);
    }
    
    public function getOrder() {
        return 1;
    }
}
