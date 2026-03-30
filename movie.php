<?php 
session_start();
include 'header.php'; 

// --- DATABASE CONNECTION FOR REVIEWS ---
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_site";
$port       = 3307;
$conn = new mysqli($servername, $username, $password, $dbname, $port);
?>

<?php
// ✅ MOVIE DATABASE (Static Data for Display)
$movies = [
    // --- ACTION ---
    "fallguy" => [
        "title" => "The Fall Guy",
        "desc" => "Colt Seavers, a retired stuntman, is pulled back into the business when the star of a mega-budget movie goes missing.",
        "year" => "2024", "rating" => "PG-13", "match" => "98% Match", "duration" => "2h 6m",
        "youtube_id" => "j7jPnwVGdZ8",
        "poster" => "images/fallguy.jpg"
    ],
    "venom" => [
        "title" => "Venom",
        "desc" => "A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth.",
        "year" => "2018", "rating" => "PG-13", "match" => "86% Match", "duration" => "1h 52m",
        "youtube_id" => "xLCn88bfWUE",
        "poster" => "images/venom.jpg"
    ],
    "thedarkknight" => [
        "title" => "The Dark Knight",
        "desc" => "When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological tests of his ability.",
        "year" => "2008", "rating" => "PG-13", "match" => "99% Match", "duration" => "2h 32m",
        "youtube_id" => "EXeTwQWrcwY",
        "poster" => "images/thedarkknight.jpg"
    ],
    "johnwick" => [
        "title" => "John Wick",
        "desc" => "An ex-hitman comes out of retirement to track down the gangsters that killed his dog and took everything from him.",
        "year" => "2014", "rating" => "R", "match" => "95% Match", "duration" => "1h 41m",
        "youtube_id" => "C0BMx-qxsP4",
        "poster" => "images/johnwick.jpg"
    ],
    "remorse" => [
        "title" => "Without Remorse",
        "desc" => "An elite Navy SEAL uncovers an international conspiracy while seeking justice for the murder of his pregnant wife.",
        "year" => "2021", "rating" => "R", "match" => "78% Match", "duration" => "1h 49m",
        "youtube_id" => "e-rw2cxFVLg",
        "poster" => "images/remorse.jpg"
    ],

    // --- HORROR ---
    "hereditary" => [
        "title" => "Hereditary",
        "desc" => "A grieving family is haunted by tragic and disturbing occurrences after the death of their secretive grandmother.",
        "year" => "2018", "rating" => "R", "match" => "88% Match", "duration" => "2h 7m",
        "youtube_id" => "V6wWKNij_1M",
        "poster" => "images/hereditary.jpg"
    ],
    "consumed" => [
        "title" => "Consumed",
        "desc" => "A couple's camping trip turns into a nightmare when they become trapped between a madman and a skin-stealing monster.",
        "year" => "2024", "rating" => "R", "match" => "65% Match", "duration" => "1h 30m",
        "youtube_id" => "F1tLzO-0sxo",
        "poster" => "images/consumed.jpg"
    ],
    "nightswim" => [
        "title" => "Night Swim",
        "desc" => "A family moves into a new home, unaware that a dark secret from the home's past will unleash a malevolent force in the backyard pool.",
        "year" => "2024", "rating" => "PG-13", "match" => "70% Match", "duration" => "1h 38m",
        "youtube_id" => "0-wPmz3V_Vo",
        "poster" => "images/nightswim.jpg"
    ],
    "malignant" => [
        "title" => "Malignant",
        "desc" => "Madison is paralyzed by shocking visions of grisly murders, and her torment worsens as she discovers that these waking dreams are in fact terrifying realities.",
        "year" => "2021", "rating" => "R", "match" => "75% Match", "duration" => "1h 51m",
        "youtube_id" => "Gczt0fhawDs",
        "poster" => "images/malignant.jpg"
    ],
    "conjuring" => [
        "title" => "The Conjuring",
        "desc" => "Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse.",
        "year" => "2013", "rating" => "R", "match" => "92% Match", "duration" => "1h 52m",
        "youtube_id" => "k10ETZ41q5o",
        "poster" => "images/conjuring.jpg"
    ],

    // --- ROMANCE ---
    "kabirsingh" => [
        "title" => "Kabir Singh",
        "desc" => "A brilliant but troubled surgeon descends into self-destruction after his girlfriend is forced to marry someone else.",
        "year" => "2019", "rating" => "A", "match" => "94% Match", "duration" => "2h 52m",
        "youtube_id" => "RiANSSgCuJk",
        "poster" => "images/kabirsingh.jpg"
    ],
    "kahonapyaarhai" => [
        "title" => "Kaho Naa... Pyaar Hai",
        "desc" => "A young couple's romance is tragically cut short, but fate gives the girl another chance at love.",
        "year" => "2000", "rating" => "UA", "match" => "89% Match", "duration" => "2h 52m",
        "youtube_id" => "gsV-IjYLiYI",
        "poster" => "images/kahonapyaarhai.jpg"
    ],
    "ddlj" => [
        "title" => "Dilwale Dulhania Le Jayenge",
        "desc" => "Raj and Simran meet in Europe, fall in love, and struggle against cultural traditions to be together.",
        "year" => "1995", "rating" => "U", "match" => "98% Match", "duration" => "3h 9m",
        "youtube_id" => "oIZ4U21DRlM",
        "poster" => "images/ddlj.jpg"
    ],
    "pyaarkiyatohdarnahaikya" => [
        "title" => "Pyaar Kiya Toh Darna Kya",
        "desc" => "A love story full of comedy, action, and drama between a fun-loving guy and a protective brother.",
        "year" => "1998", "rating" => "UA", "match" => "85% Match", "duration" => "2h 39m",
        "youtube_id" => "D5I0PPfMw3A",
        "poster" => "images/pyaarkiyatohdarnahaikya.jpg"
    ],
    "diltohpagalhai" => [
        "title" => "Dil To Pagal Hai",
        "desc" => "A love triangle forms within a dance troupe as dreams and destiny bring people together.",
        "year" => "1997", "rating" => "U", "match" => "90% Match", "duration" => "2h 59m",
        "youtube_id" => "658ZWlnkPJQ",
        "poster" => "images/diltohpagalhai.jpg"
    ],

    // --- COMEDY ---
    "yjhd" => [
        "title" => "Yeh Jawaani Hai Deewani",
        "desc" => "Kabir and Naina meet during a trekking trip where she falls in love with him but refrains from expressing it.",
        "year" => "2013", "rating" => "PG", "match" => "94% Match", "duration" => "2h 40m",
        "youtube_id" => "Rbp2XUSeUNE",
        "poster" => "images/yjhd.jpg"
    ],
    "3idiots" => [
        "title" => "3 Idiots",
        "desc" => "Two friends are searching for their long lost companion. They revisit their college days and recall the memories.",
        "year" => "2009", "rating" => "PG-13", "match" => "98% Match", "duration" => "2h 50m",
        "youtube_id" => "K0eDlFX9GMc",
        "poster" => "images/3idiots.jpg"
    ],
    "stree" => [
        "title" => "Stree",
        "desc" => "In the small town of Chanderi, the menfolk live in fear of an evil spirit named 'Stree' who abducts men in the night.",
        "year" => "2018", "rating" => "UA", "match" => "89% Match", "duration" => "2h 8m",
        "youtube_id" => "gzeaGcLLl_A",
        "poster" => "images/stree.jpg"
    ],
    "golmaal" => [
        "title" => "Golmaal: Fun Unlimited",
        "desc" => "Four runaway crooks take shelter in a bungalow which is owned by a blind couple.",
        "year" => "2006", "rating" => "UA", "match" => "90% Match", "duration" => "2h 30m",
        "youtube_id" => "0O1wYHJYt54",
        "poster" => "images/golmaal.jpg"
    ],
    "mbbs" => [
        "title" => "Munna Bhai M.B.B.S.",
        "desc" => "A gangster sets out to fulfill his father's dream of becoming a doctor.",
        "year" => "2003", "rating" => "UA", "match" => "96% Match", "duration" => "2h 36m",
        "youtube_id" => "6l_5506JzHQ",
        "poster" => "images/mbbs.jpg"
    ]
];

