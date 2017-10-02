<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmailVerificationControllerTest extends TestCase
{
    /**
     * A basic test case for show method
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('/verifyemail/somefalsttoken');
        $response->assertStatus(500);
    }
}
