var index = 0;
var all_imgs = ["car\\ferrari.jpg","car\\bmw.jpg","car\\cbmw.jpg","car\\benz.jpg","car\\srt.jpg","car\\audi.jpg","car\\lambo.jpg"];
var main_img = document.getElementById("main_image");
var imgs = document.getElementsByName("image");
imgs[0].border = "12px";

addEventListener("keydown",function(event){

    if(event.code == "ArrowRight"){

        if(index < 4){
            index++;
            imgs[index-1].border = "0px";
            imgs[index].border = "12px";
            main_img.src = all_imgs[index];
            
        }else if(index < all_imgs.length-1){
            index++;
            main_img.src = all_imgs[index];
            var i=4;
            for(j=index;i>=0;i--,j--){
                imgs[i].src = all_imgs[j];
            }
        }
        console.log(main_img.src);
    }
    

    if(event.code == "ArrowLeft"){
        if(index >0 && index < 5){
            index--;
            imgs[index+1].border = "0px";
            imgs[index].border = "12px";
            main_img.src = all_imgs[index];
        }else if(index > 4){
            index--;
            main_img.src = all_imgs[index];
            var i=4;
            for(j=index;i>=0;i--,j--){
                imgs[i].src = all_imgs[j];
            }
        }
    }
    
});