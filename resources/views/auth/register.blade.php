@extends('layouts.guest')

@section('content')
    <div class="page-header min-vh-100">
        <div class="container">
        <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" 
            style="background-image: url('{{ asset('images/interior-1.jpg')}}'); background-size: cover;">
            </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card card-plain" style="border: none;">
                <div class="card-header pb-0" style="background-color: transparent;">
                    <h4 class="font-weight-bolder text-dark" style="text-align: center;font-size:3em;"> SIGN UP</h4>
                </div>
                
                <div class="card-body pt-0">
                        <div class="form-check form-check-info text-start ps-0">
                            <input class="form-check-input userCheckElement" type="radio" value="0" id="flexCheckDefault" name="userType">
                            <label class="form-check-label" for="flexCheckDefault">User</label>

                            <input class="form-check-input vendorCheckElement" type="radio" value="2" id="flexCheckDefault" name="userType" style="margin-left: 22px !important;">
                            <label class="form-check-label" for="flexCheckDefault">Vendor</label>
                        </div>

                
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label nameElement">First Name</label>
                                <input type="text" name="first_name" class="form-control" required autocomplete="given-name">
                            </div>
                            <div class="input-group input-group-outline mb-3 lastNameElement">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" autocomplete="family-name">
                            </div>
                            <div class="input-group input-group-outline mb-3 middleNameElement">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" autocomplete="additional-name">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="text" name="phone_number" class="form-control" required autocomplete="tel">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required autocomplete="email">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required autocomplete="new-password">
                            </div>
                            <div class="input-group input-group-outline">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            </div>
                            <small class="form-text" style="color:#e91e63;">
                                Your password must be 6 characters long.
                            </small>
                            <div class="input-group input-group-outline mt-3 mb-3 dobElement">
                                <label class="form-label">Date of Birth</label>
                                <input type="text" style="width: 100%;border-radius:0.375rem;border:1px solid #d2d6da;padding:0.4rem 0.3rem;background-color:transparent;" name="dob" onfocus="(this.type='date');this.style.borderColor = '#e91e63';this.style.borderTopColor = 'transparent';this.style.boxShadow = 'inset 1px 0 #e91e63, inset -1px 0 #e91e63, inset 0 -1px #e91e63';" onblur="(this.type='text');">
                            </div>
                            <div class="form-check form-check-inline text-start ps-0">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="Male" required>
                                <label class="form-check-label" for="Male">Male</label>
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="Female" required>
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                            <div class="input-group input-group-outline mb-3 emergencyContactElement">
                                <label class="form-label">Emergency contact</label>
                                <input type="text" name="emergency" class="form-control" autocomplete="tel">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required autocomplete="street-address">
                            </div>
                            <div class="form-check form-check-info text-start ps-0">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                            </div>
                        </form>

                
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1" style="border: none;">
                <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{ url('login')}}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                </p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        const vendorCheckElement = document.querySelector(".vendorCheckElement");
        const userCheckElement = document.querySelector(".userCheckElement");
        const dobElement = document.querySelector(".dobElement");
        const emergencyContactElement = document.querySelector(".emergencyContactElement");
        const lastNameElement = document.querySelector(".lastNameElement");
        const middleNameElement = document.querySelector(".middleNameElement");
        const nameElement = document.querySelector(".nameElement");

        vendorCheckElement.addEventListener('click', (e) => {
            dobElement.style.display = 'none';
            emergencyContactElement.style.display = 'none';
            lastNameElement.style.display = 'none';
            middleNameElement.style.display = 'none';
            nameElement.textContent = "Company Name";
        })
        
        userCheckElement.addEventListener('click', (e) => {
            dobElement.style.display = 'flex';
            emergencyContactElement.style.display = 'flex';
            lastNameElement.style.display = 'flex';
            middleNameElement.style.display = 'flex';
            nameElement.textContent = "First Name";
        })
    </script>
@endsection
