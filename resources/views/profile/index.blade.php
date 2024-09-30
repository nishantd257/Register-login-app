<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h1>Your Profile</h1>
            <p>Name: {{ $user->name }}</p>
            <p>Surname: {{ $user->surname }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Phone Number: {{ $user->phone_number }}</p>
            <p>Address: {{ $user->address }}</p>
            <p>Pincode: {{ $user->pincode }}</p>
            <p>State: {{ $user->state_name }}</p>
            <p>City: {{ $user->city_name}}</p>
        </div>
    </div>
</x-app-layout>