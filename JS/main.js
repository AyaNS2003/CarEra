const panels = document.querySelectorAll(".panel");

panels.forEach((panel) => {
    panel.addEventListener("click", () => {
        removeActiveClasses();
        panel.classList.add("active");
    });
});

function removeActiveClasses() {
    panels.forEach((panel) => {
        panel.classList.remove("active");
    })
}

let Employees = 0;
let Coerteams = 0;
let Capital =0; 
let partners=0;
setInterval(() => {
     if (Employees < 200){
        Employees += 10;
     }
    if (Coerteams < 5){
        Coerteams += 1;
    }
    if (Capital<200){
        Capital += 10;
    }
    if (partners < 3260){
        partners +=202;
    }
  

  document.getElementById("empNum").innerHTML = Employees;
  document.getElementById("teams").innerHTML = Coerteams;
  document.getElementById("capital").innerHTML = Capital;
  document.getElementById("customer").innerHTML = partners;
  if (Employees >= 200 && Coerteams >= 5 && Capital>=200 && partners>=3260 ) {
    clearInterval();
  }
},75);