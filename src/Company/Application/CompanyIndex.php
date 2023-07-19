<?php

namespace Vocces\Company\Application;

use App\Models\Company as ModelsCompany;
use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyIndex implements ServiceInterface
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
    public function handle()
    {
        return  $this->repository->index();
    }
}
