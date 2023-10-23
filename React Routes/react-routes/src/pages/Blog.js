import blogData from "../blogData.json";

export default function Blog() {
  return (
    <div className="blog">
      {blogData.map((blog) => {
        return (
          <div className="box" key={blog.id}>
            <h2>{blog.title}</h2>
            <h4>{blog.author}</h4>
            <a href={`/blog/${blog.id}`} className="read-more-button">
              Read More
            </a>
          </div>
        );
      })}
    </div>
  );
}
