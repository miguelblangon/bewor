<?php

namespace Vocces\Company\Domain;

use Vocces\Company\Domain\ValueObject\CompanyId;

interface CompanyRepositoryInterface
{
    /**
     * Persist a new company instance
     *
     * @param Company $company
     *
     * @return void
     */
    public function create(Company $company): void;
    public function updateStatus(string  $companyId): void;
    public function index();


}
