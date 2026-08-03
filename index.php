<?php
$dataFile = __DIR__ . '/data.json';
$data = [];
if(file_exists($dataFile)){
    $json = file_get_contents($dataFile);
    $data = json_decode($json, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['hero']['name'] ?? 'Himasara Ranapuma') ?> | Portfolio</title>
    <meta name="description" content="Portfolio of <?= htmlspecialchars($data['hero']['name'] ?? '') ?>">
    <link rel="stylesheet" href="style.css?v=2.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Background Animated Shapes -->
    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>
    <div class="bg-shape shape-3"></div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo"><?= explode(' ', $data['hero']['name'])[0] ?? 'Name' ?><span>.</span></div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <!-- 1. Home / Hero Section -->
    <section id="home" class="hero">
        <div class="container hero-content">
            <div class="hero-text">
                <p class="greeting"><?= htmlspecialchars($data['hero']['greeting'] ?? '') ?></p>
                <h1><?= htmlspecialchars($data['hero']['name'] ?? '') ?></h1>
                
                <h2 class="tagline">
                    <?php 
                    $tags = $data['hero']['taglines'] ?? [];
                    echo implode(' <span class="highlight">|</span> ', array_map('htmlspecialchars', $tags));
                    ?>
                </h2>
                <p class="intro"><?= htmlspecialchars($data['hero']['intro'] ?? '') ?></p>
                <div class="hero-btns">
                    <a href="#projects" class="btn btn-primary">View My Work</a>
                    <a href="#contact" class="btn btn-secondary">Contact Me</a>
                </div>
                
                <div class="promo-banner glass">
                    <p><i class="fas fa-gift" style="color: var(--primary-color); margin-right: 8px;"></i> Need a free design concept for your business before hiring? <a href="#contact" class="promo-link">Drop me a message!</a></p>
                </div>
            </div>
            <div class="hero-image">
                <div class="img-wrapper glass">
                    <img src="assets/images/himasara.png" alt="<?= htmlspecialchars($data['hero']['name'] ?? '') ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- 2. About Me -->
    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">About <span>Me</span></h2>
            <div class="about-grid">
                <div class="about-text glass">
                    <h3>Who am I?</h3>
                    <p><?= $data['about']['text1'] ?? '' ?></p>
                    <p><?= htmlspecialchars($data['about']['text2'] ?? '') ?></p>
                    <p><strong>Career Goal:</strong> <?= htmlspecialchars($data['about']['career_goal'] ?? '') ?></p>
                </div>
                <div class="about-stats glass">
                    <div class="stat-item">
                        <h3><?= htmlspecialchars($data['about']['experience_years'] ?? '') ?></h3>
                        <p>Years Experience</p>
                    </div>
                    <div class="stat-item">
                        <h3><?= htmlspecialchars($data['about']['projects_completed'] ?? '') ?></h3>
                        <p>Projects Completed</p>
                    </div>
                    <div class="stat-item">
                        <h3><?= htmlspecialchars($data['about']['client_satisfaction'] ?? '') ?></h3>
                        <p>Client Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Skills -->
    <section id="skills" class="skills">
        <div class="container">
            <h2 class="section-title">My <span>Skills</span></h2>
            <div class="skills-grid">
                
                <div class="skill-category glass">
                    <h3><i class="fas fa-code"></i> Frontend</h3>
                    <?php foreach(($data['skills']['frontend'] ?? []) as $skill): ?>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span><?= htmlspecialchars($skill['name'] ?? '') ?></span>
                            <span><?= htmlspecialchars($skill['percent'] ?? '') ?>%</span>
                        </div>
                        <div class="progress-bar"><div class="progress" style="width: <?= htmlspecialchars($skill['percent'] ?? '') ?>%;"></div></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="skill-category glass">
                    <h3><i class="fas fa-server"></i> Backend</h3>
                    <?php foreach(($data['skills']['backend'] ?? []) as $skill): ?>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span><?= htmlspecialchars($skill['name'] ?? '') ?></span>
                            <span><?= htmlspecialchars($skill['percent'] ?? '') ?>%</span>
                        </div>
                        <div class="progress-bar"><div class="progress" style="width: <?= htmlspecialchars($skill['percent'] ?? '') ?>%;"></div></div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="skill-category glass">
                    <h3><i class="fas fa-tools"></i> Tools & Design</h3>
                    <?php foreach(($data['skills']['tools'] ?? []) as $skill): ?>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span><?= htmlspecialchars($skill['name'] ?? '') ?></span>
                            <span><?= htmlspecialchars($skill['percent'] ?? '') ?>%</span>
                        </div>
                        <div class="progress-bar"><div class="progress" style="width: <?= htmlspecialchars($skill['percent'] ?? '') ?>%;"></div></div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- 4. Projects -->
    <section id="projects" class="projects">
        <div class="container">
            <h2 class="section-title">Featured <span>Projects</span></h2>
            <div class="projects-grid">
                <?php foreach(($data['projects'] ?? []) as $proj): ?>
                <div class="project-card glass">
                    <div class="project-img">
                        <img src="<?= htmlspecialchars($proj['image'] ?? '') ?>" alt="<?= htmlspecialchars($proj['title'] ?? '') ?>">
                        <div class="project-overlay">
                            <?php if(!empty($proj['link_live'])): ?>
                                <?php if($proj['id'] == '1'): ?>
                                    <a href="<?= htmlspecialchars($proj['link_live']) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-play-circle"></i> Watch Demo</a>
                                <?php else: ?>
                                    <a href="<?= htmlspecialchars($proj['link_live']) ?>" class="btn btn-primary" target="_blank"><i class="fas fa-external-link-alt"></i> Live</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if(!empty($proj['link_code'])): ?>
                            <a href="<?= htmlspecialchars($proj['link_code']) ?>" class="btn btn-secondary" target="_blank"><i class="fab fa-github"></i> Code</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="project-info">
                        <h3><?= htmlspecialchars($proj['title'] ?? '') ?></h3>
                        <p><?= htmlspecialchars($proj['description'] ?? '') ?></p>
                        <div class="tech-stack">
                            <?php foreach(($proj['tech'] ?? []) as $t): ?>
                                <span><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. Services -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="section-title">My <span>Services</span></h2>
            <div class="services-grid">
                <?php foreach(($data['services'] ?? []) as $srv): ?>
                <div class="service-card glass">
                    <i class="fas <?= htmlspecialchars($srv['icon'] ?? '') ?>"></i>
                    <h3><?= htmlspecialchars($srv['title'] ?? '') ?></h3>
                    <p><?= htmlspecialchars($srv['description'] ?? '') ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2 class="section-title">Client <span>Reviews</span></h2>
            <div class="testimonials-grid">
                <?php foreach($data['testimonials'] ?? [] as $review): ?>
                <div class="testimonial-card glass">
                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                    <p class="review-text">"<?= htmlspecialchars($review['text']) ?>"</p>
                    <div class="review-stars">
                        <?php for($i=0; $i<$review['rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <div class="client-info">
                        <img src="<?= htmlspecialchars($review['image']) ?>" alt="<?= htmlspecialchars($review['name']) ?>" class="client-img">
                        <div class="client-details">
                            <h4><?= htmlspecialchars($review['name']) ?></h4>
                            <p><?= htmlspecialchars($review['role']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Get In <span>Touch</span></h2>
            <div class="contact-wrapper">
                
                <div class="contact-info glass">
                    <h3>Contact Information</h3>
                    <p>Let's build something amazing together!</p>
                    
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:<?= htmlspecialchars($data['contact']['email'] ?? '') ?>"><?= htmlspecialchars($data['contact']['email'] ?? '') ?></a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-mobile-alt"></i>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:<?= htmlspecialchars($data['contact']['phone'] ?? '') ?>"><?= htmlspecialchars($data['contact']['phone'] ?? '') ?></a>
                        </div>
                    </div>
                    
                    <?php if(!empty($data['contact']['whatsapp'])): ?>
                    <div class="info-item">
                        <i class="fab fa-whatsapp" style="font-size: 1.5rem; color: #45A29E; margin-right: 15px;"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <?php 
                            $wa = $data['contact']['whatsapp'];
                            $waLink = preg_replace('/[^0-9]/', '', $wa);
                            ?>
                            <a href="https://wa.me/<?= htmlspecialchars($waLink) ?>" target="_blank"><?= htmlspecialchars($wa) ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="social-links">
                        <?php if(!empty($data['contact']['linkedin']) && $data['contact']['linkedin'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($data['contact']['linkedin']) ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($data['contact']['github']) && $data['contact']['github'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($data['contact']['github']) ?>" target="_blank"><i class="fab fa-github"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($data['contact']['instagram']) && $data['contact']['instagram'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($data['contact']['instagram']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if(!empty($data['contact']['tiktok']) && $data['contact']['tiktok'] !== '#'): ?>
                        <a href="<?= htmlspecialchars($data['contact']['tiktok']) ?>" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

                <form class="contact-form glass" id="contactForm">
                    <input type="hidden" name="access_key" value="b34b3d49-5a9c-47d0-b8e4-208a2b47c2a6">
                    <div class="input-group">
                        <input type="text" name="name" id="name" required placeholder="Your Name">
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" id="email" required placeholder="Your Email">
                    </div>
                    <div class="input-group">
                        <input type="text" name="subject" id="subject" required placeholder="Subject">
                    </div>
                    <div class="input-group">
                        <textarea name="message" id="message" rows="5" required placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary submit-btn">Send Message <i class="fas fa-paper-plane"></i></button>
                </form>

            </div>
        </div>
    </section>

    <!-- 7. Footer -->
    <footer>
        <div class="container footer-content">
            <div class="footer-logo">
                <?= explode(' ', $data['hero']['name'])[0] ?? 'Name' ?><span>.</span>
                <p>Building the digital future.</p>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h4>Follow Me</h4>
                <div class="social-icons">
                    <?php if(!empty($data['contact']['linkedin']) && $data['contact']['linkedin'] !== '#'): ?>
                    <a href="<?= htmlspecialchars($data['contact']['linkedin']) ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($data['contact']['github']) && $data['contact']['github'] !== '#'): ?>
                    <a href="<?= htmlspecialchars($data['contact']['github']) ?>" target="_blank"><i class="fab fa-github"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($data['contact']['instagram']) && $data['contact']['instagram'] !== '#'): ?>
                    <a href="<?= htmlspecialchars($data['contact']['instagram']) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($data['contact']['tiktok']) && $data['contact']['tiktok'] !== '#'): ?>
                    <a href="<?= htmlspecialchars($data['contact']['tiktok']) ?>" target="_blank"><i class="fab fa-tiktok"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date("Y"); ?> <?= htmlspecialchars($data['hero']['name'] ?? '') ?>. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
