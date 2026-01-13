# Jenper Web - Portfolio Website

Portfolio website for Jennifer Cajegas, Junior Full Stack Web Developer.

## GitHub Pages Setup

This site is configured to work on GitHub Pages. Follow these steps to deploy:

### 1. Enable GitHub Pages

1. Go to your repository on GitHub
2. Click on **Settings**
3. Scroll down to **Pages** section
4. Under **Source**, select:
   - **Branch: main** (or your default branch)
   - **Folder: / (root)**
5. Click **Save**

### 2. Repository Structure

The site uses the following structure:
```
/
├── index.html          # Main HTML file (served by GitHub Pages)
├── .nojekyll          # Prevents Jekyll processing
├── public/
│   ├── images/        # All images
│   └── js/            # JavaScript files (Vue.js)
```

### 3. Access Your Site

After enabling GitHub Pages, your site will be available at:
- **Project page**: `https://[username].github.io/[repository-name]/`
- **User/Organization page**: `https://[username].github.io/` (if repo is named `[username].github.io`)

The site automatically detects the base path and adjusts asset URLs accordingly.

### 4. Mobile Responsive

The site is fully responsive and optimized for mobile devices with:
- Hamburger menu for navigation on mobile
- Touch-friendly button sizes
- Responsive images and layouts
- Optimized typography for small screens

## Local Development

If you want to run this locally:

1. Simply open `index.html` in a web browser, or
2. Use a local server:
   ```bash
   # Python 3
   python -m http.server 8000
   
   # Node.js
   npx serve
   ```

Then visit `http://localhost:8000`

## Technologies Used

- HTML5
- CSS3 (with mobile-first responsive design)
- Vue.js 3
- Vanilla JavaScript

## Features

- Smooth scrolling navigation
- Active section highlighting
- Mobile hamburger menu
- Responsive design for all screen sizes
- Animated sections
