<?php
if (!defined('ABSPATH')) {
    exit;
}

$type_video = get_sub_field('type_video');
$videoUrl = get_sub_field('video_url');
$posterUrl = get_sub_field('poster');
?>

<!-- Video Section Start -->
<section class="video_section">
    <div class="video_container container-fluid">
        <div class="container mx-auto">

            <?php if (get_sub_field('page_hero_index')) : ?>
                <div class="wow fadeIn page_index_area">
                    <div class="page_index">
                        <?php echo get_sub_field('page_hero_index'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12 center-area video_insert_area">
                    <h1 class="wow bounceInLeft hero_title">
                        <?php echo get_sub_field('header_title_h1'); ?>
                    </h1>

                    <?php if ($type_video == 'simple') : ?>
                        <video class="myVideo" loop muted playsinline poster="<?php echo $posterUrl; ?>">
                            <source src="<?php echo $videoUrl; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <button class="sound_on_btn" id="toggleSound">
                            <i class="bi bi-volume-up"></i>
                        </button>

                        <script>
                            var videos = document.querySelectorAll(".myVideo");
                            var toggleButton = document.getElementById('toggleSound');

                            var observerOptions = {
                                root: null,
                                rootMargin: "0px",
                                threshold: 0.5
                            };

                            var observer = new IntersectionObserver(handleIntersection, observerOptions);

                            videos.forEach(function (videoElement) {
                                observer.observe(videoElement);

                                videoElement.addEventListener("canplay", function () {
                                    videoElement.play();
                                });

                                videoElement.addEventListener("ended", function () {
                                    // Воспроизводим видео заново после завершения
                                    videoElement.currentTime = 0;
                                    videoElement.play();
                                });
                            });

                            function handleIntersection(entries, observer) {
                                entries.forEach(function (entry) {
                                    if (entry.isIntersecting) {
                                        // Видео в поле зрения
                                        entry.target.play();
                                    } else {
                                        // Видео скрыто из поля зрения
                                        entry.target.pause();
                                    }
                                });
                            }

                            // Добавляем обработчик события для кнопки
                            toggleButton.addEventListener('click', function () {
                                videos.forEach(function (videoElement) {
                                    videoElement.muted = !videoElement.muted; // инвертируем значение мута
                                });
                            });
                        </script>

                    <?php elseif ($type_video == 'youtube') : ?>
                        <?php the_sub_field('youtube_link'); ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="video_info_block row align-items-center mx-auto section_two_columns">
                <div class="col-xs-12 col-md-8 col-lg-8 video_info_block_content text-center mx-auto">
                    <?php if (get_sub_field('content')) : ?>
                        <h3>
                            <?php echo get_sub_field('content'); ?>
                        </h3>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Video Section End -->
