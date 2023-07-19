<?php

namespace Tests\Vocces\Company\Routes;
use App\Enums\StatusEnum;
use App\Models\Company;
use Illuminate\Support\Str;
use Tests\TestCase;

class AllCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function allCompanyRouteTest()
    {
        /**
         * Preparing
         */
         $testCompany = Company::count();//findOrFail()  first();
         /*
         if (!$testCompany instanceof Company ) {
            return true;
        }
        */
        /**
         * Actions
         */
        $response = $this->json('GET', '/api/company');

        /**
         * Asserts
         */
        $response->assertOk()->assertJsonCount($testCompany);
    }
}
