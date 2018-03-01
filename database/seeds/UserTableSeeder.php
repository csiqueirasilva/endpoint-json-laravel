<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

  public function run()
  {
    $faker = Faker::create();

    // Create sample user accounts

    Sentry::getUserProvider()->create(array(
      'email'       => 'sysadmin@admin.com',
      'username'    => 'sysadmin',
      'password'    => "sysadmin",
      'first_name'  => $faker->firstName,
      'last_name'   => $faker->lastName,
      'activated'   => 1,
    ));

    Sentry::getUserProvider()->create(array(
      'email'       => 'admin@admin.com',
      'username'    => 'admin',
      'password'    => "admin",
      'first_name'  => $faker->firstName,
      'last_name'   => $faker->lastName,
      'activated'   => 1,
    ));

    Sentry::getUserProvider()->create(array(
      'email'       => 'user@user.com',
      'username'    => 'user',
      'password'    => "user",
      'first_name'  => $faker->firstName,
      'last_name'   => $faker->lastName,
      'activated'   => 1,
    ));
  }

}
