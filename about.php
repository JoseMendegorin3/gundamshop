<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
  
    <link rel="stylesheet" href="css/style.css">
    <style>
        
        /* Additional styles specific to the developer's message and image */
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap; /* Ensures items wrap to new line if needed */
            max-width: 1500px; /* Adjust as necessary */
            margin: auto; /* Centers the container */
            padding: 20px;
        }

        .developer-message {
            flex: 1; /* Takes up remaining space */
            padding: 20px;
        }

        .developer-image {
            flex: 1; /* Takes up remaining space */
            padding: 20px;
            text-align: center; /* Centers the image */
        }

        .developer-image img {
            max-width: 100%; /* Ensures image doesn't exceed its container */
            height: auto; /* Maintains aspect ratio */
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Stacks items vertically on smaller screens */
            }
        }
    </style>
</head>
<body>
<header>
    <section class="flex">
        <a href="index.php" class="logo">
            <img src="images/logo.png" alt="Logo" class="logo-img">
            Gundam<span>Store</span>
        </a>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </section>
</header>
<div class="container">
    <h1>About Us</h1>
    <div class="content">
        <!-- Your existing content for About Us goes here -->
        <p>Gundam (Japanese: ガンダムシリーズ, Hepburn: Gandamu Shirīzu, lit. Gundam Series) is a Japanese military science fiction media franchise.
            Created by Yoshiyuki Tomino and Sunrise (now Bandai Namco Filmworks), the franchise features giant robots, or mecha, with the name "Gundam".
            The franchise began on April 7, 1979, with Mobile Suit Gundam, a TV series that defined the "real robot" mecha anime genre by featuring giant robots called mobile suits (including the original titular mecha) in a militaristic setting. 
            The popularity of the series and its merchandise spawned a franchise that includes 50 TV series, films and OVAs as well as manga, novels and video games, along with a whole industry of plastic model kits known as Gunpla which makes up 90 percent of the Japanese character plastic-model market.

            Academics in Japan have viewed the series as inspiration; in 2008, the virtual Gundam Academy was planned as the first academic institution based on an animated TV series.

            As of March 2020, the franchise is fully owned by Bandai Namco Holdings through subsidiaries Sotsu and Sunrise. The Gundam franchise had grossed over $5 billion in retail sales by 2000. By 2022, the annual revenue of the Gundam franchise reached ¥101.7 billion per year,[8] ¥44.2 billion of which was retail sales of toys and hobby items.
        </p>
    </div>
    <!-- Developer's Message and Image Side by Side -->
    <div class="developer-message">
        <h2>Developer's Message</h2>
        <p>Hey There! We are Gundam Store. A Student of IT in Softnet Information Technology Center. We love designing websites and exploring new things. Learning new things is our hobby.</p>

    </div>
    <div class="developer-image">
        <img src="images/aboutbg.png" alt="Developer Image">
    </div>
</div>
</body>
</html>
