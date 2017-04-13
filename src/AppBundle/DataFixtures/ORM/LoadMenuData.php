<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Menu;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Season;

class LoadMenuData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $menusData = array(
            array(
                'name'   => 'Menu 1',
                'season' => $this->getReference('season-0'),
                'recipes' => [
                    $this->getReference('recipe-0'),
                    $this->getReference('recipe-2'),
                ],
            ),
            array(
                'name'   => 'Menu 2',
                'season' => $this->getReference('season-1'),
                'recipes' => [
                    $this->getReference('recipe-0'),
                    $this->getReference('recipe-1'),
                    $this->getReference('recipe-2'),
                ],
            ),
            array(
                'name'   => 'Menu 3',
                'season' => $this->getReference('season-2'),
                'recipes' => [
                    $this->getReference('recipe-1'),
                    $this->getReference('recipe-3'),
                ],
            ),
            array(
                'name'   =>  'Menu 4',
                'season' => $this->getReference('season-3'),
                'recipes' => [
                    $this->getReference('recipe-1'),
                    $this->getReference('recipe-2'),
                    $this->getReference('recipe-3'),
                ],
            ),
        );

        foreach ($menusData as $i => $m) {
            $menu = new Menu();

            $menu->setName($m['name']);
            $menu->setSeason($m['season']);
            foreach ($m['recipes'] as $j => $r){
                $menu->addRecipe($r);
                $r->addMenu($menu);
            }

            $manager->persist($menu);
            $this->addReference('menu-'.$i, $menu);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 120;
    }

}