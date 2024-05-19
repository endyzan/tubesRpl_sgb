<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us & Follow Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
        }
        .section {
            display: flex;
            flex-direction: column;
            width: 20%;
        }
        .section1 {
            display: flex;
            flex-direction: column;
            width: 40%;
            margin-left:700px;
            
        }
        .section h2 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 24px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .section1 h2 {
            margin: 0;
            margin-bottom: 10px;
            font-size: 24px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        
        }
        .links {
            display: flex;
            gap: 20px; /* Space between links */
        }
        .links a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .social-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .social-icons a {
            text-decoration: none;
            color: #000;
            font-size: 24px;
        }
        .section hr {
            border: 0;
            height: 3px; 
            background: #000; 
            margin-top: 1px;
            margin-bottom:15px;
            width: 100%;
        }
        .section1 hr {
            border: 0;
            height: 3px; 
            background: #000; 
            margin-top: 1px;
            margin-bottom:15px;
            width: 90%; 
            margin-left:0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section1">
            <h2>About Us</h2>
            <hr>
            <div class="links">
                <a href="#">PROFIL KAMI</a>
                <a href="#">T & C</a>
                <a href="#">BOOKING TICKET</a>
            </div>
        </div>
        <div class="section">
            <h2>Follow Us</h2>
            <hr>
            <div class="social-icons">
                <a href="#"><img src="../../asset/img/fc.png" alt="Facebook"></a>
                <a href="#"><img src="../../asset/img/tweet.png" alt="Twitter"></a>
                <a href="#"><img src="../../asset/img/ig.png" alt="Instagram"></a>
                <a href="#"><img src="../../asset/img/youtube.png" alt="YouTube"></a>
            </div>
        </div>
    </div>
</body>
</html>
