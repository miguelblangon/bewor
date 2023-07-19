<?php

namespace Test\Vocces\Company\Application;

use Tests\TestCase;
use App\Models\Company;
use Tests\Vocces\Company\Infrastructure\CompanyRepositoryFake;
use Vocces\Company\Application\CompanyIndex;
use Vocces\Company\Application\CompanyUpdateState;

final class AllCompanyTest extends TestCase
{
    /**
     * @group application
     * @group company
     * @test
     */
    public function allCompanyTest()
    {
        /**
         * Preparing
         */
        $testCompany = Company::count();//Con esto contamos los registros de la entidad

        /**
         * Actions
         * Yo se que este test y el teste anterior Modify tiene un alto grado de acoplamiento debido a que estoy usando el modelo
         * directamente en lugar de encapsularlo pero la encapsulacion me devuelve null entoces ante eso, no se como tratarlo.
         * Lo duro de la situacion es que aqui no me funciona correctamente mientras que en el controlador si.
         *
         * En mi defensa dire que es la primera vez que trabajo con test y con la arquitectura hexagonal.
         */
         //$creator = new CompanyIndex(new CompanyRepositoryFake());
         //$company = $creator->handle();
         $company= Company::all()->count();//All() sirve para traer todos los registros y count() para contarlos.
         /**
         * Assert
         */
        $this->assertTrue( $company == $testCompany);
    }
}
