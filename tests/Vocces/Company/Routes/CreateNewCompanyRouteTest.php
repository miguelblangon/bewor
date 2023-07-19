<?php

namespace Tests\Vocces\Company\Routes;
use App\Enums\StatusEnum;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreateNewCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function postCreateNewCompanyRoute()
    {
        /**
         * Preparing
         */
        $faker = \Faker\Factory::create();
        $testCompany = [
            'name'   => $faker->name,
            'address'=> $faker->address,
            'email'=>   $faker->email
        ];

        /**
         * Actions
         */
        $response = $this->json('POST', '/api/company', [
            'name'   => $testCompany['name'],
            'address'=> $testCompany['address'],
            'email'=>   $testCompany['email']
        ]);

        /**
         * Asserts
         */
        $response->assertStatus(201)->assertJsonFragment($testCompany); //assertStatus(201)
    }
}
