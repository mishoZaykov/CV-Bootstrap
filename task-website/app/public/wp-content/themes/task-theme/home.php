<?php get_header(); ?>

<body>
    <div class="hero-section">
        <div class="container">
            <h1>Find all then new tech stuff for your needs</h1>
            <a href="#" class="button">BROWSE</a>
        </div>
    </div>
    <div class="about-section" id="about-section">
        <div class="container">
            <div class="first-section">

                <h2 class="about-title">About us</h2>
                <p class="about-content">Welcome to Tech Picker, where passion meets precision in the world of PC components and tech hardware. At the heart of our endeavor is a relentless commitment to providing you with cutting-edge technology that empowers your digital journey.</p>
                <h2 class="about-title">Our Story</h2>
                <p class="about-content">Established with a vision to redefine the standards of technological excellence, Tech Picker emerged from the collective expertise of hardware enthusiasts and tech aficionados. Founded in 2023, we embarked on a mission to curate a diverse range of PC components that cater to both the gaming elite and the tech-savvy professionals.</p>
            </div>
            <div class="second-section">
                <h2 class="about-title">Our Commitment</h2>
                <p class="about-content">At Tech Picker, we don't just sell hardware; we foster a community. Our commitment goes beyond transactions; it's about establishing lasting connections with our customers. We are dedicated to providing top-notch customer support, ensuring that your technological journey is smooth and rewarding.</p>
                <h2 class="about-title">Join Us on the Cutting Edge</h2>
                <p class="about-content">Immerse yourself in a world of innovation, power, and precision. At Tech Picker, we invite you to explore our extensive range of PC components and tech hardware. Whether you're a seasoned gamer, a content creator, or a professional seeking unparalleled performance, we have the tools to elevate your digital experience.</p>
            </div>


        </div>
    </div>
    <div class="services-section" id="services-section">
        <?php
        while (have_posts()) : the_post();
        ?>
            <div class="sercice">
                <h2 class="services-title"><?php the_title() ?></h2>
                <p class="services-content"><?php the_content() ?></p>
            </div>

        <?php
        endwhile;
        ?>
    </div>

    <div class="contact-container" id="contact-container">
        <h1>Contact Us</h1>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <input type="submit" value="Submit" />
        </form>
    </div>
</body>
<?php get_footer(); ?>