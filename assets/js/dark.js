var state;
// light();

// function toggle() {
//     if (state) {
//         dark();
//     } else {
//         light();
//     }
// }
let currentTheme = localStorage.getItem("theme");
if (currentTheme === "light") {
    dark();
  } 
else {
    light();
}
function toggle() {   
    if (currentTheme === "light") {
        dark();
      } 
    else {
        light();
    }
    window.location.reload();
    localStorage.setItem("theme", state);
};

function light() {
    state = "light";
    document.getElementById("dark-css").disabled = true;
    document.getElementById("heading").classList.remove("bg-dark");
    document.getElementById("mode-toggle").classList.remove("fa-sun-o");
    document.getElementById("mode-toggle").classList.add("fa-moon-o");
    document.getElementById("name").classList.remove("text-light");
    document.getElementById("name").classList.add("text-dark");
    document.getElementById("nav").classList.remove("bg-dark");
    document.getElementById("nav").classList.add("bg-white");
    document.getElementById("brand").classList.remove("text-light");
    document.getElementsByClassName("foot-card")[0].classList.add("bg-white");
    document.getElementsByClassName("foot-card")[0].classList.remove("bg-dark");
    document.getElementsByClassName("foot-card")[1].classList.add("bg-white");
    document.getElementsByClassName("foot-card")[1].classList.remove("bg-dark");    
}

function dark() {
    state = "dark";
    document.getElementById("dark-css").disabled = false;
    document.getElementById("heading").classList.add("bg-dark");
    document.getElementById("mode-toggle").classList.add("fa-sun-o");
    document.getElementById("mode-toggle").classList.remove("fa-moon-o");
    document.getElementById("name").classList.add("text-light");
    document.getElementById("name").classList.remove("text-dark");
    document.getElementById("nav").classList.add("bg-dark");
    document.getElementById("nav").classList.remove("bg-white");
    document.getElementById("brand").classList.add("text-light");
    document.getElementsByClassName("foot-card")[0].classList.remove("bg-white");
    document.getElementsByClassName("foot-card")[0].classList.add("bg-dark");
    document.getElementsByClassName("foot-card")[1].classList.remove("bg-white");
    document.getElementsByClassName("foot-card")[1].classList.add("bg-dark");    
};
