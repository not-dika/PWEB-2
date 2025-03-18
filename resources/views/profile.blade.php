<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("popup-message").style.display = "block";
            setTimeout(() => {
                document.getElementById("popup-message").style.display = "none";
            }, 3000);
        });

        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
            const navbar = document.getElementById("navbar");
            navbar.classList.toggle("navbar-light-mode");
            navbar.classList.toggle("navbar-dark-mode");

            const message = document.body.classList.contains("dark-mode") ? "Lights off 😎" : "Too bright? Turn off the lights!";
            const popup = document.getElementById("popup-message");
            popup.textContent = message;
            popup.style.display = "block";
            setTimeout(() => {
                popup.style.display = "none";
            }, 3000);
        }
    </script>
</head>
<body>
    <nav id="navbar" class="navbar navbar-light navbar-light-mode">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="site-name">NPWorks</a>
            <div class="d-flex align-items-center">
                <a href="#about-me" class="nav-link">About</a>
                <a href="#hero" class="nav-link">Home</a>
                <a href="#contact-me" class="nav-link">Contact</a>
            </div>
            <div class="switch ms-auto">
                <span class="me-2">Dark Mode</span>
                <input type="checkbox" id="darkModeToggle" onchange="toggleDarkMode()">
                <label class="slider" for="darkModeToggle"></label>
            </div>
        </div>
    </nav>

    <div id="popup-message">Too bright? Turn off the lights!</div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 left-sidebar text-center">
                <img src="pfp.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-3" style="width: 150px;">
                <h1 class="hero-title">GER&#65;LDI NOV&#65;LINO PUTR&#65;</h1>
                <p>Programmer & Back-End Developer</p>
                <p class="text-muted">Experienced in web applications and backend systems, skilled in Java, JavaScript, and backend technologies.</p>

                <div class="section-title">Contact</div>
                <p><i class="fas fa-phone"></i> +62 882-0085-62720</p>
                <p><i class="fas fa-envelope"></i> contact@npworks.xyz</p>
                <p><i class="fas fa-globe"></i> <a href="https://npworks.xyz">npworks.xyz</a></p>

                <div class="section-title">Skills</div>
                <p><strong>Languages:</strong> Indonesian, English, Japanese</p>
                <p><strong>Programming:</strong> Java, C++, C#, HTML, JavaScript, CSS</p>
            </div>

            <div class="col-md-9 right-content">
                <div class="right-content">
                    <section id="hero">
                        <h2>Welcome!</h2>
                        <p>I’m Ger&#97;ldi, a programmer and back-end developer with over 5 years of experience. I’m skilled at optimizing systems and creating efficient solutions.</p>
                    </section>

                    <section id="about-me" class="mt-4">
                        <h3 class="section-title">About Me</h3>
                        <p>I’m passionate about coding and building solutions that make a difference. With strong skills in Java and back-end technologies, I aim to develop applications that help organizations enhance efficiency. I enjoy tackling complex problems and continuously learning new technologies. My goal is to become an expert in backend development and system architecture.</p>
                    </section>

                    <section id="projects" class="mt-4">
                        <h3 class="section-title">Projects</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card project-card">
                                    <div class="card-body">
                                        <h5 class="card-title">LuckyNetwork LLC</h5>
                                        <p class="card-text">Managed server operations and improved proxy infrastructure.</p>
                                        <a href="https://github.com/Lucky-Development-Department" class="btn btn-primary">View Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card project-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Bengkel Sinema</h5>
                                        <p class="card-text">Developed websites and digital marketing strategies.</p>
                                        <a href="https://www.bengkelsinema.id" class="btn btn-primary">View Project</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card project-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Personal</h5>
                                        <p class="card-text">Project that I do for myself. Including this website!</p>
                                        <a href="https://github.com/not-dika" class="btn btn-primary">View Project</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="contact-me" class="mt-4">
                        <h3 class="section-title">Contact Me</h3>
                        <p>Feel free to reach out for collaborations or inquiries.</p>
                        <p><i class="fab fa-github"></i> <a href="https://github.com/not-dika">GitHub</a></p>
                        <p><i class="fab fa-linkedin"></i> <a href="#">LinkedIn</a></p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Designed by Geraldi Novalino<br>
        ©2024 All Rights Reserved.
    </footer>
</body>
</html>
