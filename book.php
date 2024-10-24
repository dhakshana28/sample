<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            max-height: 200px;
            overflow-y: auto;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {background-color: #f1f1f1}
        .dropdown:hover .dropdown-content {display: block;}
        .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
    <script>
        const placesData = {
            North: [
                'Manali', 'Shimla', 'Agra', 'Mussoorie', 'New Delhi', 'Amritsar', 'Ladakh', 'Rishikesh', 'Jaipur'
            ],
            South: [
                'Coorg', 'Munnar', 'Alleppey', 'Ooty', 'Gokarna', 'Mysore', 'Kodaikanal', 'Hampi', 'Wayanad'
            ],
            East: [
                'Cherrapunji', 'Majuli', 'Kohima', 'Gangtok', 'Sikkim', 'Tawang Monastery', 'Kaziranga National Park', 'Imphal', 'Tsomgo Lake'
            ],
            West: [
                'Goa', 'Udaipur', 'Jaipur', 'Kutch', 'Diu', 'Jaisalmer', 'Bharatpur', 'Ranthambore', 'Matheran'
            ]
        };

        function loadPlaces(category) {
            const places = placesData[category] || [];
            const dropdownContent = document.getElementById('places-dropdown');
            dropdownContent.innerHTML = '';
            places.forEach(place => {
                const option = document.createElement('a');
                option.href = '#';
                option.textContent = place;
                option.onclick = function() {
                    document.getElementById('location').value = place;
                };
                dropdownContent.appendChild(option);
            });
        }

        function handleCategoryChange() {
            const category = document.getElementById('category').value;
            loadPlaces(category);
        }

        function validateForm() {
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const emailError = document.getElementById('email-error');
            const phoneError = document.getElementById('phone-error');
            let valid = true;

            // Reset error messages
            emailError.textContent = '';
            phoneError.textContent = '';

            // Validate email format
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                emailError.textContent = 'Please enter a valid email address.';
                valid = false;
            }

            // Validate phone format (simple check)
            if (isNaN(phone) || phone.length < 10) {
                phoneError.textContent = 'Please enter a valid phone number.';
                valid = false;
            }

            return valid;
        }
    </script>
</head>
<body>
    <section class="header">
        <a href="home.php" class="logo">
            <img src="logo.png" alt="Travel Logo" style="height: 50px;"> <!-- Logo Image -->
        </a>
        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="package.php">package</a>
            <a href="book.php">book</a>
            <a href="contact.php">contact</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </section>

    <div class="heading" style="background:url(book.jpg) no-repeat">
        <h1>Book</h1>
    </div>

    <section class="booking">
        <h1 class="heading-title">Book your trip</h1>
        <form action="book_form.php" method="post" class="book-form" onsubmit="return validateForm()">
            <div class="flex">
                <div class="inputBox">
                    <span>name:</span>
                    <input type="text" placeholder="enter your name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>email:</span>
                    <input type="email" id="email" placeholder="enter your email" name="email" required>
                    <span id="email-error" class="error-message"></span>
                </div>
                <div class="inputBox">
                    <span>phone:</span>
                    <input type="text" id="phone" placeholder="enter your number" name="phone" required>
                    <span id="phone-error" class="error-message"></span>
                </div>
                <div class="inputBox">
                    <span>address:</span>
                    <input type="text" placeholder="enter your address" name="address" required>
                </div>
                <div class="inputBox">
                    <span>where to:</span>
                    <div class="dropdown">
                        <input type="text" id="location" placeholder="place you want to visit" name="location" required readonly>
                        <div id="places-dropdown" class="dropdown-content"></div>
                    </div>
                    <div class="inputBox">
                        <span>Category:</span>
                        <select id="category" onchange="handleCategoryChange()">
                            <option value="">Select Category</option>
                            <option value="North">North India</option>
                            <option value="South">South India</option>
                            <option value="East">East India</option>
                            <option value="West">West India</option>
                        </select>
                    </div>
                </div>
                <div class="inputBox">
                    <span>how many:</span>
                    <input type="number" placeholder="number of guests" name="guests" required>
                </div>
                <div class="inputBox">
                    <span>arrivals:</span>
                    <input type="date" name="arrivals" required>
                </div>
                <div class="inputBox">
                    <span>leaving:</span>
                    <input type="date" name="leaving" required>
                </div>
            </div>
            <input type="submit" value="submit" class="btn" name="send">
        </form>
    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick links</h3>
                <a href="home.php"> <i class="fas fa-angle-right"></i>home</a>
                <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
                <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
                <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
            </div>
            <div class="box">
                <h3>Extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i>ask questions</a>
                <a href="#"> <i class="fas fa-angle-right"></i>about us</a>
                <a href="#"> <i class="fas fa-angle-right"></i>privacy policy</a>
                <a href="#"> <i class="fas fa-angle-right"></i>terms of use</a>
            </div>
            <div class="box">
                <h3>Contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i>+91-9876543210</a>
                <a href="#"> <i class="fas fa-phone"></i>+91-9878685848</a>
                <a href="#"> <i class="fas fa-envelope"></i>travels@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i> R.S.PURAM ,Coimbatore-641001</a>
            </div>
            <div class="box">
                <h3>Follow us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
                <a href="#"><i class="fab fa-twitter"></i>twitter</a>
                <a href="#"><i class="fab fa-instagram"></i>instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>linkedin</a>
            </div>
        </div>
        <div class="credit">created by <span>Travel Agency</span> | all rights reserved!</div>
    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
