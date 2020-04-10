<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');
        $slugify = new Slugify();

        for ($i = 1; $i <= 30; $i++) {
            $ad = new Ad();

            $title =$faker->sentence();

            $ad->setTitle($title)
                ->setSlug($slugify->slugify($title))
                ->setCoverImage($faker->imageUrl(1000,350))
                ->setIntroduction($faker->paragraph(2))
                ->setContent('<p>' . join('</p><p>' , $faker->paragraphs(5)) . '</p>')
                ->setPrice(mt_rand(40, 200))
                ->setRooms(mt_rand(1, 5));

            $manager->persist($ad);
        }

        $manager->flush();
    }
}
