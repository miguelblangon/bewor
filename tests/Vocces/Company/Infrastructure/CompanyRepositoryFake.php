<?php

namespace Tests\Vocces\Company\Infrastructure;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryFake implements CompanyRepositoryInterface
{
    public bool $callMethodCreate = false, $callMethodUpdate=false, $callMethodIndex=false ;

    /**
     * @inheritdoc
     */
    public function create(Company $company): void
    {
        $this->callMethodCreate = true;
    }
    public function updateStatus(string $companyId): void
    {
        $this->callMethodUpdate = true;
    }
    public function index()
    {
        $this->callMethodIndex = true;
    }
}
