<header class="header">

    <div class="flex">

        <nav class="navbarlogo">
            <a href="index.php" class="logoimg"><img src="images/logo.png" alt="logo"></a>
            <a href="index.php" class="logo">ESKYDAM</a>
        </nav>


        <nav class="navbar">
            <ul>
                <li><a href="index.php">Inici</a></li>
                <li><a href="#">Informació +</a>
                    <ul>
                        <li><a href="about.php">Sobre nosaltres</a></li>
                        <li><a href="contact.php">Contacte</a></li>
                    </ul>
                </li>
                <li><a href="home.php">Botiga</a></li>
                <li><a href="temps.php">Temps</a></li>
                <li><a href="#">Inicia sessió +</a>
                    <ul>
                        <li><a href="login.php">Iniciar</a></li>
                        <li><a href="register.php">Registra't</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <div id="carrito" class="fa-solid fa-cart-shopping"></i>
            
        </div>

        <div class="account-box">
            <p>nom d'usuari : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>correu electrònic : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Tanca sessió</a>
            <a href="perfil.php" class="perfil-btn">Perfil</a>
        </div>

    </div>

</header>