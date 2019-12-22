var can = document.querySelector("canvas");
can.height=window.innerHeight;
can.width=window.innerWidth;

var c = can.getContext("2d");

var mouse = {
    x: undefined,
    y: undefined,
    button: 0
};

window.addEventListener("click",function(){
    mouse.button = 1;
});

function mb_reset(){
    mouse.button = 0;
}
 
window.addEventListener("mousemove",function(event){
    mouse.x=event.x;
    mouse.y=event.y;
    
});
window.addEventListener("resize",function(){
    can.height=window.innerHeight;
    can.width=window.innerWidth;
});
function Circle(x,y,radius,dx,dy,color) {
    
        this.x = x;
        this.y = y;
        this.radius = radius;
        this.prevradius = radius;
        this.dx = dx;
        this.dy = dy;
        this.color=color;
        this.draw = function () {
            //console.log(this.color);

            c.beginPath();
            c.arc(this.x,this.y,this.radius,0,Math.PI*2,false);
            //c.strokeStyle=this.color;
            //c.stroke();
            c.fillStyle=this.color;
            c.fill();
        }
        this.update = function () {
            
            if (this.x >= (window.innerWidth - this.radius) || (this.x - this.radius) <= 0) {
                this.dx = -this.dx;
            }
            if (this.y >= (window.innerHeight - this.radius) || (this.y - this.radius) <= 0) {
                this.dy = -this.dy;
            }

            if(mouse.x - this.x <50 && mouse.x - this.x > -50 && mouse.y - this.y <50 && mouse.y - this.y > -50 ){     
                if(this.radius < 60)//MaxRadius
                this.radius++;
            }else if(this.radius >= this.prevradius){//MinRadius is the original radius of the object
                this.radius--;       
            }
            

            this.x += this.dx;
            this.y += this.dy;
        };
    }




var c_array=[];
no_of_circles=200;

for(var i=0;i<no_of_circles;i++){
    //var radius =30;
    var radius =Math.floor(Math.random()*25)+10;
    var y = (Math.random() * (window.innerHeight - 2*radius))+radius; 
    var x = (Math.random() * (window.innerWidth - 2*radius))+radius;
    var dy = ((Math.random() - 0.5)*5);
    var dx = ((Math.random() - 0.5)*5);
    var c_list = ["gray","yellow","pink","orange","aqua","fuchsia","gold","gray","lime","megenta","white"];
    var rgb=c_list[parseInt(Math.random()*c_list.length)];

    c_array.push(new Circle(x,y,radius,dx,dy,rgb));
}
    



function animate(){
    requestAnimationFrame(animate);
    c.clearRect(0,0,window.innerWidth,window.innerHeight);

    for(var i=0;i<no_of_circles;i++){
        c_array[i].update();
        c_array[i].draw();
    }
    //for mini project

    var x1 = can.width/2-150;
    var y1 = can.height/2-90;
    var y2 = can.height/2;
    var y3 = can.height/2+90;
    var h = 60;
    var w = 320;

    c.font = "70px Arial black";
    c.textAlign = "center";
    c.fillStyle="black";
    c.fillText(" MINI GAMES",(can.width/2),can.height/2-200);
    c.strokeStyle="white";
    c.lineWidth = 1;
    c.strokeText(" MINI GAMES",(can.width/2),can.height/2-200);


    c.font = "50px Arial bold";
    c.beginPath();
    var pcolor = c.fillstyle;
    
    //c.strokeStyle = "rgba(225,200,0,0.5";
    c.fillStyle = "rgba(255,0,0,0.2)";

    c.fillRect(x1,y1,320,60);
    c.fillRect(x1,y2,320,60);
    c.fillRect(x1,y3,320,60);
    c.fill();
    c.fillStyle="black";

    c.fillText("SNAKE",(can.width/2) ,can.height/2-40);
    
    c.fillText("XOX", (can.width/2), can.height/2+50);
    
    c.fillText(" FLAPPY BOX", (can.width/2), can.height/2+70*2);
    
    
    c.fillStyle = pcolor;
    //snake
    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y1 && mouse.y < y1 + h && mouse.button == 1){
        window.open("snake\\snake.html");   
        mb_reset();
    }
    //xox
    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y2 && mouse.y < y2 + h && mouse.button == 1){
        window.open("xox\\xox.html");   
        mb_reset();
    }
    //flappy box
    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y3 && mouse.y < y3 + h && mouse.button == 1){
        window.open("flappybox\\flappybox.html");  
        mb_reset(); 
    }

    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y1 && mouse.y < y1 + h && mouse.button == 0){
        var pcolor = c.fillstyle;
        c.beginPath();
        c.fillStyle = "rgba(255,0,0,0.4)";
        c.fillRect(x1,y1,320,60);
        c.fill();
        c.fillStyle="black";
        c.fillText("SNAKE",(can.width/2) ,can.height/2-40);
        c.fillStyle = pcolor;
    }
    //xox
    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y2 && mouse.y < y2 + h && mouse.button == 0){
        var pcolor = c.fillstyle;
        c.beginPath();
        c.fillStyle = "rgba(255,0,0,0.4)";
        c.fillRect(x1,y2,320,60);
        c.fill();
        c.fillStyle="black";
        c.fillText("XOX", (can.width/2), can.height/2+50);
        c.fillStyle = pcolor;
    }
    //flappy box
    if( mouse.x > x1 && mouse.x < x1 + w && mouse.y > y3 && mouse.y < y3 + h && mouse.button == 0){
        var pcolor = c.fillstyle;
        c.beginPath();
        c.fillStyle = "rgba(255,0,0,0.4)";
        c.fillRect(x1,y3,320,60);
        c.fill();
        c.fillStyle="black";
        c.fillText(" FLAPPY BOX", (can.width/2), can.height/2+70*2);
        c.fillStyle = pcolor;
    }
    //for mini project


}

animate();