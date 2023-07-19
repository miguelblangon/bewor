<?php

namespace Vocces\Company\Infrastructure;

use App\Models\Company as ModelsCompany;
use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryEloquent implements CompanyRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(Company $company): void
    {
        ModelsCompany::Create([
            'id'     => $company->id(),
            'name'   => $company->name(),
            'address'   => $company->address(),
            'email'   => $company->email(),
            'status' => $company->status()->name(),
        ]);
    }
    public function updateStatus(string $companyId): void
    {
        ModelsCompany::findOrFail($companyId)->update([ 'status' =>'active']);
    }
    public function index()
    {
        return ModelsCompany::all();
    }
}
