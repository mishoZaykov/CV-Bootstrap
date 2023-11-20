import React from "react";
import { Helmet } from "react-helmet-async";

function Contact() {
  return (
    <>
      <Helmet>
        {/* SEO Meta Tags */}
        <title>Contact Tech Picker - Get in Touch</title>
        <meta
          name="description"
          content="Contact Tech Picker for inquiries, feedback, or support. Get in touch with us to enhance your tech experience."
        />

        {/* Open Graph meta tags for Facebook, Instagram */}
        <meta
          property="og:title"
          content="Contact Tech Picker - Get in Touch"
        />
        <meta
          property="og:description"
          content="Contact Tech Picker for inquiries, feedback, or support. Get in touch with us to enhance your tech experience."
        />
        <meta property="og:url" content="https://yourwebsite.com/contact" />

        {/* Twitter Card meta tags */}
        <meta name="twitter:card" content="summary_large_image" />
        <meta
          name="twitter:title"
          content="Contact Tech Picker - Get in Touch"
        />
        <meta
          name="twitter:description"
          content="Contact Tech Picker for inquiries, feedback, or support. Get in touch with us to enhance your tech experience."
        />
      </Helmet>
      
      <article className="contact-container" id="contact-container">
        <h1>Contact Us</h1>
        <form method="post">
          <label htmlFor="name">Name:</label>
          <input type="text" id="name" name="name" required="" />
          <label htmlFor="email">Email:</label>
          <input type="email" id="email" name="email" required="" />
          <label htmlFor="message">Message:</label>
          <textarea
            id="message"
            name="message"
            rows={4}
            required=""
            defaultValue={""}
          />
          <input type="submit" defaultValue="Submit" />
        </form>
      </article>
    </>
  );
}

export default Contact;
