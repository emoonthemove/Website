<div class="head home section section--light section--color">
    <div class="content">
        <div class="content__floating">
            <div id="scene">
                <img data-depth="0.6" class="content__floating-head" src="/wp-content/themes/kaboom/assets/images/head.jpg" alt="">
            </div>
        </div>

        <?php 
        if ($locale == 'de') { 
            echo '<p style="max-width: 19rem;">Kaboom ist ein kleines, aber fähiges visuelles Handwerksstudio.</p>';
        } else {
            echo '<p>Kaboom is a small, yet potent visual craftsmanship studio.</p>';
        }
        ?>

        <?php 
        if ($locale == 'de') { 
            echo '
                <div class="page-links">
                    <div class="page-link"><a href="/de/design">Design</a></div>
                    <div class="page-link"><a href="/de/video">Video</a></div>
                    <div class="page-link"><a href="/de/illustration">Illustration</a></div>
                    <div class="page-link"><a href="/de/animation">Animation</a></div>
                    <div class="page-link"><a href="https://youtu.be/q_IZ6jmpkz0" target="_blank" rel="noopener">Showreel</a></div>
                </div>
            ';
        } else {
            echo '
                <div class="page-links">
                    <div class="page-link"><a href="/design">Design</a></div>
                    <div class="page-link"><a href="/video">Video</a></div>
                    <div class="page-link"><a href="/illustration">Illustration</a></div>
                    <div class="page-link"><a href="/animation">Animation</a></div>
                    <div class="page-link"><a href="https://youtu.be/q_IZ6jmpkz0" target="_blank" rel="noopener">Showreel</a></div>
                </div>
            ';
        }
        ?>

        <div class="next-section">
            <img class="next-section__arrow" src="/wp-content/themes/kaboom/assets/images/arrow-dark.svg" alt="">
            <img class="next-section__label next-section__label--portfolio" src="/wp-content/themes/kaboom/assets/images/label-portfolio-dark.svg" alt="">
        </div>
    </div>
    <img class="backdrop backdrop-home" src="/wp-content/themes/kaboom/assets/images/backdrop-head-home.jpg" alt="">
</div>