<?php

namespace Vocces\Company\Application;

use App\Models\Company as ModelsCompany;
use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyUpdateState implements ServiceInterface
{
    /**
     * @var CompanyRepositoryInterface $repository
     */
    private CompanyRepositoryInterface $repository;

    /**
     * Create new instance
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new company
     */
    public function handle($id)
    {
        $company= ModelsCompany::findOrFail($id);
        $this->repository->updateStatus($company->id);

        return $company->fresh();
    }
}
