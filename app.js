const viewMap = document.querySelector(".view-map");
const viewUp = document.querySelector(".view-up");
const chevronUp = document.querySelector(".fa-chevron-up");
const chevronDown = document.querySelector(".fa-chevron-down");
const viewDown = document.querySelector(".view-down");
const faDOT =document.querySelector(".fa-location-dot");

const songBinhTrieu ="cau-binh-trieu";
const songPhuLong ="cau-phu-long";
const songDo ="cau-den-do";
viewUp.addEventListener("mouseover",function(){
    if(faDOT.classList.contains(songDo)){
        viewMap.style.backgroundPosition ="0px 0px";
       faDOT.classList.remove(songDo);
       faDOT.classList.add(songPhuLong);
    }
    else{
        viewMap.style.backgroundPosition ="0px 0px";
        faDOT.classList.remove(songBinhTrieu);
        faDOT.classList.add(songPhuLong);
    }
})
viewUp.addEventListener("mouseout",function(){
    viewMap.style.backgroundPosition ="0px -394px";
    faDOT.classList.remove(songPhuLong);
    faDOT.classList.add(songBinhTrieu);
})
viewDown.addEventListener("mouseover",function(){
    if(faDOT.classList.contains(songPhuLong)){
        viewMap.style.backgroundPosition ="0px -780px";
       faDOT.classList.remove(songPhuLong);
       faDOT.classList.add(songDo);
    }
    else{
        viewMap.style.backgroundPosition ="0px -780px";
        faDOT.classList.remove(songBinhTrieu);
        faDOT.classList.add(songDo);
    }
})

viewDown.addEventListener("mouseout",function(){
    viewMap.style.backgroundPosition ="0px -394px";
    faDOT.classList.remove(songDo);
    faDOT.classList.add(songBinhTrieu);
})
chevronUp.addEventListener("click",function(){
    viewMap.style.backgroundPosition ="0px 0px";
    if(faDOT.classList.contains(songBinhTrieu)){
        faDOT.classList.remove(songBinhTrieu);
        faDOT.classList.add(songPhuLong);
    }
    else{
        faDOT.classList.remove(songDo);
        faDOT.classList.add(songPhuLong);
    }
   
})
chevronDown.addEventListener("click",function(){
    viewMap.style.backgroundPosition ="0px -780px";
    if(faDOT.classList.contains(songBinhTrieu)){
        faDOT.classList.remove(songBinhTrieu);
        faDOT.classList.add(songDo);
    }
    else{
        faDOT.classList.remove(songPhuLong);
        faDOT.classList.add(songDo);
    }
})
