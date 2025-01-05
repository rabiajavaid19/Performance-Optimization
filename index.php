<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optimized Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Businesses</h1>
        <div class="row" id="businesses">
            <!-- Businesses and services will load here -->
        </div>
    </div>

    <!-- Lazy Load Script -->
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const response = await fetch('optimized_search.php?location=&min_price=0&max_price=100000');
            const businesses = await response.json();
            const container = document.getElementById('businesses');

            container.innerHTML = businesses.map(b => `
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="uploads/optimized_image.jpg" class="card-img-top lazyload" alt="${b.name}">
                        <div class="card-body">
                            <h5 class="card-title">${b.name}</h5>
                            <p class="card-text">${b.service_name} - RS ${b.price}</p>
                            <p class="card-text"><small class="text-muted">${b.location}</small></p>
                        </div>
                    </div>
                </div>
            `).join('');
        });
    </script>
</body>
</html>
