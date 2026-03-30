🎬 MovieSite - Official Streaming Platform
A responsive, Netflix-inspired movie streaming web application built with PHP, MySQL, and Vanilla JavaScript. This project features a full user authentication system, dynamic content filtering, and an interactive review system.

🚀 Key Features
Dynamic Hero Sections: Features auto-playing YouTube video backgrounds for an immersive experience.

User Authentication: Secure Signup and Login systems utilizing password_hash and password_verify.

Interactive Reviews: Logged-in users can rate and review movies, which are displayed dynamically on movie detail pages.

Live Search: A real-time title filter that updates the UI instantly as you type.

Admin Dashboard: Restricted access for administrators to monitor user feedback and manage site activities.

Custom Dark Theme: A glass-effect navbar and smooth-scrolling movie rows designed for modern browsers.

📂 Project Structure
Core Logic
db.php: Centralized database connection configured for port 3307.

header.php: Global navigation, session management, and the live search interface.

style.css: Professional dark-themed styling and UI animations.

User Experience
movies.php: Main dashboard featuring "Trending Now," "Top 5," and categorized movie rows.

movie.php: Dynamic page that loads movie details and user reviews based on URL parameters.

personal.php: User profile page showing account status and details.

fallguy.php: Dedicated movie detail page with an integrated player.

Data Processing
login_process.php: Validates user credentials and initializes sessions.

signup_process.php: Handles new user registration with unique email/username checks.

review_process.php: Backend logic for storing movie ratings and user comments.

feedback.php: Allows users to send direct messages to site administrators.

🛠️ Installation & Setup
Environment: Ensure you are using XAMPP (or a similar stack) with PHP and MySQL.

Database Configuration:

Open phpMyAdmin and create a database named movie_site.

Update db.php if your MySQL port is different from 3307.

SQL Setup: Execute the following SQL to create the necessary tables:

SQL
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id VARCHAR(50),
    username VARCHAR(50),
    rating INT,
    review_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
🔒 Security
Prepared Statements: Used in authentication and reviews to prevent SQL injection.

Security Gates: Sensitive pages (like admin.php and personal.php) verify active sessions before loading.
