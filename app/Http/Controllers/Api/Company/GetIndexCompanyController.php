<?php

namespace App\Http\Controllers\Api\Company;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyIndex;

class GetIndexCompanyController extends Controller
{
    /**
     * All Company
     *
     */
    public function __invoke(CompanyIndex $service)
    {

        DB::beginTransaction();
        try {
            $company = $service->handle();
            DB::commit($company);
            return response($company, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }

    }
}
