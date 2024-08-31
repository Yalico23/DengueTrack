<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DengueTrack | <?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="icon" href="/build/img/icono.ico">
    
    <meta name="description" content="DengueTrack es una plataforma dedicada al análisis de datos abiertos, utilizando dashboards en Power BI para estudiar y monitorear el dengue en el Perú.">
    <meta name="keywords" content="dengue, análisis de datos, open data, web scraping, dashboards, Power BI, Perú, salud pública, denguetrack, ucv, Dengue en Lima distritos, 2024">
    <meta name="author" content="Oscar Yalico Espinoza">
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="DengueTrack | <?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="DengueTrack es una plataforma dedicada al análisis de datos abiertos, utilizando dashboards en Power BI para estudiar y monitorear el dengue en el Perú.">
    <meta property="og:url" content="https://yalicodev.online">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DengueTrack | <?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="DengueTrack es una plataforma dedicada al análisis de datos abiertos, utilizando dashboards en Power BI para estudiar y monitorear el dengue en el Perú.">
    
    <link rel="canonical" href="https://yalicodev.online">
</head>

<body>
    <?php include __DIR__ . '/templates/header.php' ?>
    <?php echo $contenido; ?>
    <?php include __DIR__ . '/templates/footer.php' ?>

    <script src="/build/js/main.min.js" defer></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</body>

</html>