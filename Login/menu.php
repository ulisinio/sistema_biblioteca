<aside class="sidebar">
    <div class="logo">
        <a href="principal.php">
            <img src="biblio.jpg" alt="Logo_Tecnm">
        </a>
    </div>
    <div class="user-info">
        <p class="osito">Sesión iniciada como:</p>
        <br>
        <p><?php echo htmlspecialchars($usuario); ?></p>
    </div>
    <nav class="menu">
        <ul>
            <li>
                <a href="autor.php" class="menu-item">
                    <i class="bi bi-person-fill"></i><br>
                    Autores
                </a>
            </li>
            <li>
                <a href="carreras.php" class="menu-item">
                    <i class="bi bi-book-fill"></i><br>
                    Carreras
                </a>
            </li>
            <li>
                <a href="libros.php" class="menu-item">
                    <i class="bi bi-journal-bookmark-fill"></i><br>
                    Libros
                </a>
            </li>
            <li>
                <a href="usuarios.php" class="menu-item">
                    <i class="bi bi-person-lines-fill"></i><br>
                    Usuarios
                </a>
            </li>
        </ul>
    </nav>
</aside>

