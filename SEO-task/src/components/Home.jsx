import React from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";
function Home() {
  return (
    <>
      <Helmet>
        {/* SEO Meta Tags */}
        <title>Tech Picker - Find New Tech Stuff for Your Needs</title>
        <meta
          name="description"
          content="Discover the latest tech gadgets and products to fulfill your tech needs at Tech Picker."
        />

        {/* Open Graph meta tags for Facebook */}
        <meta
          property="og:title"
          content="Tech Picker - Find New Tech Stuff for Your Needs"
        />
        <meta
          property="og:description"
          content="Discover the latest tech gadgets and products to fulfill your tech needs at Tech Picker."
        />
        <meta property="og:url" content="https://yourwebsite.com" />

        {/* Twitter Card meta tags */}
        <meta name="twitter:card" content="summary_large_image" />
        <meta
          name="twitter:title"
          content="Tech Picker - Find New Tech Stuff for Your Needs"
        />
        <meta
          name="twitter:description"
          content="Discover the latest tech gadgets and products to fulfill your tech needs at Tech Picker."
        />
      </Helmet>

      <section className="hero-section">
        <div className="container">
          <h1>Find all the new tech stuff for your needs</h1>
          <Link to="/browse" className="button" role="button">
            BROWSE
          </Link>
        </div>
      </section>
    </>
  );
}

export default Home;
