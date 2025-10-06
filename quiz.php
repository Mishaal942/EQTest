<?php
session_start();

// ========================================
// 📝 QUESTIONS WITH SPECIFIC OPTIONS
// ========================================
$questions = [
    [
        "id" => 1,
        "text" => "How do you usually react when someone disagrees with your opinion at work?",
        "category" => "Self-Awareness",
        "options" => [
            ["value" => 1, "text" => "I get defensive and argue", "emoji" => "😠"],
            ["value" => 2, "text" => "I feel uncomfortable but stay quiet", "emoji" => "😟"],
            ["value" => 3, "text" => "I listen but still hold my view", "emoji" => "🤔"],
            ["value" => 4, "text" => "I consider their perspective openly", "emoji" => "😊"],
            ["value" => 5, "text" => "I welcome it as a learning opportunity", "emoji" => "🌟"]
        ]
    ],
    [
        "id" => 2,
        "text" => "How well do you recognize your emotions in challenging situations?",
        "category" => "Self-Awareness",
        "options" => [
            ["value" => 1, "text" => "I don't notice them at all", "emoji" => "😶"],
            ["value" => 2, "text" => "I realize after the situation ends", "emoji" => "😕"],
            ["value" => 3, "text" => "I notice but can't name them clearly", "emoji" => "🤷"],
            ["value" => 4, "text" => "I can identify most of my feelings", "emoji" => "😌"],
            ["value" => 5, "text" => "I'm fully aware in the moment", "emoji" => "🎯"]
        ]
    ],
    [
        "id" => 3,
        "text" => "When a colleague seems stressed or upset, what is your typical response?",
        "category" => "Empathy",
        "options" => [
            ["value" => 1, "text" => "I ignore it and focus on my work", "emoji" => "🙈"],
            ["value" => 2, "text" => "I notice but avoid getting involved", "emoji" => "😬"],
            ["value" => 3, "text" => "I ask if they're okay briefly", "emoji" => "🤝"],
            ["value" => 4, "text" => "I offer help or listen to them", "emoji" => "💙"],
            ["value" => 5, "text" => "I actively support them emotionally", "emoji" => "🤗"]
        ]
    ],
    [
        "id" => 4,
        "text" => "How do you manage your emotions when facing unexpected problems?",
        "category" => "Self-Regulation",
        "options" => [
            ["value" => 1, "text" => "I panic and lose control", "emoji" => "😰"],
            ["value" => 2, "text" => "I get frustrated and stressed", "emoji" => "😤"],
            ["value" => 3, "text" => "I struggle but try to cope", "emoji" => "😓"],
            ["value" => 4, "text" => "I stay mostly calm and focused", "emoji" => "😎"],
            ["value" => 5, "text" => "I remain completely composed", "emoji" => "🧘"]
        ]
    ],
    [
        "id" => 5,
        "text" => "Before responding emotionally, how often do you pause and think?",
        "category" => "Self-Regulation",
        "options" => [
            ["value" => 1, "text" => "Never, I react immediately", "emoji" => "💥"],
            ["value" => 2, "text" => "Rarely, I usually react first", "emoji" => "⚡"],
            ["value" => 3, "text" => "Sometimes I pause briefly", "emoji" => "⏸️"],
            ["value" => 4, "text" => "Often, I think before responding", "emoji" => "🤔"],
            ["value" => 5, "text" => "Always, I carefully consider first", "emoji" => "🧠"]
        ]
    ],
    [
        "id" => 6,
        "text" => "Are you comfortable apologizing when you realize you were wrong?",
        "category" => "Social Skills",
        "options" => [
            ["value" => 1, "text" => "No, I avoid admitting mistakes", "emoji" => "🚫"],
            ["value" => 2, "text" => "I struggle with it a lot", "emoji" => "😣"],
            ["value" => 3, "text" => "I do it but feel uncomfortable", "emoji" => "😅"],
            ["value" => 4, "text" => "Yes, I apologize when needed", "emoji" => "🙏"],
            ["value" => 5, "text" => "Absolutely, I do it sincerely", "emoji" => "💯"]
        ]
    ],
    [
        "id" => 7,
        "text" => "How aware are you of the emotions of people around you?",
        "category" => "Empathy",
        "options" => [
            ["value" => 1, "text" => "Not aware at all", "emoji" => "😑"],
            ["value" => 2, "text" => "I notice only obvious signs", "emoji" => "👀"],
            ["value" => 3, "text" => "I pick up on some cues", "emoji" => "🔍"],
            ["value" => 4, "text" => "I read emotions quite well", "emoji" => "👁️"],
            ["value" => 5, "text" => "I sense subtle emotional shifts", "emoji" => "✨"]
        ]
    ],
    [
        "id" => 8,
        "text" => "How do you handle constructive feedback or criticism?",
        "category" => "Self-Regulation",
        "options" => [
            ["value" => 1, "text" => "I take it personally and get hurt", "emoji" => "💔"],
            ["value" => 2, "text" => "I feel defensive initially", "emoji" => "🛡️"],
            ["value" => 3, "text" => "I accept it but feel uneasy", "emoji" => "😕"],
            ["value" => 4, "text" => "I appreciate and learn from it", "emoji" => "📚"],
            ["value" => 5, "text" => "I actively seek it for growth", "emoji" => "🚀"]
        ]
    ],
    [
        "id" => 9,
        "text" => "During tense situations, how well do you remain calm?",
        "category" => "Self-Regulation",
        "options" => [
            ["value" => 1, "text" => "I get very anxious and tense", "emoji" => "😨"],
            ["value" => 2, "text" => "I feel nervous and uncomfortable", "emoji" => "😰"],
            ["value" => 3, "text" => "I manage but feel stressed", "emoji" => "😬"],
            ["value" => 4, "text" => "I stay relatively calm", "emoji" => "😌"],
            ["value" => 5, "text" => "I'm completely calm and clear", "emoji" => "🧘‍♂️"]
        ]
    ],
    [
        "id" => 10,
        "text" => "How often do you reflect on your behavior to improve yourself?",
        "category" => "Motivation",
        "options" => [
            ["value" => 1, "text" => "Never, I don't think about it", "emoji" => "🤷‍♂️"],
            ["value" => 2, "text" => "Rarely, only when forced to", "emoji" => "😐"],
            ["value" => 3, "text" => "Sometimes, when something goes wrong", "emoji" => "🤔"],
            ["value" => 4, "text" => "Regularly, I review my actions", "emoji" => "📝"],
            ["value" => 5, "text" => "Daily, it's part of my routine", "emoji" => "🌅"]
        ]
    ]
];

