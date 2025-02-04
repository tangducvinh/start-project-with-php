<nav class="navbar">
    <div style="display: flex; gap: 20px; align-items: center;">
        <a class="{{ request()->is('/') ? 'active' : ''}}" href="/">Home</a>
        <a class="{{ request()->is('about') ? 'active' : ''}}" href="/about">About</a>
        <a class="{{ request()->is('blog') ? 'active' : ''}}" href="/blog">Blog</a>
        <a class="{{ request()->is('posts') ? 'active' : ''}}" href="/posts">Post</a>
        <a class="{{ request()->is('foods') ? 'active' : ''}}" href="/foods">Foods</a>
    </div>
</nav>
