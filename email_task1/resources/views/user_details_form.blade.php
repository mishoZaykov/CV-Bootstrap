<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" name="phone" id="phone" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" required>

    <label for="age">Age:</label>
    <input type="text" name="age" id="age" required>

    <button type="submit">Submit</button>
</form>
