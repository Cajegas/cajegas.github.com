<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jenper Web</title>
<style>
        html { scroll-behavior: smooth; }
        body { margin: 0; background-color: #0a4c7aff; font-family: 'Open Sans', sans-serif; }

        /* ----- Animation ----- */
        .pop { opacity: 0; transform: translateY(20px); }
        .pop.animate { animation: popUp 2.5s forwards; }
        @keyframes popUp { to { opacity: 1; transform: translateY(0); } }

        /* ----- Header ----- */
        .site-header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between; 
            padding: 0 20px;    
            z-index: 1000;
            background: rgba(0,0,0,0.5);
            box-sizing: border-box;
            flex-wrap: wrap;
        }


        #jclogo img{
            max-height: 80px;
            width: 90px;
        }


        /* ----- Logo / Burger Placeholder ----- */
        .burger {
            display: none;
            flex-direction: column;
            justify-content: space-around;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .burger div {
            height: 3px;
            background: white;
            border-radius: 2px;
            background: rgba(188, 202, 210, 0.8);
        }

        /* ----- Nav ----- */
        .main-nav {
            display: flex;
            gap: 40px;
            flex-shrink: 1; 
        }
        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 8px;
            text-align: center;
            transition: color 0.3s ease, background-color 0.3s ease;
            white-space: nowrap;
        }
        .nav-link.active { color: #E37434; }
        .nav-link::after {
            content: '';
            display: block;
            height: 2px;
            width: 0;
            background: #E37434;
            transition: width 0.3s ease;
        }
        .nav-link.active::after { width: 100%; }
        @media (hover: hover) {
            .nav-link:hover { background-color: rgba(255,255,255,0.15); color: #E37434; }
        }

        /* ----- Mobile Hamburger Menu ----- */
        @media (max-width: 767px) {
             .site-header {
                flex-direction: row;
                justify-content: space-between; /* logo left, burger right */
                align-items: center;
                padding: 0 15px;
                height: 70px;
                position: fixed;
                top: 0;
            }
             #jclogo img {
                height: 80px;   /* smaller logo for mobile */
                width: auto;
                max-width: 120px;
            }
            .burger { 
                display: flex; 
                width: 35px;
                height: 25px;
                min-width: 35px;
                min-height: 25px;
            }
            .main-nav {
                position: fixed;
                top: 70px;
                left: 0;
                width: 100%;
                flex-direction: column;
                gap: 0;
                background: rgba(0,0,0,0.9);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                align-items: stretch;
                z-index: 999;
                box-shadow: 0 4px 6px rgba(0,0,0,0.3);
            }
            .main-nav.show {
                max-height: 400px; /* enough to show all links */
            }
            .nav-link {
                padding: 18px 20px;
                font-size: 16px;
                border-bottom: 1px solid rgba(227, 116, 52, 0.3);
                width: 100%;
                text-align: left;
                min-height: 44px; /* touch-friendly target */
                display: flex;
                align-items: center;
            }
            .nav-link:last-child {
                border-bottom: none;
            }
            #home {
                justify-content: center;
                padding: 80px 20px 40px 20px;
                min-height: calc(100vh - 70px);
                margin-top: 70px;
            }
            #home h1 {
                font-size: 28px;
                line-height: 1.2;
                margin-bottom: 10px;
            }
            #home h3 {
                font-size: 14px;
            }
            .project-card {
                padding: 15px;
            }
            .project-card img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }
            .project-card p {
                font-size: 14px;
                margin-top: 10px;
            }
            #projects {
                padding: 40px 15px;
            }
            #projects h2 {
                font-size: 24px;
                margin-bottom: 25px;
            }
            #about {
                padding: 40px 15px;
                flex-direction: column;
            }
            #about h2 {
                font-size: 24px;
            }
            #about p {
                font-size: 14px;
                line-height: 1.6;
            }
            #about .project-card {
                margin-bottom: 20px;
            }
            #about .project-card img {
                max-width: 250px;
            }
            #contact {
                display: flex;
                flex-direction: column; /* vertical by default */
                gap: 10px;
                align-items: center;
                margin: 40px 0;
                padding: 20px;
            }
            #contact a {
                color: white;
                text-decoration: none;
                font-size: 18px;
                padding: 10px 20px;
                border-radius: 8px;
                transition: background-color 0.3s ease;
            }
            footer {
                padding: 30px 30px;
                font-size: 14px;
            }
            .grid-card {
                padding: 12px;
            }
            .grid-card h4 {
                font-size: 16px;
            }
            .grid-card a {
                font-size: 14px;
                word-break: break-word;
            }
        }
        
        /* Small mobile devices */
        @media (max-width: 480px) {
            #home h1 {
                font-size: 24px;
            }
            #home h3 {
                font-size: 13px;
            }
            #jclogo img {
                height: 50px;
            }
            .site-header {
                height: 60px;
                padding: 0 10px;
            }
            .main-nav {
                top: 60px;
            }
            #home {
                margin-top: 0px;
                padding-top: 0px;
            }
            #contact {
                flex-direction: column;       /* horizontal layout */
                justify-content: center;   /* center links horizontally */
                gap: 20px;                 /* space between links */
            }
        }


        /* ----- Sections ----- */
        section { padding-top: 80px; }
        #home { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; padding: 10px 20px 20px 80px; text-align: center; background-size: cover; background-position: center; }
        
        @media (max-width: 767px) {
            section { padding-top: 0; }
        }
        #home h1 { font-size: 36px; color: white; margin-bottom: 5px; }
        #home h3 { font-size: 16px; color: #E37434; margin-top: 0; }

        #projects { padding: 40px 20px; background-size: cover; background-position: center; color: white; }
        #projects h2 { text-align: center; font-size: 28px; color: #E37434; margin-bottom: 30px; }
        .projects-grid { display: grid; grid-template-columns: 1fr; gap: 20px; text-align: center;}
        .project-card { background-color: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; display: flex; flex-direction: column; align-items: center; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .project-card:hover { transform: scale(1.03); }
        .project-card img { max-width: 260px; height: auto; border-radius: 8px; margin-bottom: 10px; }

        #about { padding: 50px 20px; color: white; display: flex; flex-direction: column; gap: 30px; text-align: center; background-size: cover; background-position: center; background-color: rgba(8,14,21,0.8); }
        #about h2 { font-size: 28px; color: #E37434; }
        #about img { max-width: 100%; height: auto; }

        #contact { display: flex; flex-direction: row; gap: 5px; align-items: center; margin: 40px 0; padding: 20px; justify-content: center;}
        #contact a { color: white; text-decoration: none; font-size: 18px; padding: 10px 20px; border-radius: 8px; transition: background-color 0.3s ease; }
        #contact a:hover { background-color: rgba(255,255,255,0.15); }

        footer { text-align: center; color: white; padding: 30px; }

        .grid-card { background-color: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px; }
        .grid-card h4 { margin-top: 0; color: #E37434; }
        .grid-card a { color: white; text-decoration: none; }
        .grid-card a:hover { color: #E37434; }

        /* ----- Tablet/Desktop ----- */
        @media (min-width: 768px) {
            #home h1 { font-size: 50px; text-align: left; }
            #home h3 { font-size: 20px; text-align: left; }
            #projects { padding: 50px 80px; }
            .projects-grid { grid-template-columns: repeat(2, 1fr); text-align: center; padding-top:20px;}
            #about { flex-direction: row; text-align: left; padding: 100px; }
            .main-nav { flex-direction: row; position: static; max-height: none; background: transparent;}
        }   
    </style>
        </head>
        <body>
        <div id="app">
            <base target="_blank">
            <header class="site-header">

                <div id="jclogo">
                     <img src="./images/JClogo.png" alt="JC Logo">
                </div>

                <!-- Burger for Mobile -->
                <div class="burger" @click="toggleMenu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Nav Links -->
                <nav ref="navMenu" :class="['main-nav', { show: isMenuOpen }]">
                    <a v-for="link in navLinks"
                    :key="link.id"
                    :href="'#' + link.id"
                    class="nav-link"
                    :class="{ active: activeSection === link.id }"
                    @click.prevent="handleNavClick(link.id)"
                    v-text="link.label">
                    </a>
                </nav>
            </header>

            <!-- Sections -->
            <section id="home" style="background-image: url('./images/bckg.png');">
                <h1 class="pop animate">Jennifer Cajegas</h1>
                <h3 class="pop animate">Junior Full Stack Web Developer</h3>
            </section>

            <section id="projects" style="background-image: url('./images/img4.jpeg');">
                <h2>My Projects</h2>
                <div class="projects-grid">
                    <div class="project-card"><img src="./images/BMAMS.png" alt="Batuan Municipal Agricultural Management System">
                    <p>Developed as my thesis project during university, this VB.Net, database-driven system manages agricultural
                         data for Batuan, Bohol. It tracks farmer registration, land holdings, resource distribution, and other municipal 
                         agricultural records. The system demonstrates my skills in database design, application development, 
                         and creating user-friendly systems that turn complex municipal data into actionable insights.</p></div>
                    <div class="project-card"><img src="./images/AInsurance.png" alt="Alturas Healthcare">
                    <p>A PHP, database-driven web application developed during my 1-year tenure at Alturas Group of Companies.
                         The system manages employee insurance records, budgets, and claims based on position and tenure,
                          integrates with partner hospitals for billing, and provides real-time insights on remaining benefits. 
                          This project highlights my skills in web development, database design, and building scalable, data-driven systems.</p></div>
                    <!--<div class="project-card"><img src="./images/task.jpeg" alt="Project 3"><p>Short description of project 3.</p></div>
                    <div class="project-card"><img src="./images/task.jpeg" alt="Project 4"><p>Short description of project 4.</p></div>-->
                </div>
            </section>

            <section id="about" style="background-image: url('./images/img3.jpeg');">
                <div class="project-card" style="flex:1;text-align:center;">
                    <img src="./images/jenpic.jpg" alt="Jennifer Cajegas" style="max-width:300px; border-radius:15px; border:3px solid #E37434;">
                </div>                                       
                <div style="flex:2; display:flex; flex-direction:column; gap:20px;">
                    <h2>About Me</h2>
                    <p>Hello! I'm Jennifer Cajegas, a Junior Full Stack Web Developer. I build responsive, user-friendly websites using PHP
                         (CodeIgniter or Laravel), JavaScript, CSS, Bootstrap, and Tailwind CSS. I hold a Bachelor's degree in Computer Science 
                         from the Philippines and have a strong foundation in MVC architecture and database-driven applications. I'm also authorized 
                         to work in the Netherlands.</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(150px,1fr)); gap:20px;">
                        <div class="grid-card"><h4>LinkedIn</h4><a href="https://www.linkedin.com/in/jennifer-cajegas-9689ab332">www.linkedin.com/in/jennifer-cajegas-9689ab332</a></div>
                        <div class="grid-card"><h4>Indeed</h4><a href="https://profile.indeed.com/p/jenniferc-bkmyw2f">profile.indeed.com/p/jennifer</a></div>
                        <div class="grid-card"><h4>GitHub</h4><a href="https://github.com/Cajegas/cajegas.github.com">cajegas.github.com</a></div>
                    </div>
                </div>
            </section>

           <!-- <section id="contact">
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
            </section> -->

            <footer>&copy; 2025 Jennifer Cajegas. All rights reserved.</footer>
        </div>
    
    
    <script src="./js/vue.global.js"></script>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    activeSection: "",
                    isMenuOpen: false, 
                    navLinks: [
                        { id: "home", label: "Home" },
                        { id: "projects", label: "Projects" },
                        { id: "about", label: "About Me" }
                    ]
                };
            },

            mounted() {
                window.addEventListener("scroll", this.onScroll);
                document.addEventListener("click", this.handleOutsideClick);
                this.onScroll();
            },

            beforeUnmount() {
                window.removeEventListener("scroll", this.onScroll);
                document.removeEventListener("click", this.handleOutsideClick);
            },

            methods: {
                toggleMenu() {
                    this.isMenuOpen = !this.isMenuOpen; // Toggle nav visibility
                },

                 handleOutsideClick(event) {
                    // Only close if menu is open
                    if (!this.isMenuOpen) return;

                    // Check if the click is outside the nav AND the burger
                    const nav = this.$refs.navMenu;
                    const burger = document.querySelector(".burger");
                    if (!nav.contains(event.target) && !burger.contains(event.target)) {
                        this.isMenuOpen = false;
                    }
                },

                onScroll() {
                    const sections = document.querySelectorAll("section");

                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 120;
                        const sectionHeight = section.offsetHeight;

                         // Close burger if scrolling
                        if (this.isMenuOpen) this.isMenuOpen = false;

                        if (
                            window.scrollY >= sectionTop &&
                            window.scrollY < sectionTop + sectionHeight
                        ) {
                            this.activeSection = section.id;
                        }
                    });
                },

                handleNavClick(id) {
                    this.scrollToSection(id);

                    if (this.isMenuOpen) this.isMenuOpen = false;

                    if (id==="home"){
                        this.restartPopAnimation();
                    }
                 
                },

                scrollToSection(id) {
                    const section = document.getElementById(id);
                    if (!section) return;

                    const headerOffset = 80;
                    const offsetPosition =
                        section.getBoundingClientRect().top + window.scrollY - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                },

                restartPopAnimation() {
                    const elements = document.querySelectorAll(".pop");

                    elements.forEach(el => {
                        el.classList.remove("animate");
                        void el.offsetWidth; // force reflow
                        el.classList.add("animate");
                    });
                }
            }
        }).mount("#app");
    </script>
    </body>

</html>
