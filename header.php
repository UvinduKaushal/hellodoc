<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'HelloDoc'; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="images/main/1.svg" alt="HelloDoc Logo" class="logo-icon">
                HelloDoc
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Our HelloDoc Services</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="donations.php">Donations</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <a href="login.php" class="account-btn">MY ACCOUNT</a>
        </div>
    </header>
