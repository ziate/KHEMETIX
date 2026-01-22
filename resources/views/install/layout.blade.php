<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تثبيت Khemetix</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .install-card { max-width: 600px; margin: 50px auto; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .card-header { background-color: #0d6efd; color: white; border-radius: 15px 15px 0 0 !important; padding: 20px; }
        .btn-primary { background-color: #0d6efd; border: none; }
        .step-indicator { margin-bottom: 30px; }
        .step { width: 30px; height: 30px; border-radius: 50%; background: #dee2e6; display: inline-block; line-height: 30px; text-align: center; margin: 0 5px; }
        .step.active { background: #0d6efd; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card install-card">
            <div class="card-header text-center">
                <h3>Khemetix Installer</h3>
            </div>
            <div class="card-body p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