// Session initialization
if (!isset($_SESSION['responses'])) {
    $_SESSION['responses'] = [];
}

if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

// Current question handling
$current = isset($_GET['q']) ? intval($_GET['q']) : 1;
if ($current < 1) $current = 1;
if ($current > count($questions)) $current = count($questions);

$currentQuestion = $questions[$current - 1];
$totalQuestions = count($questions);
$progressPercent = ($current / $totalQuestions) * 100;

// Form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['responses'][$current] = $_POST['answer'] ?? null;
    
    $next = $current + 1;
    if ($next <= $totalQuestions) {
        header("Location: quiz.php?q=$next");
        exit;
    } else {
        $_SESSION['end_time'] = time();
        header("Location: results.php");
        exit;
    }
}

// Check if already answered
$isAnswered = isset($_SESSION['responses'][$current]);
$savedAnswer = $isAnswered ? $_SESSION['responses'][$current] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EQ Test - Question <?php echo $current; ?> of <?php echo $totalQuestions; ?></title>
<style>
/* ===========================
   🎨 ENHANCED PROFESSIONAL CSS
   =========================== */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", Arial, sans-serif;
    display: flex;
    min-height: 100vh;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 20px;
    position: relative;
    overflow: hidden;
}

/* Animated Background Particles */
body::before,
body::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 8s infinite ease-in-out;
}

body::before {
    width: 300px;
    height: 300px;
    top: -100px;
    left: -100px;
}

body::after {
    width: 400px;
    height: 400px;
    bottom: -150px;
    right: -150px;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) scale(1); }
    50% { transform: translateY(-30px) scale(1.05); }
}

/* Main Container */
.quiz-container {
    width: 90%;
    max-width: 750px;
    background: #ffffff;
    padding: 45px 40px;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 10;
    animation: slideIn 0.6s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Header Section */
.quiz-header {
    margin-bottom: 30px;
}

/* Progress Bar */
.progress-container {
    margin-bottom: 25px;
}

.progress-text {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.progress-label {
    font-size: 13px;
    font-weight: 600;
    color: #667eea;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.progress-percentage {
    font-size: 14px;
    font-weight: 700;
    color: #764ba2;
}

.progress-bar-bg {
    width: 100%;
    height: 8px;
    background: #e0e7ff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
}

.progress-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
    border-radius: 10px;
    transition: width 0.5s ease;
    box-shadow: 0 2px 10px rgba(102, 126, 234, 0.5);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 2px 10px rgba(102, 126, 234, 0.5); }
    50% { box-shadow: 0 2px 15px rgba(102, 126, 234, 0.8); }
}

/* Category Badge */
.category-badge {
    display: inline-block;
    padding: 6px 16px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 15px;
    box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
}

/* Question */
.question {
    font-size: 22px;
    margin-bottom: 30px;
    font-weight: 600;
    color: #2d3748;
    line-height: 1.5;
    position: relative;
    padding-bottom: 20px;
}

.question::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 10px;
}

/* Options Container */
.options-container {
    margin: 25px 0;
}

/* Option Styling */
.option {
    margin: 15px 0;
    padding: 16px 18px;
    background: #f8f9fa;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    display: flex;
    align-items: center;
    font-size: 15px;
    font-weight: 500;
    color: #4a5568;
    position: relative;
    overflow: hidden;
    line-height: 1.4;
}

