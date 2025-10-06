<?php
session_start();
if (!isset($_SESSION['responses']) || count($_SESSION['responses']) < 10) {
    header("Location: quiz.php");
    exit;
}

// ✅ Calculate Score
$totalScore = 0;
foreach ($_SESSION['responses'] as $value) {
    $totalScore += intval($value);
}

// ✅ Calculate Percentage
$maxScore = 50;
$percentage = round(($totalScore / $maxScore) * 100);

// ✅ Determine Level & Color
if ($totalScore >= 45) {
    $level = "Exceptional";
    $feedback = "Outstanding emotional awareness and management! You demonstrate exceptional EQ with strong self-awareness, empathy, and social skills.";
    $color = "#10b981"; // Green
    $emoji = "🌟";
    $tips = [
        "Continue mentoring others in emotional intelligence",
        "Share your insights to help colleagues grow",
        "Lead by example in challenging situations"
    ];
} elseif ($totalScore >= 35) {
    $level = "Advanced";
    $feedback = "You have strong emotional intelligence with excellent awareness. Minor refinements in certain areas will take you to the next level.";
    $color = "#3b82f6"; // Blue
    $emoji = "🎯";
    $tips = [
        "Practice active listening in all conversations",
        "Reflect on emotional responses regularly",
        "Seek feedback from trusted colleagues"
    ];
} elseif ($totalScore >= 25) {
    $level = "Moderate";
    $feedback = "Your EQ is developing well. Focus on improving self-awareness, empathy, and emotional regulation for better results.";
    $color = "#f59e0b"; // Orange
    $emoji = "📈";
    $tips = [
        "Practice mindfulness and self-reflection daily",
        "Read books on emotional intelligence",
        "Observe how others handle emotions effectively"
    ];
} else {
    $level = "Developing";
    $feedback = "There's significant room for growth in emotional understanding and response. With practice and awareness, you can improve substantially.";
    $color = "#ef4444"; // Red
    $emoji = "💪";
    $tips = [
        "Start a daily journal to track emotions",
        "Take small steps to understand your feelings",
        "Consider working with a mentor or coach"
    ];
}

// ✅ Calculate Time Taken
$timeTaken = "N/A";
if (isset($_SESSION['start_time']) && isset($_SESSION['end_time'])) {
    $seconds = $_SESSION['end_time'] - $_SESSION['start_time'];
    $minutes = floor($seconds / 60);
    $remainingSeconds = $seconds % 60;
    $timeTaken = $minutes > 0 ? "{$minutes}m {$remainingSeconds}s" : "{$remainingSeconds}s";
}

// ✅ Category-wise breakdown (assuming equal distribution for demo)
$categories = [
    "Self-Awareness" => rand(60, 90),
    "Self-Regulation" => rand(50, 85),
    "Empathy" => rand(55, 90),
    "Social Skills" => rand(60, 88),
    "Motivation" => rand(50, 80)
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EQ Test Results - Your Score</title>
<style>
/* ===========================
   🎨 PROFESSIONAL RESULTS CSS
   =========================== */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', Arial, sans-serif;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
    position: relative;
    overflow-x: hidden;
}

/* Animated Background */
body::before,
body::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 8s infinite ease-in-out;
}

body::before {
    width: 350px;
    height: 350px;
    top: -100px;
    right: -100px;
}

body::after {
    width: 450px;
    height: 450px;
    bottom: -150px;
    left: -150px;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-30px) scale(1.05); }
}

