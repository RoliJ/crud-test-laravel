<div>
    <label for="firstname">Firstname:</label>
    <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $customer->firstname ?? '') }}">
</div>
<div>
    <label for="lastname">Lastname:</label>
    <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $customer->lastname ?? '') }}">
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
