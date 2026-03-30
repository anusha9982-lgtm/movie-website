<?php include 'header.php'; ?>

<div class="hero">
    
    <div class="video-background">
        <iframe 
            src="https://www.youtube.com/embed/EySdVK0NK1Y?autoplay=1&mute=1&controls=0&loop=1&playlist=EySdVK0NK1Y&showinfo=0&rel=0&iv_load_policy=3&modestbranding=1" 
            frameborder="0" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
        </iframe>
    </div>

    <div class="hero-content">
        <h1 class="hero-title">THE FALL GUY</h1>
        
        <p class="hero-desc">
            He's a stuntman, and like everyone in the stunt community, 
            he gets blown up, shot, crashed, thrown through windows 
            and dropped from the highest of heights.
        </p>
        
        <div class="buttons">
            <a href="movie.php?movie=fallguy" style="text-decoration:none;">
                <button class="btn btn-white">
                    <span style="font-size:1.2rem; margin-right:5px;">▶</span> Play
                </button>
            </a>
            
            <button class="btn btn-gray">
                <span style="font-size:1.2rem; margin-right:5px;">ℹ</span> More Info
            </button>
        </div>
    </div>
</div>

<div class="content-wrapper">

    <div class="category-title">Top 5 Movies in India Today</div>
    <div class="row-container">
        <a href="movie.php?movie=fallguy" style="text-decoration:none;">
            <div class="top-10-container">
                <span class="rank-num">1</span>
                <img src="images/fallguy.jpg" class="top-10-img" alt="Rank 1">
            </div>
        </a>
        <a href="movie.php?movie=venom" style="text-decoration:none;">
            <div class="top-10-container">
                <span class="rank-num">2</span>
                <img src="images/venom.jpg" class="top-10-img" alt="Rank 2">
            </div>
        </a>
        <a href="movie.php?movie=thedarkknight" style="text-decoration:none;">
            <div class="top-10-container">
                <span class="rank-num">3</span>
                <img src="images/thedarkknight.jpg" class="top-10-img" alt="Rank 3">
            </div>
        </a>
        <a href="movie.php?movie=johnwick" style="text-decoration:none;">
            <div class="top-10-container">
                <span class="rank-num">4</span>
                <img src="images/johnwick.jpg" class="top-10-img" alt="Rank 4">
            </div>
        </a>
        <a href="movie.php?movie=remorse" style="text-decoration:none;">
            <div class="top-10-container">
                <span class="rank-num">5</span>
                <img src="images/remorse.jpg" class="top-10-img" alt="Rank 5">
            </div>
        </a>
    </div>

    <div class="category-title">Trending Now</div>
    <div class="row-container">
        <a href="movie.php?movie=venom" class="movie-card"><img src="images/venom.jpg" alt="Venom"></a>
        <a href="movie.php?movie=hereditary" class="movie-card"><img src="images/hereditary.jpg" alt="Hereditary"></a>
        <a href="movie.php?movie=nightswim" class="movie-card"><img src="images/nightswim.jpg" alt="Night Swim"></a>
        <a href="movie.php?movie=malignant" class="movie-card"><img src="images/malignant.jpg" alt="Malignant"></a>
        <a href="movie.php?movie=conjuring" class="movie-card"><img src="images/conjuring.jpg" alt="Conjuring"></a>
        <a href="movie.php?movie=consumed" class="movie-card"><img src="images/consumed.jpg" alt="Consumed"></a>
    </div>

    <div class="category-title">Blockbuster Action</div>
    <div class="row-container">
        <a href="movie.php?movie=johnwick" class="movie-card"><img src="images/johnwick.jpg" alt="John Wick"></a>
        <a href="movie.php?movie=fallguy" class="movie-card"><img src="images/fallguy.jpg" alt="Fall Guy"></a>
        <a href="movie.php?movie=remorse" class="movie-card"><img src="images/remorse.jpg" alt="Remorse"></a>
        <a href="movie.php?movie=thedarkknight" class="movie-card"><img src="images/thedarkknight.jpg" alt="Dark Knight"></a>
        <a href="movie.php?movie=venom" class="movie-card"><img src="images/venom.jpg" alt="Venom"></a>
    </div>

    <div class="category-title">Comedy Hits</div>
    <div class="row-container">
        <a href="movie.php?movie=yjhd" class="movie-card"><img src="images/yjhd.jpg" alt="YJHD"></a>
        <a href="movie.php?movie=3idiots" class="movie-card"><img src="images/3idiots.jpg" alt="3 Idiots"></a>
        <a href="movie.php?movie=stree" class="movie-card"><img src="images/stree.jpg" alt="Stree"></a>
        <a href="movie.php?movie=golmaal" class="movie-card"><img src="images/golmaal.jpg" alt="Golmaal"></a>
        <a href="movie.php?movie=mbbs" class="movie-card"><img src="images/mbbs.jpg" alt="Munna Bhai"></a>
    </div>
</div>

<footer style="padding: 50px; text-align: center; color: gray; font-size: 13px;">
    <p>Questions? Call 123-456-789-1011</p>
    <p>&copy; 2025 MovieSite. All Rights Reserved.</p>
</footer>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    
    // Elements to control
    const heroSection = document.querySelector('.hero');
    const contentWrapper = document.querySelector('.content-wrapper');
    const rows = document.querySelectorAll('.row-container');
    const titles = document.querySelectorAll('.category-title');

    searchInput.addEventListener('keyup', function() {
        let query = this.value.toLowerCase().trim();

        // 1. TOGGLE HERO SECTION
        // If user types, hide the big video so they can see results. 
        if (query.length > 0) {
            heroSection.style.display = 'none';
            contentWrapper.style.marginTop = '100px'; // Push down so it doesn't hide behind navbar
        } else {
            heroSection.style.display = 'block';
            contentWrapper.style.marginTop = '-100px'; // Restore original overlap
        }

        // 2. FILTER MOVIES
        rows.forEach((row) => {
            // Find the title associated with this row (it's the element right before the row)
            let title = row.previousElementSibling;
            let movies = row.querySelectorAll('.movie-card, .top-10-container');
            let hasVisibleMovie = false;

            movies.forEach(movie => {
                let img = movie.querySelector('img');
                let movieName = img ? img.alt.toLowerCase() : "";

                if (movieName.includes(query)) {
                    movie.style.display = ""; // Show match
                    hasVisibleMovie = true;
                } else {
                    movie.style.display = "none"; // Hide non-match
                }
            });

            // 3. HIDE EMPTY ROWS
            // If a row has no visible movies, hide the whole row AND its title
            if (hasVisibleMovie) {
                row.style.display = "flex";
                if (title) title.style.display = "block";
            } else {
                row.style.display = "none";
                if (title) title.style.display = "none";
            }
        });
    });
});
</script>




</body>
</html>