.option::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
    transition: left 0.5s;
}

.option:hover::before {
    left: 100%;
}

.option:hover {
    background: #ffffff;
    border-color: #667eea;
    transform: translateX(8px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
}

.option input[type="radio"] {
    margin-right: 15px;
    cursor: pointer;
    width: 20px;
    height: 20px;
    accent-color: #667eea;
    flex-shrink: 0;
}

.option-emoji {
    font-size: 24px;
    margin-right: 12px;
    transition: transform 0.3s;
    flex-shrink: 0;
}

.option:hover .option-emoji {
    transform: scale(1.2) rotate(10deg);
}

.option-text {
    flex: 1;
}

.option:has(input:checked) {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #ffffff;
    border-color: #667eea;
    transform: translateX(8px) scale(1.02);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    animation: selectBounce 0.3s ease;
}

@keyframes selectBounce {
    0%, 100% { transform: translateX(8px) scale(1.02); }
    50% { transform: translateX(8px) scale(1.05); }
}

/* Navigation Buttons */
.button-group {
    display: flex;
    gap: 15px;
    margin-top: 30px;
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
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
    box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
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

button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

/* Helper Text */
.helper-text {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #6c757d;
    font-style: italic;
}

/* Answered Indicator */
.answered-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: #d4edda;
    color: #155724;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 15px;
    border: 1px solid #c3e6cb;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .quiz-container {
        padding: 35px 25px;
    }
    
    .question {
        font-size: 19px;
    }
    
    .option {
        padding: 14px 16px;
        font-size: 14px;
    }
    
    .option-emoji {
        font-size: 20px;
        margin-right: 10px;
    }
    
    button {
        padding: 14px 30px;
        font-size: 16px;
    }

    .button-group {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .quiz-container {
        padding: 30px 20px;
    }
    
    .question {
        font-size: 17px;
    }
    
    .option {
        padding: 12px 14px;
        font-size: 13px;
    }

    .option-emoji {
        font-size: 18px;
        margin-right: 8px;
    }

    .category-badge {
        font-size: 11px;
        padding: 5px 12px;
    }

    .option input[type="radio"] {
        width: 18px;
        height: 18px;
    }
}
</style>
<script>
function selectOption(radioId) {
    document.getElementById(radioId).checked = true;
    const option = document.querySelector(`label[for="${radioId}"]`);
    if (option) {
        option.style.animation = 'none';
        setTimeout(() => {
            option.style.animation = 'selectBounce 0.3s ease';
        }, 10);
    }
    document.querySelector('button[type="submit"]').disabled = false;
}

document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelector('button[type="submit"]').disabled = false;
        });
    });
});
</script>
</head>
<body>
<div class="quiz-container">
    <div class="quiz-header">
        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-text">
                <span class="progress-label">Question <?php echo $current; ?> of <?php echo $totalQuestions; ?></span>
                <span class="progress-percentage"><?php echo round($progressPercent); ?>%</span>
            </div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill" style="width: <?php echo $progressPercent; ?>%;"></div>
            </div>
        </div>

        <!-- Category Badge -->
        <div class="category-badge">
            📊 <?php echo $currentQuestion['category']; ?>
        </div>

        <!-- Answered Indicator -->
        <?php if ($isAnswered): ?>
        <div class="answered-badge">
            ✓ Already Answered
        </div>
        <?php endif; ?>

        <!-- Question -->
        <div class="question">
            <?php echo $currentQuestion['text']; ?>
        </div>
    </div>

    <!-- Options Form -->
    <form method="post">
        <div class="options-container">
            <?php foreach ($currentQuestion['options'] as $opt): 
                $radioId = "opt" . $opt['value'];
                $isChecked = ($savedAnswer == $opt['value']) ? 'checked' : '';
            ?>
            <label class="option" for="<?php echo $radioId; ?>" onclick="selectOption('<?php echo $radioId; ?>')">
                <input type="radio" 
                       name="answer" 
                       id="<?php echo $radioId; ?>" 
                       value="<?php echo $opt['value']; ?>" 
                       <?php echo $isChecked; ?>
                       required>
                <span class="option-emoji"><?php echo $opt['emoji']; ?></span>
                <span class="option-text"><?php echo $opt['text']; ?></span>
            </label>
            <?php endforeach; ?>
        </div>
        
        <!-- Navigation Buttons -->
        <div class="button-group">
            <?php if ($current > 1): ?>
            <button type="button" class="btn-secondary" onclick="window.location.href='quiz.php?q=<?php echo $current - 1; ?>'">
                ← Previous
            </button>
            <?php endif; ?>
            
            <button type="submit" class="btn-primary" <?php echo !$isAnswered ? 'disabled' : ''; ?>>
                <?php echo $current < $totalQuestions ? 'Next →' : 'Finish 🎉'; ?>
            </button>
        </div>

        <div class="helper-text">
            💡 Select the option that best describes you
        </div>
    </form>
</div>
</body>
</html>
