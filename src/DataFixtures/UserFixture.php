<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(15,'users',function ($i) use ($manager) {
            $user = new User();
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setEmail(sprintf('email%d@mail.com',$i));
            $user->setUsername($this->faker->userName);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                password)
            );
            $manager->persist($user);

            return $user;
        });
        $manager->flush();
    }
}
