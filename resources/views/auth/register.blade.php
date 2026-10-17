
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register | ITE311</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            background: #f8f9fa;
        }

        .register-card {
            max-width: 500px;
            margin: 60px auto;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

    </style>

</head>

<body>


<div class="container">

    <div class="card register-card">

        <div class="card-body p-4">

            <h2 class="text-center mb-4">
                Create Account
            </h2>


            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form method="POST"
                  action="{{ route('register.store') }}">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required>

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        required>

                </div>


                <button
                    type="submit"
                    class="btn btn-success w-100">

                    Register

                </button>

            </form>


            <div class="text-center mt-3">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>


        </div>

    </div>

</div>


</body>

</html>
