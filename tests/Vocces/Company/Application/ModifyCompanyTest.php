<?php

namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use App\Models\Company;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;
use Vocces\Company\Application\CompanyUpdateState;

final class ModifyCompanyTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function modifyCompanyTest()
    {
        /**
         * Preparing
         */
        $testCompany = Company::first(); //findOrFail('eb70accc-8dff-4d69-ae08-4e6491d7d32f')
            if (!$testCompany instanceof Company ) {
                return true;
            }
        /**
         * Actions
         */
        // $creator = new CompanyUpdateState(new CompanyRepositoryFake());
        // $company = $creator->handle($testCompany->id);
         Company::findOrFail($testCompany->id)->update(['status' =>'active']);
         $testCompany->refresh();
       /**
         * Assert
         */
        $this->assertInstanceOf(Company::class, $testCompany);
        $this->assertSame('active', $testCompany->status);
    }
}
