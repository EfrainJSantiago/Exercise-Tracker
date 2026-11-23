<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>FitTrack PHP</title>
    <link rel="stylesheet" href="styles/main.css"/>
</head>

<!-- the body section -->
<body>
    <header><h1>FitTrack PHP</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>No se pudo conectar a la base de datos.</p>
        <p>Verifica que MySQL esté encendido.</p>
        
        <!-- htmlspecialchars protege el mensaje de error para que nadie ponga codigo malicioso ahi -->
        <p>Error message: <?php echo htmlspecialchars($error_message); ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> FitTrack PHP.</p>
    </footer>
</body>
</html>