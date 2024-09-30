<x-guest-layout>
    <!-- Bootstrap and Font Awesome CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                    <form id="registration-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="fas fa-user"></i> Name</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>

                        <!-- Surname -->
                        <div class="mb-3">
                            <label for="surname" class="form-label"><i class="fas fa-user-tag"></i> Surname</label>
                            <input id="surname" type="text" class="form-control" name="surname" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone_number" class="form-label"><i class="fas fa-phone"></i> Phone Number</label>
                            <input id="phone_number" type="text" class="form-control" name="phone_number" required>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
                            <input id="address" type="text" class="form-control" name="address" required>
                        </div>

                        <!-- Pincode -->
                        <div class="mb-3">
                            <label for="pincode" class="form-label"><i class="fas fa-location-arrow"></i> Pincode</label>
                            <input id="pincode" type="text" class="form-control" name="pincode" required>
                        </div>

                        <!-- State -->
                        <div class="mb-3">
                            <label for="state" class="form-label"><i class="fas fa-flag"></i> State</label>
                            <select id="state" name="state" class="form-select" required>
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- City Dropdown -->
                        <div class="mb-3">
                            <label for="city" class="form-label"><i class="fas fa-city"></i> City</label>
                            <select id="city" name="city" class="form-select" required>
                                <option value="">Select City</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Register</button>
                        </div>
                    </form>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle state and city dropdowns
            $('#state').on('change', function() {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: '/getCities/' + state_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                }
            });

            // Validate form with jQuery Validation
            $('#registration-form').validate({
                rules: {
                    name: "required",
                    surname: "required",
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "/check-email",
                            type: "post",
                            data: {
                                _token: "{{ csrf_token() }}",
                                email: function() {
                                    return $('#email').val();
                                }
                            }
                        }
                    },
                    phone_number: "required",
                    address: "required",
                    pincode: "required",
                    state: "required",
                    city: "required",
                    password: {
                        required: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    email: {
                        remote: "Email already in use"
                    }
                }
            });
        });
    </script>
</x-guest-layout>
