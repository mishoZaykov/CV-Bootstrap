
export default function Contact() {
  return (
    <div className="contact-container">
    <h1>Contact Us</h1>
    <form action="your-server-side-script.php" method="post">
      <label htmlFor="name">Name:</label>
      <input type="text" id="name" name="name" required />

      <label htmlFor="email">Email:</label>
      <input type="email" id="email" name="email" required />

      <label htmlFor="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <input type="submit" value="Submit" />
    </form>
  </div>
  );
}
