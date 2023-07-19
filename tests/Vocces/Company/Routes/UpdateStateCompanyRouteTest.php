<?php

namespace Tests\Vocces\Company\Routes;
use App\Enums\StatusEnum;
use App\Models\Company;
use Illuminate\Support\Str;
use Tests\TestCase;

class UpdateStateCompanyRouteTest extends TestCase
{
    /**
     * @group route
     * @group access-interface
     * @test
     */
    public function pathUpdateStateCompanyRoute()
    {
        /**
         * Preparing
         */
         $testCompany = Company::first();//findOrFail()  first();
         if (!$testCompany instanceof Company ) {
            return true;
        }
        /**
         * Actions
         */
        $response = $this->json('PATCH', '/api/company/'.$testCompany->id);
        $testCompany->refresh();
        /**
         * Asserts
         */

        $response->assertOk()->assertJsonFragment([
            'id'=>$testCompany->id ,
            'name'=>$testCompany->name,
            'email'=>$testCompany->email,
            'address'=>$testCompany->address,
            'status'=>$testCompany->status
        ]);
    }
}
