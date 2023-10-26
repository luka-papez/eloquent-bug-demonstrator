<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class EloquentBuilderBugReportTest extends TestCase
{
    public function test_demonstrate_strange_method_call(): void
    {
        $query = User::query()->select('*');

        $camelCaseResult = $query->toSql();
        $upperCaseResult = $query->toSQL(); // notice the difference in method casing

        $this->assertEquals($camelCaseResult, $upperCaseResult);
    }
}
