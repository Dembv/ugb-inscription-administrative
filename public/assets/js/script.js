document.querySelector("#btnSideBar").addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
    document.querySelector("#disparaitre").classList.toggle("enteteMobile");
    document.querySelector("#disparaitre2").classList.toggle("enteteMobile");
    let textes = document.querySelectorAll(".texteDisparaitre");

    textes.forEach(function(element) {
        element.classList.toggle("texteDisparaitre2");
    });

    let images = document.querySelectorAll(".imageReduit");

    images.forEach(function(element) {
        element.classList.toggle("imageReduit2");
    });

    document.querySelector("#liste").classList.toggle("text-end");

    let icones = document.querySelectorAll('.fas');

    icones.forEach(function(element) {
        element.classList.remove("pe-2");
    });
});