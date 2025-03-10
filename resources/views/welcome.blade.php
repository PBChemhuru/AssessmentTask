<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>One-Page Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>

    @include('layouts.sections.nav-bar')
    <!-- Sections -->
    @include('layouts.sections.home', ['homeContents' => $sections['home'] ?? collect()])
    @include('layouts.sections.aboutus', ['aboutUsContents' => $sections['aboutus'] ?? collect()])
    @include('layouts.sections.features', ['featuresContents' => $sections['features'] ?? collect()])
    @include('layouts.sections.services', ['servicesContents' => $sections['services'] ?? collect()])
    @include('layouts.sections.pricing', ['pricingContents' => $sections['pricing'] ?? collect()])
    @include('layouts.sections.testimonials', ['testimonialsContents' => $sections['testimonials'] ?? collect()])
    @include('layouts.sections.contactus', ['contactContents' => $sections['contact'] ?? collect()])




    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
