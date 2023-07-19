<?php

namespace App\Http\Controllers\Api\Company;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Vocces\Company\Application\CompanyCreator;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Models\Company;

class PostCreateCompanyController extends Controller
{
    /**
     * Create new company
     *
     * @param \App\Http\Requests\Company\CreateCompanyRequest $request
     */
    public function __invoke(CreateCompanyRequest $request, CompanyCreator $service)
    {

        DB::beginTransaction();
        try {
            $company =$service->handle(Str::uuid(), $request->name, $request->address,$request->email);
            DB::commit($company);
            return response($company, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            throw $error;
        }

    }
}
