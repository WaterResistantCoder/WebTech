var can = document.querySelector("canvas");
can.height=window.innerHeight;
can.width=window.innerWidth;

var c = can.getContext("2d");

window.addEventListener("resize",function(){
    can.height=window.innerHeight;
    can.width=window.innerWidth;
});

function animate(){
    requestAnimationFrame(animate);
    c.clearRect(0,0,window.innerWidth,window.innerHeight);

    
}