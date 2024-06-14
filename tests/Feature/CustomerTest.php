<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_retrieve_all_customers()
    {
        Customer::factory()->count(3)->create();

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            ])->get('/api/customers');

        $response->assertStatus(200)
                ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_can_create_a_customer()
    {
        $response = $this->post('/customers', [
            'first_name' => 'Rouhollah',
            'last_name' => 'Joveini',
            'date_of_birth' => '1990-09-16',
            'country_code' => 'IR',
            'phone_number' => '09127504176',
            'email' => 'r.joveini@gmail.com',
            'bank_account_number' => '1236565555',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('customers', [
            'email' => 'r.joveini@gmail.com'
        ]);
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->put("/customers/{$customer->id}", [
            'first_name' => 'UpdatedFirstName',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'first_name' => 'UpdatedFirstName',
        ]);
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->delete("/customers/{$customer->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('customers', ['id' => $customer->id]);
    }
}
