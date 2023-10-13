<x-guest-layout>
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Midlands State University</h5>
            <p class="text-center small">Enter your credintials to register</p>
        </div>
        <x-alert />
        <form action="{{route('register')}}" method="POST" class="row g-3 needs-validation" novalidate="">
            @csrf
            <div class="col-12">
                <label for="yourUsername" class="form-label">Name</label>
                <div class="input-group has-validation">
                    <input type="text" name="name" class="form-control" id="yourUsername" required>
                    <div class="invalid-feedback">Please enter your username.</div>
                </div>
            </div>
            <div class="col-12">
                <label for="yourEmail" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                </div>
            </div>
            <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your password!</div>
            </div>
            <div class="col-12">
                <label for="yourPassword" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your password confirmation!</div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Register</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Already have account? <a href="{{route('login')}}">Login account.</a></p>
            </div>
        </form>
    </div>
</x-guest-layout>