// Get key or default
$key = $_GET['movie'] ?? 'fallguy';
$movie = $movies[$key] ?? $movies['fallguy'];
?>

<div class="hero" style="background: url('<?php echo $movie['poster']; ?>') center/cover no-repeat;">
    
    <div class="video-background">
        <iframe 
            src="https://www.youtube.com/embed/<?php echo $movie['youtube_id']; ?>?autoplay=1&mute=1&controls=0&loop=1&playlist=<?php echo $movie['youtube_id']; ?>&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1" 
            frameborder="0" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
        </iframe>
    </div>

    <div class="hero-content">
        <h1 class="hero-title"><?php echo strtoupper($movie['title']); ?></h1>
        
        <div style="display:flex; gap:15px; color:#cfcfcf; margin-bottom:20px; font-weight:600; font-size:1.1rem;">
            <span style="color:#46d369; font-weight:bold;"><?php echo $movie['match']; ?></span>
            <span><?php echo $movie['year']; ?></span>
            <span style="border:1px solid #aaa; padding: 0 5px; font-size:0.8rem; line-height:1.5;"> <?php echo $movie['rating']; ?> </span>
            <span><?php echo $movie['duration']; ?></span>
        </div>

        <p class="hero-desc">
            <?php echo $movie['desc']; ?>
        </p>

        <div class="buttons">
            <a href="https://www.youtube.com/watch?v=<?php echo $movie['youtube_id']; ?>" target="_blank" style="text-decoration:none;">
                <button class="btn btn-white">
                    <span style="font-size:1.2rem; margin-right:5px;">▶</span> Play with Sound
                </button>
            </a>
            
            <button class="btn btn-gray" onclick="alert('Added to My List')">
                <span style="font-size:1.2rem; margin-right:5px;">+</span> My List
            </button>
        </div>
    </div>
