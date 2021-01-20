<?php

namespace DNAFactory\Teamwork\Endpoints\Desk;

use DNAFactory\Teamwork\Endpoints\BaseEndpoint;
use DNAFactory\Teamwork\Endpoints\Router;
use DNAFactory\Teamwork\Models\Company;
use DNAFactory\Teamwork\RawEndpoints\Desk\Companies as RawCompanies;

class Companies extends BaseEndpoint
{
    const REF_TYPE_NAME = 'companies';
    const ARRAY_PATH_FOR_ENTRIES = [
        'getById' => 'company',
        'getAll' => 'companies'
    ];

    public function __construct(RawCompanies $rawEndpoint, Router $router)
    {
        parent::__construct($rawEndpoint, $router);
    }

    protected function makeOne(int $id): Company
    {
        return new Company($this, $id, ['id' => $id]);
    }
}
