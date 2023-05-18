<!DOCTYPE html>
<html>
<head>
    <title>Show Employee</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Show Employee</h1>
        <hr>

        <div class="card">
            <div class="card-header">
                <h5>{{ $employee->first_name }} {{ $employee->last_name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Company:</strong> {{ $employee->company->name }}</p>
                <p><strong>Email:</strong> {{ $employee->email }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary float-right">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
