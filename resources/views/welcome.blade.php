<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jenper Web</title>
<style>
        html { scroll-behavior: smooth; }
        body { margin: 0; background-color: #16476A; font-family: 'Open Sans', sans-serif; }

        /* ----- Animation ----- */
        .pop { opacity: 0; transform: translateY(20px); }
        .pop.animate { animation: popUp 2.5s forwards; }
        @keyframes popUp { to { opacity: 1; transform: translateY(0); } }

        /* ----- Header ----- */
        .site-header {
            position: flex;
            top: 0;
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between; 
            padding: 0 20px;    
            z-index: 1000;
            background: rgba(0,0,0,0.4);
            box-sizing: border-box;
            flex-wrap: wrap;
        }


        #jclogo img{
                height: 150px;
                width: auto;
                max-width: 200px;
        }


        /* ----- Logo / Burger Placeholder ----- */
        .burger {
            display: none;
            flex-direction: column;
            justify-content: space-around;
            width: 30px;
            height: 22px;
            cursor: pointer;
        }
        .burger div {
            height: 3px;
            background: white;
            border-radius: 2px;
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
                padding: 0 20px;
                height: 80px;
            }
             #jclogo img {
                height: 80px;   /* smaller logo for mobile */
                width: auto;
            }
            .burger { display: flex; }
            .main-nav {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                flex-direction: column;
                gap: 0;
                background: rgba(0,0,0,0.95);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                align-items: center;
                z-index: 999;
            }
            .main-nav.show {
                max-height: 300px; /* enough to show all links */
            }
            .nav-link {
                padding: 15px;
                font-size: 16px;
                border-bottom: 1px solid #E37434;
            }
            #home {
                justify-content: center;
                padding: 60px 20px 20px 20px;
            }
        }


        /* ----- Sections ----- */
        section { padding-top: 80px; }
        #home { min-height: 100vh; display: flex; flex-direction: column; justify-content: center; padding: 10px 20px 20px 80px; text-align: center; background-size: cover; }
        #home h1 { font-size: 36px; color: white; margin-bottom: 5px; }
        #home h3 { font-size: 16px; color: #E37434; margin-top: 0; }

        #projects { padding: 40px 20px; background-size: cover; color: white; }
        #projects h2 { text-align: center; font-size: 28px; color: #E37434; margin-bottom: 30px; }
        .projects-grid { display: grid; grid-template-columns: 1fr; gap: 20px; }
        .project-card { background-color: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; display: flex; flex-direction: column; align-items: center; transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .project-card:hover { transform: scale(1.03); }

        #about { padding: 50px 20px; color: white; display: flex; flex-direction: column; gap: 30px; text-align: center; background-size: cover; background-color: rgba(8,14,21,0.8); }
        #about h2 { font-size: 28px; color: #E37434; }

        #contact { display: flex; flex-direction: column; gap: 20px; align-items: center; margin: 40px 0; }

        footer { text-align: center; color: white; padding: 20px; }

        /* ----- Tablet/Desktop ----- */
        @media (min-width: 767px) {
            #home h1 { font-size: 50px; text-align: left; }
            #home h3 { font-size: 20px; text-align: left; }
            #projects { padding: 50px 80px; }
            .projects-grid { grid-template-columns: repeat(2, 1fr); }
            #about { flex-direction: row; text-align: left; padding: 100px; }
            .main-nav { flex-direction: row; position: static; max-height: none; background: transparent;}
        }   
    </style>
        </head>
        <body>
        <div id="app">
            <header class="site-header">

                <div id="jclogo">
                     <img src="images/JClogo.png" alt="JC Logo">
                </div>

                <!-- Burger for Mobile -->
                <div class="burger" @click="toggleMenu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Nav Links -->
                <nav :class="['main-nav', { show: isMenuOpen }]">
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
            <section id="home" style="background-image: url('{{ asset('images/bckg.png') }}');">
                <h1 class="pop animate">Jennifer Cajegas</h1>
                <h3 class="pop animate">Junior Full Stack Web Developer</h3>
            </section>

            <section id="projects" style="background-image: url('{{ asset('images/img4.jpeg') }}');">
                <h2>My Projects</h2>
                <div class="projects-grid">
                    <div class="project-card"><img src="{{ asset('images/task.jpeg') }}"><p>Short description of project 1.</p></div>
                    <div class="project-card"><img src="{{ asset('images/task.jpeg') }}"><p>Short description of project 2.</p></div>
                    <div class="project-card"><img src="{{ asset('images/task.jpeg') }}"><p>Short description of project 3.</p></div>
                    <div class="project-card"><img src="{{ asset('images/task.jpeg') }}"><p>Short description of project 4.</p></div>
                </div>
            </section>

            <section id="about" style="background-image: url('{{ asset('images/img3.jpeg') }}');">
                <div class="project-card" style="flex:1;text-align:center;">
                    <img src="{{ asset('images/jenpic.jpg') }}" style="max-width:300px; border-radius:15px; border:3px solid #E37434;">
                </div>
                <div style="flex:2; display:flex; flex-direction:column; gap:20px;">
                    <h2>About Me</h2>
                    <p>Hello! I’m Jennifer Cajegas, a Junior Full Stack Web Developer. I build responsive, user-friendly websites using PHP
                         (CodeIgniter or Laravel), JavaScript, CSS, Bootstrap, and Tailwind CSS. I hold a Bachelor’s degree in Computer Science 
                         from the Philippines and have a strong foundation in MVC architecture and database-driven applications. I’m also authorized 
                         to work in the Netherlands.</p>
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(150px,1fr)); gap:20px;">
                        <div class="grid-card"><h4>LinkedIn</h4><a href="#">linkedin.com/in/jennifer</a></div>
                        <div class="grid-card"><h4>Indeed</h4><a href="#">Indeed.com/in/jennifer</a></div>
                        <div class="grid-card"><h4>GitHub</h4><a href="#">github.com/jennifer</a></div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
            </section>

            <footer>&copy; 2025 Jennifer Cajegas. All rights reserved.</footer>
        </div>
    
    <script src="js/vue.global.js"></script>

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
                this.onScroll();
            },

            beforeUnmount() {
                window.removeEventListener("scroll", this.onScroll);
            },

            methods: {
                toggleMenu() {
                    this.isMenuOpen = !this.isMenuOpen; // Toggle nav visibility
                },

                onScroll() {
                    const sections = document.querySelectorAll("section");

                    sections.forEach(section => {
                        const sectionTop = section.offsetTop - 120;
                        const sectionHeight = section.offsetHeight;

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