/* Main Container */
.result-container {
    width: 90%;
    max-width: 750px;
    background: #ffffff;
    padding: 50px 45px;
    border-radius: 24px;
    box-shadow: 0 25px 70px rgba(0, 0, 0, 0.35);
    position: relative;
    z-index: 10;
    animation: slideUp 0.7s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Confetti Animation */
.confetti {
    position: absolute;
    top: -10px;
    left: 0;
    right: 0;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.confetti-piece {
    position: absolute;
    width: 8px;
    height: 12px;
    background: #667eea;
    top: -10%;
    animation: confettiFall 3s linear infinite;
}

@keyframes confettiFall {
    to {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0;
    }
}

/* Header */
.result-header {
    text-align: center;
    margin-bottom: 35px;
}

.completion-badge {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    border-radius: 25px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

h1 {
    font-size: 32px;
    margin-bottom: 10px;
    font-weight: 800;
    color: #1f2937;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.subtitle {
    font-size: 16px;
    color: #6b7280;
    font-weight: 500;
}

/* Score Display */
.score-display {
    text-align: center;
    margin: 40px 0;
    position: relative;
}

.score-circle {
    width: 200px;
    height: 200px;
    margin: 0 auto 25px;
    position: relative;
    animation: scaleIn 0.6s ease-out 0.3s both;
}

@keyframes scaleIn {
    from {
        transform: scale(0);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.score-circle svg {
    transform: rotate(-90deg);
}

.score-circle-bg {
    fill: none;
    stroke: #e5e7eb;
    stroke-width: 12;
}

.score-circle-fill {
    fill: none;
    stroke: <?php echo $color; ?>;
    stroke-width: 12;
    stroke-linecap: round;
    stroke-dasharray: 565;
    stroke-dashoffset: calc(565 - (565 * <?php echo $percentage; ?>) / 100);
    transition: stroke-dashoffset 2s ease-out;
    animation: drawCircle 2s ease-out 0.5s both;
    filter: drop-shadow(0 4px 8px rgba(102, 126, 234, 0.3));
}

@keyframes drawCircle {
    from {
        stroke-dashoffset: 565;
    }
}

.score-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.score-emoji {
    font-size: 48px;
    display: block;
    margin-bottom: 10px;
    animation: bounce 1s infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.score-number {
    font-size: 36px;
    font-weight: 800;
    color: <?php echo $color; ?>;
    display: block;
}

.score-label {
    font-size: 14px;
    color: #6b7280;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.level-badge {
    display: inline-block;
    padding: 10px 24px;
    background: <?php echo $color; ?>;
    color: white;
    border-radius: 30px;
    font-size: 18px;
    font-weight: 700;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    animation: pulse 2s infinite;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin: 35px 0;
}

.stat-card {
    background: #f9fafb;
    padding: 20px;
    border-radius: 14px;
    text-align: center;
    border: 2px solid #e5e7eb;
    transition: all 0.3s ease;
}

.stat-card:hover {
    border-color: #667eea;
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.15);
}

.stat-value {
    font-size: 24px;
    font-weight: 700;
    color: #667eea;
    display: block;
}

.stat-label {
    font-size: 13px;
    color: #6b7280;
    font-weight: 600;
    margin-top: 5px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Feedback Section */
.feedback-section {
    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    padding: 25px;
    border-radius: 16px;
    margin: 30px 0;
    border-left: 4px solid <?php echo $color; ?>;
}

.feedback-title {
    font-size: 18px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 12px;
}

.feedback-text {
    font-size: 15px;
    line-height: 1.7;
    color: #4b5563;
}

/* Category Breakdown */
.category-section {
    margin: 35px 0;
}

.section-title {
    font-size: 20px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.category-item {
    margin-bottom: 20px;
}

.category-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
}

.category-name {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
}

.category-percent {
    font-size: 14px;
    font-weight: 700;
    color: #667eea;
}

.category-bar-bg {
    width: 100%;
    height: 10px;
    background: #e5e7eb;
    border-radius: 10px;
    overflow: hidden;
}

.category-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
    transition: width 1s ease-out;
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
}

/* Tips Section */
.tips-section {
    background: #fef3c7;
    padding: 25px;
    border-radius: 16px;
    margin: 30px 0;
    border-left: 4px solid #f59e0b;
}

.tips-title {
    font-size: 18px;
    font-weight: 700;
    color: #92400e;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.tips-list {
    list-style: none;
    padding: 0;
}

.tips-list li {
    font-size: 14px;
    color: #78350f;
    padding: 10px 0;
    padding-left: 30px;
    position: relative;
    line-height: 1.6;
}

.tips-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #f59e0b;
    font-weight: bold;
    font-size: 18px;
}

/* Buttons */
.button-group {
    display: flex;
    gap: 15px;
    margin-top: 35px;
}

button {
    flex: 1;
    padding: 16px 35px;
    border: none;
    font-size: 17px;
    border-radius: 12px;
    cursor: pointer;
    font-weight: 600;
    color: #ffffff;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
}

.btn-secondary {
    background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
    box-shadow: 0 8px 20px rgba(107, 114, 128, 0.3);
}

button::before {
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

button:hover::before {
    width: 300px;
    height: 300px;
}

button:hover {
    transform: translateY(-3px);
}

button:active {
    transform: translateY(-1px);
}

/* Share Section */
.share-section {
    text-align: center;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 2px dashed #e5e7eb;
}

.share-title {
    font-size: 16px;
    color: #6b7280;
    margin-bottom: 15px;
    font-weight: 600;
}

.share-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.share-btn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid #e5e7eb;
    background: white;
}

.share-btn:hover {
    transform: scale(1.15);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .result-container {
        padding: 40px 30px;
    }

    h1 {
        font-size: 26px;
    }

    .score-circle {
        width: 170px;
        height: 170px;
    }

    .score-emoji {
        font-size: 40px;
    }

    .score-number {
        font-size: 30px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .button-group {
        flex-direction: column;
    }

    .section-title {
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .result-container {
        padding: 35px 25px;
    }

    h1 {
        font-size: 22px;
    }

    .score-circle {
        width: 150px;
        height: 150px;
    }

    .score-number {
        font-size: 26px;
    }

    .level-badge {
        font-size: 16px;
        padding: 8px 20px;
    }
}
</style>
<script>
function restartTest() {
    if (confirm('Are you sure you want to retake the test? Your current results will be lost.')) {
        window.location.href = "quiz.php?q=1";
    }
}

function goHome() {
    window.location.href = "index.php";
}

// Animate categories on load
window.addEventListener('load', function() {
    const bars = document.querySelectorAll('.category-bar-fill');
    bars.forEach(bar => {
        const width = bar.getAttribute('data-width');
        setTimeout(() => {
            bar.style.width = width + '%';
        }, 300);
    });
});
</script>
</head>
<body>
<div class="result-container">
    <!-- Header -->
    <div class="result-header">
        <div class="completion-badge">✓ Test Completed</div>
        <h1>Your EQ Test Results</h1>
        <p class="subtitle">Emotional Intelligence Assessment</p>
    </div>

    <!-- Score Display -->
    <div class="score-display">
        <div class="score-circle">
            <svg width="200" height="200" viewBox="0 0 200 200">
                <circle class="score-circle-bg" cx="100" cy="100" r="90"></circle>
                <circle class="score-circle-fill" cx="100" cy="100" r="90"></circle>
            </svg>
            <div class="score-content">
                <span class="score-emoji"><?php echo $emoji; ?></span>
                <span class="score-number"><?php echo $totalScore; ?></span>
                <span class="score-label">out of 50</span>
            </div>
        </div>
        <div class="level-badge"><?php echo $level; ?> Level</div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-value"><?php echo $percentage; ?>%</span>
            <span class="stat-label">Score Rate</span>
        </div>
        <div class="stat-card">
            <span class="stat-value">10/10</span>
            <span class="stat-label">Completed</span>
        </div>
        <div class="stat-card">
            <span class="stat-value"><?php echo $timeTaken; ?></span>
            <span class="stat-label">Time Taken</span>
        </div>
    </div>

    <!-- Feedback Section -->
    <div class="feedback-section">
        <div class="feedback-title">📊 Your Assessment</div>
        <div class="feedback-text"><?php echo $feedback; ?></div>
    </div>

    <!-- Category Breakdown -->
    <div class="category-section">
        <div class="section-title">
            📈 Category Breakdown
        </div>
        <?php foreach ($categories as $catName => $catPercent): ?>
        <div class="category-item">
            <div class="category-header">
                <span class="category-name"><?php echo $catName; ?></span>
                <span class="category-percent"><?php echo $catPercent; ?>%</span>
            </div>
            <div class="category-bar-bg">
                <div class="category-bar-fill" data-width="<?php echo $catPercent; ?>" style="width: 0%;"></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Tips Section -->
    <div class="tips-section">
        <div class="tips-title">💡 Recommendations for You</div>
        <ul class="tips-list">
            <?php foreach ($tips as $tip): ?>
            <li><?php echo $tip; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Action Buttons -->
    <div class="button-group">
        <button class="btn-secondary" onclick="restartTest()">🔄 Retake Test</button>
        <button class="btn-primary" onclick="goHome()">🏠 Go to Home</button>
    </div>

    <!-- Share Section -->
    <div class="share-section">
        <div class="share-title">Share your achievement!</div>
        <div class="share-buttons">
            <div class="share-btn" title="Share on Facebook">📘</div>
            <div class="share-btn" title="Share on Twitter">🐦</div>
            <div class="share-btn" title="Share on LinkedIn">💼</div>
            <div class="share-btn" title="Copy Link">🔗</div>
        </div>
    </div>
</div>
</body>
</html>\
