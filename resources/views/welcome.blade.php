<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif; /* Use Inter font */
            background: #2b2b2b; /* Dark background for the page */
            color: #ffffff; /* White text color */
            margin: 0;
            padding: 0;
        }
        .hero-section {
            min-height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            background: url('{{ asset('storage/image/banner.jpg') }}') no-repeat center center; /* Background image */
            background-size: cover;
        }
        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInDown 1s ease-in-out;
            color: #ffffff;
        }
        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-in-out;
            color: #ffffff;
        }
        .hero-buttons {
            display: flex;
            gap: 1rem;
        }
        .hero-buttons a {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            transition: transform 0.2s;
            background-color: #3182ce; /* Blue background for buttons */
            color: white;
            text-decoration: none; /* Remove underline */
        }
        .hero-buttons a:hover {
            transform: scale(1.1);
        }
        .posts-section {
            padding: 2rem;
            background: #2b2b2b; /* Dark background to match the page */
            color: #ffffff; /* White text color */
            border-radius: 1rem;
            margin-top: 2rem;
            max-width: 1200px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add subtle shadow */
        }
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .post-card {
            border: 1px solid #444; /* Dark border */
            border-radius: 0.5rem;
            padding: 1rem;
            background: #3b3b3b; /* Slightly lighter background for cards */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .post-card img {
            max-width: 100%;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        .post-card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .post-card p {
            flex-grow: 1;
        }
        .post-card a {
            margin-top: 1rem;
            text-align: center;
            padding: 0.5rem 1rem;
            background-color: #e3342f; /* Laravel red for buttons */
            color: #ffffff;
            border-radius: 0.25rem;
            transition: background-color 0.2s, transform 0.2s;
            text-decoration: none; /* Remove underline */
        }
        .post-card a:hover {
            background-color: #cc1f1a; /* Darker red for hover effect */
            transform: scale(1.05);
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (min-width: 769px) and (max-width: 1024px) {
            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <h1 class="hero-title">Welcome to My Blog</h1>
        <p class="hero-subtitle">A place to share and explore new ideas</p>
        <div class="hero-buttons">
            <a href="{{ route('posts.index') }}">View Posts</a>
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

    <div class="posts-section">
        <h2 class="text-2xl font-bold mb-4">Latest Posts</h2>
        <div class="posts-grid">
            @foreach ($posts as $post)
                <div class="post-card">
                    <h2>{{ $post->title }}</h2>
                    @if($post->featured_image)
                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}">
                    @endif
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('posts.show', $post) }}">Read More</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
