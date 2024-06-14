<div>
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $customer->first_name ?? '') }}">
</div>
<div>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $customer->last_name ?? '') }}">
</div>
<div>
    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $customer->date_of_birth ?? '') }}">
</div>
<div>
    <label for="country_code">Country Code:</label>
    <input type="text" id="country_code" name="country_code" value="{{ old('country_code', $customer->country_code ?? '') }}">
</div>
<div>
    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number ?? '') }}">
</div>
<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $customer->email ?? '') }}">
</div>
<div>
    <label for="bank_account_number">Bank Account Number:</label>
    <input type="text" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number', $customer->bank_account_number ?? '') }}">
</div>
