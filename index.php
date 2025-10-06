<?php
// index.php
session_start();
// Clear previous session on home page
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EQ Test - Measure Your Emotional Intelligence</title>
<style>
/* ===========================
   🎨 PROFESSIONAL HOME PAGE CSS
   =========================== */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
    position: relative;
    overflow: hidden;
}

/* Animated Background Elements */
.bg-animation {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    overflow: hidden;
    z-index: 1;
}

.bg-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 8s infinite ease-in-out;
}

.bg-circle:nth-child(1) {
    width: 300px;
    height: 300px;
    top: -100px;
    left: -100px;
}

.bg-circle:nth-child(2) {
    width: 400px;
    height: 400px;
    bottom: -150px;
    right: -150px;
    animation-delay: 2s;
}

.bg-circle:nth-child(3) {
    width: 200px;
    height: 200px;
    top: 50%;
    right: 10%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0px) scale(1); 
        opacity: 0.7;
    }
    50% { 
        transform: translateY(-30px) scale(1.05); 
        opacity: 1;
    }
}

/* Main Container */
.container {
    width: 90%;
    max-width: 650px;
    background: rgba(255, 255, 255, 0.95);
    padding: 50px 45px;
    border-radius: 24px;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.3),
                inset 0 1px 2px rgba(255, 255, 255, 0.5);
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    z-index: 10;
    animation: slideIn 0.8s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Logo/Icon */
.logo {
    font-size: 80px;
    margin-bottom: 20px;
    animation: bounce 2s infinite;
    display: inline-block;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

/* Title */
h1 {
    font-size: 36px;
    margin-bottom: 15px;
    color: #1f2937;
    font-weight: 800;
    letter-spacing: -0.5px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: fadeInDown 0.6s ease-out 0.2s both;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Subtitle */
.subtitle {
    font-size: 18px;
    color: #6b7280;
    margin-bottom: 30px;
    font-weight: 600;
    animation: fadeInDown 0.6s ease-out 0.3s both;
}

/* Description */
.description {
    color: #4b5563;
    line-height: 1.8;
    font-size: 16px;
    margin-bottom: 35px;
    animation: fadeInUp 0.6s ease-out 0.4s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Features Grid */
.features {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin: 35px 0;
    animation: fadeInUp 0.6s ease-out 0.5s both;
}

.feature-card {
    background: #f9fafb;
    padding: 20px 15px;
    border-radius: 14px;
    transition: all 0.3s ease;
    border: 2px solid #e5e7eb;
}

.feature-card:hover {
    transform: translateY(-5px);
    border-color: #667eea;
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
}

.feature-icon {
    font-size: 36px;
    margin-bottom: 10px;
    display: block;
}

.feature-title {
    font-size: 14px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 5px;
}

.feature-desc {
    font-size: 12px;
    color: #6b7280;
    line-height: 1.4;
}

/* Info Cards */
.info-cards {
    display: flex;
    gap: 15px;
    margin: 30px 0;
    animation: fadeInUp 0.6s ease-out 0.6s both;
}

.info-card {
    flex: 1;
    background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
    padding: 18px;
    border-radius: 12px;
    border: 1px solid #667eea30;
}

.info-number {
    font-size: 28px;
    font-weight: 800;
    color: #667eea;
    display: block;
    margin-bottom: 5px;
}

.info-label {
    font-size: 13px;
    color: #6b7280;
    font-weight: 600;
}

/* Button Container */
.button-container {
    margin-top: 35px;
    animation: fadeInUp 0.6s ease-out 0.7s both;
}

/* Primary Button */
.btn-start {
    padding: 18px 50px;
    border: none;
    font-size: 18px;
    border-radius: 14px;
    cursor: pointer;
    font-weight: 700;
    color: #ffffff;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.btn-start::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
}

.btn-start:hover::before {
    width: 400px;
    height: 400px;
}

.btn-start:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
}

.btn-start:active {
    transform: translateY(-2px);
}

/* Helper Text */
.helper-text {
    margin-top: 20px;
    font-size: 13px;
    color: #9ca3af;
    font-style: italic;
    animation: fadeIn 0.6s ease-out 0.8s both;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Footer */
.footer {
    margin-top: 35px;
    padding-top: 25px;
    border-top: 2px dashed #e5e7eb;
    animation: fadeIn 0.6s ease-out 0.9s both;
}

.footer-text {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 15px;
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.social-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid transparent;
}

.social-icon:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
}

/* Testimonial Badge */
.testimonial {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    padding: 15px 20px;
    border-radius: 12px;
    margin: 25px 0;
    border-left: 4px solid #f59e0b;
    animation: fadeInUp 0.6s ease-out 0.5s both;
}

.testimonial-text {
    font-size: 14px;
    color: #78350f;
    font-style: italic;
    margin-bottom: 8px;
}

.testimonial-author {
    font-size: 13px;
    color: #92400e;
    font-weight: 700;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .container {
        padding: 40px 30px;
    }

    h1 {
        font-size: 28px;
    }

    .logo {
        font-size: 60px;
    }

    .subtitle {
        font-size: 16px;
    }

    .features {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .info-cards {
        flex-direction: column;
    }

    .btn-start {
        padding: 16px 40px;
        font-size: 17px;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 35px 25px;
    }

    h1 {
        font-size: 24px;
    }

    .logo {
        font-size: 50px;
    }

    .subtitle {
        font-size: 15px;
    }

    .description {
        font-size: 15px;
    }

    .btn-start {
        padding: 14px 35px;
        font-size: 16px;
        width: 100%;
    }

    .feature-card {
        padding: 18px 12px;
    }

    .feature-icon {
        font-size: 32px;
    }
}

/* Pulse Animation for Button */
@keyframes pulse {
    0%, 100% {
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    }
    50% {
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.6);
    }
}

.btn-start {
    animation: pulse 2s infinite;
}
</style>
<script>
function startTest() {
    // Add smooth transition effect
    document.querySelector('.container').style.animation = 'fadeOut 0.5s ease-out';
    setTimeout(() => {
        window.location.href = "quiz.php?q=1";
    }, 500);
}

// Add fade out animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-30px);
        }
    }
