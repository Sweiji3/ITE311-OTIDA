<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            ITE311 LMS
        </a>

        <div class="d-flex align-items-center">

            <a class="nav-link text-white me-3"
               href="{{ route('dashboard') }}">
                Dashboard
            </a>


            @if (Auth::user()->role === 'admin')

                <span class="text-white me-3">
                    Manage Users
                </span>

                <span class="text-white me-3">
                    Reports
                </span>

            @elseif (Auth::user()->role === 'teacher')

                <span class="text-white me-3">
                    Lessons
                </span>

                <span class="text-white me-3">
                    Grades
                </span>

            @elseif (Auth::user()->role === 'student')

                <span class="text-white me-3">
                    My Courses
                </span>

                <span class="text-white me-3">
                    My Submissions
                </span>

            @endif


            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="btn btn-outline-light btn-sm">
                    Logout
                </button>

            </form>

        </div>

    </div>
</nav>