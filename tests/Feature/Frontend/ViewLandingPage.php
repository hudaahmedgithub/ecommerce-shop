<?php

namespace Tests\Feature\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewLandingPage extends TestCase
{
    public function testCanViewLandingPage()
    {
        $response = $this->get('/');
    }
}
