<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSplashScreen()
        {
            $response = $this->get('/');
            $response->assertStatus(200);
            $response->assertViewIs('splash.splash');
        }

        public function testDashboard()
        {
            $response = $this->get('/dashboard/1');
            $response->assertStatus(200);
            $response->assertViewIs('dashboard.dashboard');
        }

        public function testSignUp()
        {
            $response = $this->get('/sign_up');
            $response->assertStatus(200);
            $response->assertViewIs('sign_up.sign_up');
        }

        public function testLeave()
        {
            $response = $this->get('/leave');
            $response->assertStatus(200);
            $response->assertViewIs('leave.leave');
        }

        public function testEReport()
        {
            $response = $this->get('/e_leave_report/1');
            $response->assertStatus(200);
            $response->assertViewIs('e_leave_report.e_leave_report');
        }

        public function testMaterialAttaching()
        {
            $response = $this->get('/material_attaching');
            $response->assertStatus(200);
            $response->assertViewIs('material_attaching.material_attaching');
        }
}
