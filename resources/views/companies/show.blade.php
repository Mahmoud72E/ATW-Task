<!DOCTYPE html>
<html>
<head>
    <title>Company Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Company Details</h1>
        <hr>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $company->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>Logo:</strong></p>
                @if ($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
                @else
                    No Logo
                @endif
                <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            </div>
            <div class="card-footer">
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary float-right">
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
