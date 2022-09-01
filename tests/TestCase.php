<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Stancl\Tenancy\Database\Models\Tenant;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected bool $tenancy = false;
    

}
