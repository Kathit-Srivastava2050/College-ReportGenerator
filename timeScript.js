function calcTime(){
     var Hours=document.getElementById("Hours").textContent;
     var Minutes=document.getElementById("Minutes").textContent;
     var Seconds=document.getElementById("Seconds").textContent;
     /*if(Minutes<0){
      
        Hours=Hours-1;
        let updatedHours=Hours;
        document.getElementById("Hours").textContent=updatedHours;
        document.getElementById("Minutes").textContent=59;
        document.getElementById("Seconds").textContent=59;
        return;
        
     }
     else if(Seconds<=0){
      if(Minutes==0){
         document.getElementById("Minutes").textContent=59;
         document.getElementById("Secondds").textContent=59;
         return;
      }
        Minutes=Minutes-1;
        let updatedMinutes=Minutes;
        document.getElementById("Minutes").textContent=updatedMinutes;
        Seconds=60;
     }
     var updatedSeconds=Seconds-1;
     document.getElementById("Seconds").textContent=updatedSeconds;*/
     
     if(Seconds<=0){
      if(Minutes<=0){
         if(Hours>10){
            let updatedHours=Hours-1;
            document.getElementById("Hours").textContent=updatedHours;
            document.getElementById("Minutes").textContent=59;
            document.getElementById("Seconds").textContent=59;
            return;
         }
         else{
            let updatedHours=Hours-1;
            document.getElementById("Hours").textContent="0"+updatedHours;
            document.getElementById("Minutes").textContent=59;
            document.getElementById("Seconds").textContent=59;
            return;
         }
         
      }  
      else{
         if(Minutes>10){
            let updatedMinutes=Minutes-1;

            document.getElementById("Minutes").textContent=updatedMinutes;
            document.getElementById("Seconds").textContent=59;
            return;
         }
         else{
            let updatedMinutes=Minutes-1;

            document.getElementById("Minutes").textContent="0"+updatedMinutes;
            document.getElementById("Seconds").textContent=59;
            return;
         }
         
      }

     }
     else{
      if(Seconds>10){
         let updatedSeconds=Seconds-1;
         document.getElementById("Seconds").textContent=updatedSeconds;
      }
      else{
         let updatedSeconds=Seconds-1;
         document.getElementById("Seconds").textContent="0"+updatedSeconds;
      }
      
     }
     
      
   
}
function adjustBar(){
   var time=document.getElementById("timecheck").textContent;
   updatedTime=time-1;
   if(updatedTime<=0){
      window.location.replace("Redirect.php");
   }
   document.getElementById("timecheck").textContent=updatedTime;
   //console.log(updatedTime);
   var bar=document.getElementById("current-bar");
   let width=(updatedTime/3600)*100;
   let trueWidth=Math.floor(width);
   bar.style.width=`${trueWidth}%`;
   //console.log(trueWidth);
   
}
function triggerTheme(){
   //document.getElementById("body").style.backgroundColor="black";
   
   document.getElementsByClassName("left-box")[0].classList.toggle("active");
   document.getElementsByClassName("progress-bar-current")[0].classList.toggle("active");
   document.getElementsByClassName("themeTrigger")[0].classList.toggle("active");
   document.getElementsByClassName("right-header")[0].classList.toggle("active");
   document.getElementsByClassName("left-header")[0].classList.toggle("active");
   document.getElementsByClassName("right-lower-box")[0].classList.toggle("active");
  
   document.getElementById("first-row").classList.toggle("active");
   
   document.getElementById("on").classList.toggle("active");
   document.getElementById("off").classList.toggle("active");
   for(let i=0; i<3; i++){
      document.getElementsByClassName("cell")[i].classList.toggle("active");
      document.getElementsByClassName("icon")[i].classList.toggle("active");
      document.getElementsByClassName("img-container")[i].classList.toggle("active");
   }
   
   var rows=document.getElementsByClassName("not-first");
   for(let i=0; i<rows.length; i++){
      rows[i].classList.toggle("dark");
   }

   document.body.classList.toggle("active"); 

}
setInterval(calcTime, 1000);
setInterval(adjustBar, 1000);
function addListener(){
   document.getElementById("toggleTheme").addEventListener("click", triggerTheme);
}




function scrollDocument(){
   // console.log(window.innerHeight);
  // console.log(Math.floor(window.scrollY));
  // var targetEl=document.getElementById("end-point");
  // var targetRect=targetEl.getBoundingClientRect();
  var scrollHorizontal=document.getElementsByClassName("scroll-progress-bar")[0];

  var Yposition=window.scrollY;
  var totalHeight=(Math.floor(Yposition)/ (document.documentElement.scrollHeight-window.innerHeight))*100;
  //var width=(Math.floor(window.innerHeight/totalHeight))*100;
  scrollHorizontal.style.width=`${totalHeight}%`;
  //console.log(Math.floor(Yposition));
}
function attachEventScroll(){
    document.addEventListener("scroll", scrollDocument);
}