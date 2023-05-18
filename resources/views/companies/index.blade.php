<!DOCTYPE html>
<html>
<head>
    <title>Companies</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Companies</h1>
        <hr>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo">
                            @else
                                No Logo
                            @endif
                        </td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company) }}" class="btn btn-primary">
                                <i class="fas fa-eye"></i> View
                            </a>
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
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No companies found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