`;
document.head.appendChild(style);
</script>
</head>
<body>
<!-- Background Animation -->
<div class="bg-animation">
    <div class="bg-circle"></div>
    <div class="bg-circle"></div>
    <div class="bg-circle"></div>
</div>

<!-- Main Container -->
<div class="container">
    <!-- Logo -->
    <div class="logo">🧠</div>
    
    <!-- Title -->
    <h1>Emotional Intelligence Test</h1>
    <div class="subtitle">Discover Your EQ Score</div>
    
    <!-- Description -->
    <p class="description">
        Measure your emotional awareness, empathy, self-regulation, and social skills 
        with our comprehensive 10-question assessment designed by psychology experts.
    </p>

    <!-- Info Cards -->
    <div class="info-cards">
        <div class="info-card">
            <span class="info-number">10</span>
            <span class="info-label">Questions</span>
        </div>
        <div class="info-card">
            <span class="info-number">5</span>
            <span class="info-label">Minutes</span>
        </div>
        <div class="info-card">
            <span class="info-number">Free</span>
            <span class="info-label">Always</span>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="features">
        <div class="feature-card">
            <span class="feature-icon">📊</span>
            <div class="feature-title">Detailed Results</div>
            <div class="feature-desc">Get instant feedback with category breakdown</div>
        </div>
        <div class="feature-card">
            <span class="feature-icon">🎯</span>
            <div class="feature-title">Personalized</div>
            <div class="feature-desc">Tailored tips for improvement</div>
        </div>
        <div class="feature-card">
            <span class="feature-icon">🔒</span>
            <div class="feature-title">Private</div>
            <div class="feature-desc">Your data stays secure</div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="testimonial-text">
            "This test gave me amazing insights into my emotional patterns. Highly recommended!"
        </div>
        <div class="testimonial-author">— Sarah K., HR Professional</div>
    </div>

    <!-- Start Button -->
    <div class="button-container">
        <button class="btn-start" onclick="startTest()">
            Start Your Test Now →
        </button>
    </div>

    <div class="helper-text">
        💡 Takes only 5 minutes • No signup required
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-text">Share with friends</div>
        <div class="social-links">
            <div class="social-icon" title="Facebook">📘</div>
            <div class="social-icon" title="Twitter">🐦</div>
            <div class="social-icon" title="LinkedIn">💼</div>
            <div class="social-icon" title="WhatsApp">💬</div>
        </div>
    </div>
</div>
</body>
</html>
