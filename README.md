<h1 align="center">Laravel Blog Project</h1>

<p align="center">
  <strong>A fully-featured blog application built with Laravel.</strong>
</p>

<p align="center">
  <a href="#features">Features</a> •
  <a href="#installation">Installation</a> •
  <a href="#usage">Usage</a> •
  <a href="#api-endpoints">🌐 API Endpoints</a> •
  <a href="#contributing">Contributing</a> •
</p>

---

<h2 id="features">✨ Features</h2>
<ul>
  <li>🏷️Different route depending on user role</li>
  <li>🔐 User authentication (registration, login, logout).</li>
  <li>💬 Comment and like system for blog posts.</li>
  <li>🏷️ Categorize posts with tags and categories.</li>
  <li>🔍 Search functionality to find posts by title or content.</li>
  <li>📱 Responsive design for mobile and desktop.</li>
</ul>

<h3>✨For Admin</h3>
<ul>
  <li>📝 Create, read, update, and delete blog posts.</li>
  <li>📝 Create, read, update, and delete Users.</li>
  <li>📝 Change User Role</li>
</ul>

<h3>✨For User</h3>
<ul>
  <li>📝 View a post</li>
  <li>📝 Can give a like</li>
  <li>📝 Can give a comment</li>
  <li>📝 Can delete his own comment</li>
</ul>

---

<h2 id="installation">🚀 Installation</h2>

<p>Follow these steps to set up the project locally:</p>

<ol>
  <li><strong>Clone the repository:</strong>
    <pre><code>git clone https://github.com/your-username/your-repo-name.git</code></pre>
  </li>
  <li><strong>Navigate to the project directory:</strong>
    <pre><code>cd your-repo-name</code></pre>
  </li>
  <li><strong>Install dependencies:</strong>
    <pre><code>composer install</code></pre>
  </li>
  <li><strong>Create a copy of the <code>.env</code> file:</strong>
    <pre><code>cp .env.example .env</code></pre>
  </li>
  <li><strong>Generate an application key:</strong>
    <pre><code>php artisan key:generate</code></pre>
  </li>
  <li><strong>Set up your database:</strong>
    <ul>
      <li>Create a database in your preferred DBMS (e.g., MySQL).</li>
      <li>Update the <code>.env</code> file with your database credentials:
        <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password</code></pre>
      </li>
    </ul>
  </li>
  <li><strong>Run migrations and seed the database:</strong>
    <pre><code>php artisan migrate --seed</code></pre>
  </li>
  <li><strong>Serve the application:</strong>
    <pre><code>php artisan serve</code></pre>
  </li>
  <li><strong>Visit the application in your browser:</strong>
    <pre><code>http://localhost:8000</code></pre>
  </li>
</ol>

---

<h2 id="usage">💻 Usage</h2>

<p>Once the application is running, you can:</p>

<ul>
  <li>Register a new account or log in with existing credentials.</li>
  <li>Create, edit, and delete blog posts (if logged in as admin).</li>
  <li>Add comments to blog posts.</li>
  <li>Search for posts using the search bar.</li>
  <li>Explore posts by tags or categories.</li>
</ul>

---

<h2 id="api-endpoints">🌐 API Endpoints</h2>

<p>The project includes a RESTful API for managing posts and comments. Below are the available endpoints:</p>

<h3>Posts</h3>
<ul>
  <li><code>GET /api/posts</code> - Get all posts.</li>
  <li><code>GET /api/posts/{id}</code> - Get a specific post.</li>
  <li><code>POST /api/posts</code> - Create a new post.</li>
  <li><code>PUT /api/posts/{id}</code> - Update a post.</li>
  <li><code>DELETE /api/posts/{id}</code> - Delete a post.</li>
</ul>

<h3>Comments</h3>
<ul>
  <li><code>GET /api/comments</code> - Get all comments.</li>
  <li><code>GET /api/comments/{id}</code> - Get a specific comment.</li>
  <li><code>POST /api/comments</code> - Create a new comment.</li>
  <li><code>PUT /api/comments/{id}</code> - Update a comment.</li>
  <li><code>DELETE /api/comments/{id}</code> - Delete a comment.</li>
</ul>

---

<h2 id="contributing">🤝 Contributing</h2>

<p>Contributions are welcome! If you'd like to contribute, please follow these steps:</p>

<ol>
  <li>Fork the repository.</li>
  <li>Create a new branch for your feature or bugfix.</li>
  <li>Commit your changes and push to your branch.</li>
  <li>Submit a pull request with a detailed description of your changes.</li>
</ol>

---

---

<p align="center">
  Made with ❤️ by <strong>Shahed Hasan</strong>
</p>
