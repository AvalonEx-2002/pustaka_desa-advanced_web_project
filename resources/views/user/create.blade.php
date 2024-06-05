@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card-header" style="margin-bottom: 20px;">
        <h5>Creating New :
            <strong>System User</strong>
        </h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
                <label for="name">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="email" placeholder="Email Address" required>
                <label for="email">Email Address</label>
            </div>

            <div class="form-floating mb-3">
                <input name="registrationDate" type="date" class="form-control" id="registrationDate" placeholder="Registration Date" required>
                <label for="registrationDate">Registration Date</label>
            </div>

            <div class="form-floating mb-3">
                <select name="userCategory" class="form-select" aria-label="User Category" id="userCategory" required>
                    <option value="Supervisor">Supervisor</option>
                    <option selected value="Volunteer">Volunteer</option>
                </select>
                <label for="userCategory">User Category</label>
            </div>

            <!-- Hidden input field for userLevel -->
            <input type="hidden" name="userLevel" id="userLevel">

            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>

<script>
    // Get the userCategory dropdown and userLevel input field
    var userCategoryDropdown = document.getElementById('userCategory');
    var userLevelInput = document.getElementById('userLevel');

    // Set the default userCategory
    var defaultUserCategory = 'Volunteer'; // Change this to the desired default value

    // Set the default value of userCategory dropdown
    userCategoryDropdown.value = defaultUserCategory;

    // Assign the appropriate userLevel based on default userCategory
    if (defaultUserCategory === 'Supervisor') {
        userLevelInput.value = 0;
    } else if (defaultUserCategory === 'Volunteer') {
        userLevelInput.value = 1;
    }

    // Trigger the change event manually
    var event = new Event('change');
    userCategoryDropdown.dispatchEvent(event);

    // Listen for changes in the userCategory dropdown
    userCategoryDropdown.addEventListener('change', function() {
        var userCategory = this.value;

        // Assign the appropriate userLevel based on userCategory
        if (userCategory === 'Supervisor') {
            userLevelInput.value = 0;
        } else if (userCategory === 'Volunteer') {
            userLevelInput.value = 1;
        }
    });
</script>

@endsection