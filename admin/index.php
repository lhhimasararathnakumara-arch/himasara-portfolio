<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$dataFile = '../data.json';
$data = [];
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Edit Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-main: #0B0C10; --bg-secondary: #1F2833; --primary: #66FCF1; --text-main: #C5C6C7; --text-light: #fff;
            --glass-bg: rgba(31, 40, 51, 0.5); --glass-border: rgba(102, 252, 241, 0.2);
        }
        body { margin: 0; background: var(--bg-main); color: var(--text-main); font-family: 'Outfit', sans-serif; display: flex;}
        
        .sidebar { width: 250px; background: var(--bg-secondary); padding: 30px 20px; height: 100vh; position: fixed; border-right: 1px solid var(--glass-border); }
        .sidebar h2 { color: var(--primary); margin-bottom: 40px; font-size: 1.5rem; text-align: center; }
        .sidebar a { display: block; color: var(--text-main); text-decoration: none; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(102, 252, 241, 0.1); color: var(--primary); }
        
        .main-content { margin-left: 250px; padding: 40px; width: calc(100% - 250px); }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 1px solid var(--glass-border); padding-bottom: 20px; }
        .header h1 { color: var(--text-light); margin: 0;}
        .logout-btn { background: transparent; border: 1px solid #ff6b6b; color: #ff6b6b; padding: 8px 15px; border-radius: 5px; text-decoration: none; transition: 0.3s; }
        .logout-btn:hover { background: #ff6b6b; color: #fff; }
        
        .glass-panel { background: var(--glass-bg); backdrop-filter: blur(10px); border: 1px solid var(--glass-border); padding: 30px; border-radius: 12px; margin-bottom: 30px; }
        .glass-panel h3 { color: var(--primary); margin-top: 0; margin-bottom: 20px; font-weight: 600;}
        
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: var(--text-light); font-size: 0.9rem; }
        input[type="text"], input[type="email"], textarea { width: 100%; padding: 12px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-family: inherit; outline: none; transition: 0.3s; box-sizing: border-box;}
        input:focus, textarea:focus { border-color: var(--primary); }
        textarea { resize: vertical; min-height: 100px; }
        
        .btn-save { background: var(--primary); color: #000; border: none; padding: 12px 25px; border-radius: 6px; font-weight: 600; cursor: pointer; transition: 0.3s; font-size: 1rem; width: 100%; margin-top: 15px; }
        .btn-save:hover { background: #fff; }
        
        .alert { padding: 15px; background: rgba(102, 252, 241, 0.2); color: var(--primary); border-radius: 6px; margin-bottom: 20px; border: 1px solid var(--primary); display: none; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard<span>.</span></h2>
        <a href="#hero" class="active"><i class="fas fa-home"></i> Hero Section</a>
        <a href="#about"><i class="fas fa-user"></i> About Me</a>
        <a href="#contact"><i class="fas fa-envelope"></i> Contact Info</a>
        <br>
        <a href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> View Site</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Edit Portfolio</h1>
            <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <div class="alert" id="successAlert">
            <i class="fas fa-check-circle"></i> Settings saved successfully!
        </div>

        <form id="portfolioForm">
            
            <div class="glass-panel" id="hero">
                <h3>Hero Section</h3>
                <div class="form-group">
                    <label>Greeting Line</label>
                    <input type="text" name="hero_greeting" value="<?= htmlspecialchars($data['hero']['greeting'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="hero_name" value="<?= htmlspecialchars($data['hero']['name'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>Taglines (Comma separated)</label>
                    <input type="text" name="hero_taglines" value="<?= htmlspecialchars(implode(', ', $data['hero']['taglines'] ?? [])) ?>">
                </div>
                <div class="form-group">
                    <label>Introduction</label>
                    <textarea name="hero_intro"><?= htmlspecialchars($data['hero']['intro'] ?? '') ?></textarea>
                </div>
            </div>

            <div class="glass-panel" id="about">
                <h3>About Me Section</h3>
                <div class="form-group">
                    <label>Paragraph 1</label>
                    <textarea name="about_text1"><?= htmlspecialchars($data['about']['text1'] ?? '') ?></textarea>
                </div>
                <div class="form-group">
                    <label>Career Goal</label>
                    <textarea name="about_career_goal"><?= htmlspecialchars($data['about']['career_goal'] ?? '') ?></textarea>
                </div>
                <div style="display:flex; gap:15px;">
                    <div class="form-group" style="flex:1;">
                        <label>Experience Years</label>
                        <input type="text" name="experience_years" value="<?= htmlspecialchars($data['about']['experience_years'] ?? '') ?>">
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Projects Completed</label>
                        <input type="text" name="projects_completed" value="<?= htmlspecialchars($data['about']['projects_completed'] ?? '') ?>">
                    </div>
                </div>
            </div>

            <div class="glass-panel" id="contact">
                <h3>Contact Info</h3>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="contact_email" value="<?= htmlspecialchars($data['contact']['email'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="contact_phone" value="<?= htmlspecialchars($data['contact']['phone'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>LinkedIn Link</label>
                    <input type="text" name="contact_linkedin" value="<?= htmlspecialchars($data['contact']['linkedin'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label>GitHub Link</label>
                    <input type="text" name="contact_github" value="<?= htmlspecialchars($data['contact']['github'] ?? '') ?>">
                </div>
            </div>

            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save All Changes</button>
        </form>
    </div>

    <script>
        document.getElementById('portfolioForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('save.php', {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if(data.status === 'success') {
                    const alert = document.getElementById('successAlert');
                    alert.style.display = 'block';
                    setTimeout(() => alert.style.display = 'none', 3000);
                }
            });
        });
    </script>
</body>
</html>