</div>

<div class="reviews-section">
    
    <div class="section-header">
        <h2>Audience Reviews</h2>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="review-form-card">
            <h3>Write a Review</h3>
            
            <?php if(isset($_GET['success'])): ?>
                <div class="alert success" style="background:#2e7d32; color:white; margin-bottom:15px;">
                    Review submitted successfully!
                </div>
            <?php endif; ?>

            <form action="review_process.php" method="POST">
                <input type="hidden" name="movie_id" value="<?php echo $key; ?>">
                
                <div style="margin-bottom: 15px;">
                    <label style="color: #aaa; font-size: 14px; display:block; margin-bottom:8px;">Rating</label>
                    <select name="rating" style="width: 200px; padding: 10px; background: #2f2f2f; color: white; border: 1px solid #444; border-radius: 4px;">
                        <option value="5">★★★★★ Excellent</option>
                        <option value="4">★★★★ Good</option>
                        <option value="3">★★★ Average</option>
                        <option value="2">★★ Poor</option>
                        <option value="1">★ Terrible</option>
                    </select>
                </div>

                <textarea name="review" placeholder="Share your thoughts on the movie..." required style="height: 120px; width: 100%;"></textarea>
                
                <button type="submit" style="width: auto; padding: 12px 30px; margin-top: 10px;">Post Review</button>
            </form>
        </div>
    <?php else: ?>
        <div class="review-form-card" style="text-align: center; padding: 40px;">
            <p style="color: #aaa; font-size: 16px;">
                <a href="login.php" style="color: #e50914; font-weight:bold; text-decoration:none;">Sign In</a> to share your thoughts on this movie.
            </p>
        </div>
    <?php endif; ?>

    <div class="reviews-list">
        <?php
        $sql = "SELECT * FROM reviews WHERE movie_id = ? ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Generate Initials for Avatar (e.g., "John Doe" -> "J")
                $initial = strtoupper(substr($row['username'], 0, 1));
                $stars = str_repeat("★", $row['rating']);
                $date = date("F j, Y", strtotime($row['created_at']));

                echo '
                <div class="review-card">
                    <div class="review-avatar">' . $initial . '</div>
                    <div class="review-content">
                        <div class="review-header">
                            <div>
                                <span class="review-author">' . htmlspecialchars($row['username']) . '</span>
                                <span class="review-date">' . $date . '</span>
                            </div>
                        </div>
                        <div class="star-rating">' . $stars . '</div>
                        <p class="review-text">' . htmlspecialchars($row['review_text']) . '</p>
                    </div>
                </div>';
            }
        } else {
            echo '<p style="color: #777; font-style: italic; text-align:center; margin-top:40px;">No reviews yet. Be the first to add one!</p>';
        }
        $stmt->close();
        ?>
    </div>

</div>

</body>
</html>