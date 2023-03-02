const navBar = document.getElementById("nav-bar"),
  NavBarToggler = document.getElementById("toggler"),
  navMenu = document.getElementById("nav-menu"),
  ThemeIcon = document.getElementById("themeIcon"),
  themes = document.querySelectorAll('[name="theme"][type="radio"]'),
  html = document.documentElement,
  defaultMode = "dark", // string : 'dark' , 'light' or 'system'
  //check if darkMode is active in user system
  darkModeQuery = matchMedia("(prefers-color-scheme: dark)"),
  navLinks = document.querySelectorAll("#nav-menu li a"),
  goToTopBtn = document.getElementById("goToTopBtn"),
  modeWatchTimeDelay = 3000,
  speed = 60,
  replyBtns = document.querySelectorAll(".replyBtn");

replyBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const arrow = e.target.closest(".replyBtn svg");
    arrow.classList.toggle("rotate-90");
    console.log(arrow);
    const comment = e.target.closest(".parent");
    const replies = comment.querySelector(".children");
    replies.classList.toggle("block");
  });
});

goToTopBtn.addEventListener(
  "click",
  () => (document.documentElement.scrollTop = 0)
);

navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    toggleNavbar();
  });
});




const search=document.getElementById('search');

search.addEventListener('click', (e)=>{
if(!e.target.closest('svg')) return ;
const searchBar=document.querySelector('.search-bar');
searchBar.classList.toggle('z-100');
searchBar.classList.toggle('scale-100');
})


const toggleNavbar = () => {
  navMenu.classList.toggle("-left-full");
  navMenu.classList.toggle("left-0");
};

window.addEventListener("scroll", () => {
  navBar.classList.toggle("navbar-fixed", window.scrollY > 0);
  goToTopBtn.classList.toggle("hidden", window.scrollY < 100);
});

themes.forEach((theme) => {
  theme.addEventListener("click", (event) => {
    saveTheme(theme.id);
  });
});

NavBarToggler.addEventListener("click", () => {
  toggleNavbar();
});

const saveTheme = (themeID) => {
    const theme = document.getElementById(themeID);
   const svg = theme.nextElementSibling.querySelector('svg').outerHTML;

  ThemeIcon.innerHTML = svg;
  theme.checked = true;
  
  switch (themeID) {
    case "light":
      localStorage.setItem("theme", "light");
      html.className = "light";
      break;
    case "dark":
      localStorage.setItem("theme", "dark");
      html.className = "dark";
      break;
    case "system":
      localStorage.setItem("theme", "system");
      html.className = darkModeQuery.matches ? "dark" : "light";
      break;
    default:
      localStorage.removeItem("theme");
      html.className = defaultMode;
      break;
  }
  saveSession(themeID);
};

const watchThemeMode = () => {
  let mode = localStorage.theme ?? defaultMode;
  saveTheme(mode);
};


const saveSession= async(theme)  =>{
  try {
    const res = await fetch(wpConfig.adminUrl+'admin-ajax.php',
    {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
      },
      body: new URLSearchParams({
        'action': 'save_theme_session',
        'theme': theme,
      })  
    });
if(res.status==200)
    console.log('wp session theme saved successfuly');
    else{
      console.log(res.status);
    }
  } catch (error) {
    // TypeError: Failed to fetch
    console.log('There was an error', error);
  }



  
}



window.onload = (e) => {
  watchThemeMode();
  // keep call saveTheme function if dark mode set to system keep watch change of user
  //  system setting after every 5 seconds
  setInterval(() => {
    let curMode = localStorage.theme ?? defaultMode;
    if (curMode != "system") return;
    watchThemeMode();
    console.log("watching", curMode);
  }, modeWatchTimeDelay);
};
