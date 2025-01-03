<?php
/*
Template Name: Success Page
Template Post Type: page
*/

get_header(); ?>

<div id="primary" class="thankspage content-area full-width container-fluid">
    <main id="main" class="site-main wrapper">
        <?php
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>
        <div class="redirect-counter">

        </div>
    </main><!-- #main -->
</div><!-- #primary -->
    <script>
        //document.addEventListener("DOMContentLoaded", function () {
            // Countdown starts from 05 seconds
            //let countdown = 5;

            // Select the element where the message will be displayed
            //const messageElement = document.getElementById("redirect-message");

            // Update the message with the initial value
            //messageElement.textContent = `Redirecting to homepage in ${countdown}s`;

            // Start the timer
            //const timer = setInterval(() => {
                // Decrease the countdown value
                //countdown--;

                // Update the message
                //messageElement.textContent = `Redirecting to homepage in ${countdown}s`;

                // When the countdown reaches 0, stop the timer and redirect
                //if (countdown <= 0) {
                    //clearInterval(timer);
                    //window.location.href = "https://veeva.thoucentric.com";
                //}
            //}, 1000); // Execute every 1 second
        //});
    </script>
<?php
get_footer();
