import React from "react";
import { Helmet } from "react-helmet-async";

function About() {
  return (
    <>
      <Helmet>
        {/* SEO Meta Tags */}
        <title>About Tech Picker - Your Tech Hardware Destination</title>
        <meta
          name="description"
          content="Discover the story behind Tech Picker, your destination for cutting-edge PC components and tech hardware. Join us on the cutting edge of technology."
        />

        {/* Open Graph meta tags for Facebook */}
        <meta
          property="og:title"
          content="About Tech Picker - Your Tech Hardware Destination"
        />
        <meta
          property="og:description"
          content="Discover the story behind Tech Picker, your destination for cutting-edge PC components and tech hardware. Join us on the cutting edge of technology."
        />
        <meta property="og:url" content="https://yourwebsite.com/about" />

        {/* Twitter Card meta tags */}
        <meta name="twitter:card" content="summary_large_image" />
        <meta
          name="twitter:title"
          content="About Tech Picker - Your Tech Hardware Destination"
        />
        <meta
          name="twitter:description"
          content="Discover the story behind Tech Picker, your destination for cutting-edge PC components and tech hardware. Join us on the cutting edge of technology."
        />
      </Helmet>

      <section className="about-section" id="about-section">
        <div className="container">
          <article className="first-section">
            <h2 className="about-title">About us</h2>
            <p className="about-content">
              Welcome to Tech Picker, where passion meets precision in the world
              of PC components and tech hardware. At the heart of our endeavor
              is a relentless commitment to providing you with cutting-edge
              technology that empowers your digital journey.
            </p>
            <h2 className="about-title">Our Story</h2>
            <p className="about-content">
              Established with a vision to redefine the standards of
              technological excellence, Tech Picker emerged from the collective
              expertise of hardware enthusiasts and tech aficionados. Founded in
              2023, we embarked on a mission to curate a diverse range of PC
              components that cater to both the gaming elite and the tech-savvy
              professionals.
            </p>
          </article>
          <article className="second-section">
            <h2 className="about-title">Our Commitment</h2>
            <p className="about-content">
              At Tech Picker, we don't just sell hardware; we foster a
              community. Our commitment goes beyond transactions; it's about
              establishing lasting connections with our customers. We are
              dedicated to providing top-notch customer support, ensuring that
              your technological journey is smooth and rewarding.
            </p>
            <h2 className="about-title">Join Us on the Cutting Edge</h2>
            <p className="about-content">
              Immerse yourself in a world of innovation, power, and precision.
              At Tech Picker, we invite you to explore our extensive range of PC
              components and tech hardware. Whether you're a seasoned gamer, a
              content creator, or a professional seeking unparalleled
              performance, we have the tools to elevate your digital experience.
            </p>
          </article>
        </div>
      </section>
    </>
  );
}

export default About;
