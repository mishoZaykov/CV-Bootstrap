import React from "react";
import { Helmet } from "react-helmet-async";

function Services() {
  return (
    <>
      <Helmet>
        {/* SEO Meta Tags */}
        <title>Services - Tech Picker</title>
        <meta
          name="description"
          content="Explore the diverse range of services offered by Tech Picker including custom PC builds, hardware upgrades, and diagnostic/repair services. Enhance your computing experience with our expert services."
        />

        {/* Open Graph meta tags for Facebook, Instagram */}
        <meta property="og:title" content="Services - Tech Picker" />
        <meta
          property="og:description"
          content="Explore the diverse range of services offered by Tech Picker including custom PC builds, hardware upgrades, and diagnostic/repair services. Enhance your computing experience with our expert services."
        />
        <meta property="og:url" content="https://yourwebsite.com/services" />

        {/* Twitter Card meta tags */}
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Services - Tech Picker" />
        <meta
          name="twitter:description"
          content="Explore the diverse range of services offered by Tech Picker including custom PC builds, hardware upgrades, and diagnostic/repair services. Enhance your computing experience with our expert services."
        />
      </Helmet>

      <section className="services-section" id="services-section">
        <article className="sercice">
          <h2 className="services-title">Custom PC Builds</h2>
          <p className="services-content">
            Unleash the power of tailor-made computing with our custom PC build
            service. Whether you're a gamer, content creator, or professional,
            we craft systems that match your performance requirements and
            aesthetic preferences. Experience computing at its best with
            handpicked components and expert assembly.
          </p>
        </article>
        <article className="sercice">
          <h2 className="services-title">Hardware Upgrades</h2>
          <p className="services-content">
            Elevate your PC's performance with our hardware upgrade services.
            From graphics cards and RAM to storage solutions, we provide
            seamless upgrades that breathe new life into your system. Stay ahead
            of the curve by optimizing your hardware for the latest technologies
            and demanding applications.
          </p>
        </article>
        <article className="sercice">
          <h2 className="services-title">Diagnostic and Repair</h2>
          <p className="services-content">
            Facing technical issues with your PC? Our diagnostic and repair
            services are here to troubleshoot and resolve hardware-related
            issues. Our skilled technicians identify and fix problems
            efficiently, ensuring that your PC operates smoothly. Get back to
            peak performance with our reliable repair solutions.
          </p>
        </article>
      </section>
    </>
  );
}
export default Services;
