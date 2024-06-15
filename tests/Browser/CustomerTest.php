<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_list_customers()
    {
        $customers = Customer::factory()->count(3)->create();

        $this->browse(function (Browser $browser) use ($customers) {
            $browser->visit('/customers')
                    ->assertSee($customers[0]->first_name)
                    ->assertSee($customers[1]->first_name)
                    ->assertSee($customers[2]->first_name);
        });
    }

    /** @test */
    public function it_can_create_a_customer()
    {
        $firstName = Str::random(10);
        $lastName = Str::random(10);

        $this->browse(function (Browser $browser) use ($firstName, $lastName) {
            $browser->visit('/customers/create')
                    ->type('first_name', $firstName)
                    ->type('last_name', $lastName)
                    ->type('date_of_birth', '1990-01-01')
                    ->type('country_code', 'US')
                    ->type('phone_number', '3192083701')
                    ->type('email', $firstName . '.' . $lastName . '@gmail.com')
                    ->type('bank_account_number', '1234567890')
                    ->press('Create')
                    ->waitForLocation('/customers')
                    ->assertSee('Customer created successfully');
        });
    }

    /** @test */
    public function it_can_update_a_customer()
    {
        $customer = Customer::factory()->create();
        $updatedFirstName = Str::random(10);

        $this->browse(function (Browser $browser) use ($customer, $updatedFirstName) {
            $browser->visit('/customers/' . $customer->id . '/edit')
                    ->type('first_name', $updatedFirstName)
                    ->press('Update')
                    ->waitForLocation('/customers')
                    ->assertSee('Customer updated successfully')
                    ->assertSee($updatedFirstName);
        });
    }

    /** @test */
    public function it_can_show_a_customer()
    {
        $customer = Customer::factory()->create();

        $this->browse(function (Browser $browser) use ($customer) {
            $browser->visit('/customers/' . $customer->id)
                    ->assertSee($customer->first_name)
                    ->assertSee($customer->last_name)
                    ->assertSee($customer->email);
        });
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $customer = Customer::factory()->create();

        $this->browse(function (Browser $browser) use ($customer) {
            $browser->visit('/customers')
                    ->press('Delete')
                    ->waitForLocation('/customers')
                    ->assertSee('Customer deleted successfully')
                    ->assertDontSee($customer->first_name);
        });
    }
}
