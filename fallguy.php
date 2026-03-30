<?php include 'header.php'; ?>
<div class="movie-detail">
    <!-- Poster -->
    <div class="movie-poster">
        <img src="images/fallguy.jpg" alt="Fall Guy Poster">
    </div>

    <!-- Movie Info -->
    <div class="movie-info">
        <h1>🔥 The Fall Guy</h1>
        <p class="description">
            After leaving the business one year earlier, battle-scarred stuntman Colt Seavers springs back into action 
            when the star of a big studio movie suddenly disappears. As the mystery surrounding the missing actor 
            deepens, Colt soon finds himself ensnared in a sinister plot that pushes him to the edge of a fall more 
            dangerous than any stunt.
        </p>

        <div class="details">
            <p><strong>Release date:</strong> 3 May 2024 (USA)</p>
            <p><strong>Director:</strong> David Leitch</p>
            <p><strong>Box office:</strong> $181.1 million</p>
            <p><strong>Distributed by:</strong> Universal Pictures</p>
            <p><strong>Based on:</strong> <em>The Fall Guy</em> by Glen A. Larson</p>
            <p><strong>Cinematography:</strong> Jonathan Sela</p>
        </div>

        <!-- Watch Button -->
        <button class="watch-btn" onclick="document.getElementById('movie-player').style.display='block'; this.style.display='none';">
            ▶ Watch Movie
        </button>

        <!-- Movie Player -->
        <div id="movie-player" style="display:none; margin-top:30px;">
            <iframe width="100%" height="500" 
                src="https://www.youtube.com/embed/EXAMPLE_ID" 
                frameborder="0" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<style>
    body {
        margin: 0;
        background: #000;
        color: #fff;
        font-family: Arial, sans-serif;
    }

    .movie-detail {
        display: flex;
        gap: 40px;
        padding: 60px;
        max-width: 1300px;
        margin: auto;
        align-items: flex-start;
    }

    .movie-poster img {
        width: 350px;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(229, 9, 20, 0.6);
    }

    .movie-info {
        flex: 1;
    }

    .movie-info h1 {
        font-size: 36px;
        color: #e50914;
        margin-bottom: 20px;
    }

    .movie-info .description {
        font-size: 18px;
        line-height: 1.7;
        color: #ddd;
        margin-bottom: 20px;
    }

    .movie-info .details p {
        font-size: 16px;
        margin: 6px 0;
        color: #bbb;
    }

    .watch-btn {
        margin-top: 20px;
        padding: 15px 35px;
        font-size: 20px;
        background: #e50914;
        border: none;
        border-radius: 8px;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
    }

    .watch-btn:hover {
        background: #b00610;
        transform: scale(1.05);
    }

    iframe {
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.7);
    }
</style>

<footer style="text-align:center; padding:20px; background:#111; color:#aaa;">
    <p>&copy; 2025 Movie Website. All Rights Reserved.</p>
</footer>
</body>
</html>