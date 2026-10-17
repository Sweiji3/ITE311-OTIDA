
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('templates.header')
<div class="container mt-5">
    <h2>Dashboard</h2>
    <p>Welcome, {{ $user->name }}</p>
    <p>Role: {{ ucfirst($role) }}</p>
    @if ($role == 'admin')
        <div class="card mt-3">
            <div class="card-header bg-danger text-white">
                Admin Dashboard
            </div>
            <div class="card-body">
                <p>Manage users, courses, system settings, and reports.</p>
                <a href="#" class="btn btn-danger">Manage Users</a>
                <a href="#" class="btn btn-secondary">System Reports</a>
            </div>
        </div>
    @elseif ($role == 'teacher')
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Teacher Dashboard
            </div>
            <div class="card-body">
                <p>Create lessons, manage student submissions, and update grades.</p>
                <a href="#" class="btn btn-primary">Manage Lessons</a>
                <a href="#" class="btn btn-secondary">View Grades</a>
            </div>
        </div>
    @elseif ($role == 'student')
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Student Dashboard
            </div>
            <div class="card-body">
                <p>View enrolled courses, submit activities, and check grades.</p>
                <a href="#" class="btn btn-success">My Courses</a>
                <a href="#" class="btn btn-secondary">My Grades</a>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-3">
            No valid role assigned to this account.
        </div>
    @endif
</div>
</body>
</html>
