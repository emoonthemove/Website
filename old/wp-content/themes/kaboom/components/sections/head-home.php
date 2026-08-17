<div class="head home section section--light section--color">

    <div class="content">
        <div class="content__floating">
            <div id="scene">
                <img data-depth="0.6" class="content__floating-head" src="/wp-content/themes/kaboom/assets/images/head.jpg" alt="">
            </div>
        </div>

        <div class="header__inner web__bubble-container">
            <div class="web__bubble-content">

                <?php 
                if ($locale == 'de') { 
                    echo '<img class="web__bubble web__bubble--active web__toggle" src="/wp-content/themes/kaboom/assets/images/bubble-de.svg" alt="">';
                } else {
                    echo '<img class="web__bubble web__bubble--active web__toggle" src="/wp-content/themes/kaboom/assets/images/bubble.svg" alt="">';
                }
                ?>

                <svg class="web__bubble-close web__bubble-close--active" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.74 17.74"><g data-name="Layer 2"><path d="M8.87 0a8.87 8.87 0 108.87 8.87A8.87 8.87 0 008.87 0zm4.06 6.23a29.49 29.49 0 00-3.25 2.64 25.19 25.19 0 003.1 2.63.92.92 0 01.11 1.5.91.91 0 01-1.5-.16 26.82 26.82 0 00-2.54-3.17 27.44 27.44 0 00-2.73 3.18.93.93 0 01-1.52.15.93.93 0 01.21-1.51 28.3 28.3 0 003.25-2.62A26.18 26.18 0 005 6.23a.92.92 0 01-.12-1.51.93.93 0 011.51.16 26 26 0 002.5 3.18 28.6 28.6 0 002.73-3.18.93.93 0 011.51-.16.93.93 0 01-.2 1.51z" data-name="Layer 1"/></g></svg>
            </div>
        </div>

        <?php 
        if ($locale == 'de') { 
            echo '<p style="max-width: 19rem;">Kaboom ist ein kleines, aber starkes New-Age-Marketingstudio.</p>';
        } else {
            echo '<p style="max-width: 19rem;">A small, yet potent new-age marketing studio based in Sofia, Bulgaria.</p>';
        }
        ?>

        <?php 
        if ($locale == 'de') { 
            echo '
                <div class="page-links">
                    <div class="page-link"><span class="web__toggle">WEB</span></div>
                    <div class="page-link"><a href="/de/design">Design</a></div>
                    <div class="page-link"><a href="/de/video">Video</a></div>
                    <div class="page-link"><a href="/de/illustration">Illustration</a></div>
                    <div class="page-link"><a href="/de/animation">Animation</a></div>
                    <div class="page-link"><a href="https://youtu.be/hbl-YQaZYdo" target="_blank" rel="noopener">Showreel</a></div>
                </div>
            ';
        } else {
            echo '
                <div class="page-links">
                    <div class="page-link"><span class="web__toggle">WEB</span></div>
                    <div class="page-link"><a href="/design">Design</a></div>
                    <div class="page-link"><a href="/video">Video</a></div>
                    <div class="page-link"><a href="/illustration">Illustration</a></div>
                    <div class="page-link"><a href="/animation">Animation</a></div>
                    <div class="page-link"><a href="https://youtu.be/hbl-YQaZYdo" target="_blank" rel="noopener">Showreel</a></div>
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