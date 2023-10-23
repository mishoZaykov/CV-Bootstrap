import React from "react";
import { useParams } from "react-router-dom";
import blogData from "../blogData.json";

export default function Article() {
  const { id } = useParams();
  const article = blogData.find((blog) => blog.id === parseInt(id));

  if (!article) {
    return <div>Article not found</div>;
  }

  return (
    <div className="article">
      <div className="blog">
        <h2>{article.title}</h2>
        <h4>{article.author}</h4>
        <p>{article.date}</p>
        <article>{article.content}</article>
      </div>
    </div>
  );
}
