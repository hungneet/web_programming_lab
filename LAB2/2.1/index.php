<!DOCTYPE html>
<html>

<head>
    <title>LAB Computer Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>
<header>
    <div class="logo">NGUYEN MINH HUNG</div>
</header>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">LAB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php
                    $baseURL = "http://localhost/index.php?page=";
                    $pages = array(
                        'home' => 'Home',
                        'products' => 'Products',
                        'login' => 'Login',
                        'register' => 'Register'
                    );
                    
                    foreach ($pages as $pageName => $pageLabel) {
                        $isActive = isset($_GET['page']) && $_GET['page'] === $pageName ? 'active' : '';
                        $link = $baseURL . $pageName;
                        echo "<a class='nav-link $isActive' href='$link'>$pageLabel</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                switch ($page) {
                    case 'home':
                        include_once('home.php');
                        break;
                    case 'products':
                        include_once('products.php');
                        break;
                    case 'login':
                        include_once('login.php');
                        break;
                    case 'register':
                        include_once('register.php');
                        break;
                    default:
                        include_once('home.php');
                        break;
                }
            }else{
                include_once('home.php');
            }
            ?>
        </div>
    </main>
</body>
<footer>&copy; 2023 Nguyen Minh Hung. All rights reserved.</footer>

</html>