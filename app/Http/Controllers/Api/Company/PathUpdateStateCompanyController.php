<?php

namespace App\Http\Controllers\Api\Company;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyUpdateState;

class PathUpdateStateCompanyController extends Controller
{
    /**
     * Update State Company
     */
    public function __invoke($compa, CompanyUpdateState $service)
    {

        DB::beginTransaction();
        try {
            $company = $service->handle($compa);
            DB::commit($company);
            return response($company, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }

    }
}
