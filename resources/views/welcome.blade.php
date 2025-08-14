<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding -->
    <meta charset="utf-8">
    <!-- Make page responsive on all devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Page title -->
    <title>Welcome to Grammagic</title>
    
    <!-- Preconnect to font provider for faster loading -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- Figtree font -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Poppins font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css library for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        /* Gradient text style */
        .gradient-text {
            background: linear-gradient(45deg, #4F46E5, #10B981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gradient background style */
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #10B981 100%);
        }

        /* Hover scale transition for elements */
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }

        /* Apply Poppins font */
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        /* Card hover effect */
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <!-- Tailwind CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="antialiased font-poppins bg-gray-50 text-gray-800">
    <!-- Main container with min height full screen -->
    <div class="min-h-screen flex flex-col">
        
        <!-- Navigation Bar -->
        <nav class="w-full py-6 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <!-- Logo and title -->
                <div class="flex items-center">
                    <img src="{{ asset('images/grammagic.png') }}" alt="Grammagic Logo" class="h-12 w-auto">
                    <span class="ml-3 text-xl font-bold gradient-text">Grammagic</span>
                </div>
                
                <!-- Authentication links -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Show dashboard link if authenticated -->
                        <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition duration-300">
                            Dashboard
                        </a>
                    @else
                        <!-- Show login and register links if not authenticated -->
                        <a href="{{ route('login') }}" class="px-5 py-2 text-indigo-600 text-sm font-medium rounded-lg hover:bg-indigo-50 transition duration-300">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition duration-300">
                                Get Started
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="flex-grow flex items-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left side content -->
                <div class="animate__animated animate__fadeInLeft">
                    <!-- Main headline -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6">
                        <span class="gradient-text">Master English Grammar</span><br>
                        <span class="text-gray-800">in Just 21 Days</span>
                    </h1>
                    <!-- Subheading / description -->
                    <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed">
                        Grammagic uses AI-powered feedback to help you learn grammar through active sentence construction, not just multiple-choice questions.
                    </p>
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        @auth
                            <!-- Continue Learning button -->
                            <a href="{{ route('dashboard') }}" class="px-8 py-3 bg-indigo-600 text-white text-lg font-medium rounded-lg hover:bg-indigo-700 transition duration-300 hover-scale text-center">
                                Continue Learning
                            </a>
                        @else
                            <!-- Start Free Trial button -->
                            <a href="{{ route('register') }}" class="px-8 py-3 bg-indigo-600 text-white text-lg font-medium rounded-lg hover:bg-indigo-700 transition duration-300 hover-scale text-center">
                                Start Free Trial
                            </a>
                            <!-- Learn More button -->
                            <a href="#features" class="px-8 py-3 border border-indigo-600 text-indigo-600 text-lg font-medium rounded-lg hover:bg-indigo-50 transition duration-300 hover-scale text-center">
                                Learn More
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Right side: AI feedback example -->
                <div class="animate__animated animate__fadeInRight">
                    <div class="relative">
                        <!-- Background decorative block -->
                        <div class="absolute -top-6 -left-6 w-full h-full bg-indigo-100 rounded-2xl -z-10"></div>
                        <!-- Main AI feedback card -->
                        <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                            <!-- Card header -->
                            <div class="bg-indigo-600 text-white px-4 py-2 rounded-t-lg -mx-6 -mt-6 mb-4">
                                <h3 class="font-medium">AI Feedback Example</h3>
                            </div>
                            <!-- Card content -->
                            <div class="space-y-4">
                                <!-- Question example -->
                                <div>
                                    <p class="text-gray-600 mb-1">Question:</p>
                                    <p class="font-medium">"Write a sentence in the past perfect tense."</p>
                                </div>
                                <!-- User answer example -->
                                <div>
                                    <p class="text-gray-600 mb-1">Your Answer:</p>
                                    <p class="font-medium">"She has finished her homework."</p>
                                </div>
                                <!-- AI feedback -->
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r">
                                    <p class="text-gray-600 mb-1">AI Feedback:</p>
                                    <p>"Almost there! 'Has finished' is present perfect. For past perfect, use 'had finished'. Example: 'She had finished her homework before dinner.'"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <!-- Section heading -->
                <h2 class="text-3xl font-bold text-center mb-12 gradient-text">How Grammagic Works</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1: Daily Lessons -->
                    <div class="bg-gray-50 p-6 rounded-xl card-hover">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-indigo-600 text-xl">1</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Daily Lessons</h3>
                        <p class="text-gray-600">Structured 21-day curriculum covering tenses, conditionals, and sentence structure.</p>
                    </div>
                    
                    <!-- Feature 2: Construct Sentences -->
                    <div class="bg-gray-50 p-6 rounded-xl card-hover">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-indigo-600 text-xl">2</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Construct Sentences</h3>
                        <p class="text-gray-600">Practice by building sentences, not just selecting multiple-choice answers.</p>
                    </div>
                    
                    <!-- Feature 3: AI Feedback -->
                    <div class="bg-gray-50 p-6 rounded-xl card-hover">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-indigo-600 text-xl">3</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">AI Feedback</h3>
                        <p class="text-gray-600">Get personalized explanations and corrections from our GPT-powered system.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <!-- Section heading -->
                <h2 class="text-3xl font-bold text-center mb-12 gradient-text">What Our Learners Say</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white p-6 rounded-xl shadow-sm card-hover">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="text-indigo-600">JD</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">John D.</h4>
                                <p class="text-gray-500 text-sm">Intermediate Learner</p>
                            </div>
                        </div>
                        <p class="text-gray-600">"Grammagic's approach of constructing sentences instead of multiple choice made all the difference. I finally understand when to use past perfect!"</p>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="bg-white p-6 rounded-xl shadow-sm card-hover">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="text-indigo-600">SM</span>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold">Sarah M.</h4>
                                <p class="text-gray-500 text-sm">Advanced Learner</p>
                            </div>
                        </div>
                        <p class="text-gray-600">"The AI feedback is incredibly detailed. It doesn't just tell me I'm wrong, it explains why and gives examples. My writing has improved dramatically."</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="py-16 px-4 sm:px-6 lg:px-8 gradient-bg text-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Ready to Transform Your Grammar?</h2>
                <p class="text-xl mb-8 opacity-90">Join thousands of learners mastering English with our AI-powered platform.</p>
                <!-- CTA button -->
                <a href="{{ route('register') }}" class="inline-block px-8 py-3 bg-white text-indigo-600 text-lg font-medium rounded-lg hover:bg-gray-100 transition duration-300 hover-scale">
                    Start Your 21-Day Journey
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 px-4 sm:px-6 lg:px-8 bg-gray-900 text-gray-400">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Logo and brand -->
                    <div class="flex items-center mb-4 md:mb-0">
                        <img src="{{ asset('images/grammagic.png') }}" alt="Grammagic Logo" class="h-8 w-auto">
                        <span class="ml-3 text-lg font-medium text-gray-300">Grammagic</span>
                    </div>
                    <!-- Footer text -->
                    <div class="text-sm">
                        <p>Developed by Fatemeh Shahrabi</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
