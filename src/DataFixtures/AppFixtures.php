<?php

namespace App\DataFixtures;

use App\Factory\TodolistFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        TodolistFactory::createMany(20);
        $manager->flush();
    }
}
