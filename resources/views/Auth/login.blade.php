@extends('layouts.plantilla')

@section('title', 'Login')

@section('login')

    <div class="py-10">
    <section class="mt-6">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="img/logo.jpg" class="img-fluid w-100" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <h3 class="text-center">Login</h3>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" autofocus value="{{ old('email') }}" />
                        </div>
                        <div class="mt-1">
                            @error('email')
                                <label class="text-red-600 text-justify text-xs">{{ $message }}</label>
                            @enderror
                        </div>


                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter password" />
                            @error('password')
                                <label class="text-red-600 text-justify text-xs">{{ $message }}</label>
                            @enderror
                        </div>

                        @error('login')
                            <label class="text-red-600 text-justify text-xs">{{ $message }}</label>
                        @enderror
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection
