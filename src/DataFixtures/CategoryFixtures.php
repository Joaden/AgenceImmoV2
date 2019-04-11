<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class CategoryFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
//         $product = new Product();
//         $manager->persist($product);

//        $product->nom = "tshirt hulk";
//        $product->save();

        $categories = ['Maison','Appartement',];
        foreach($categories as $c) {
            $categorie = new Category();
            $categorie->setNom($c);
            $manager->persist($categorie);
            // INSERT INTO categorie set nom = 'Maison'
            // INSERT INTO categorie set nom = 'Appartement'
            
        }
        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['categories'];
    }
}
