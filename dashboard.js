  //Gagan Sharma
  //19114032
  //gagansh7171@gmail.com

  
//sticky navbar
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
  if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
  } else {
      navbar.classList.remove("sticky");
  }
  }
    
    //window.onclick = closeNav;
  
  function Nav() {
      if (document.getElementById("mySidepanel").style.width == "0px"){
    document.getElementById("mySidepanel").style.width = "30%";
    document.getElementById("bars").innerHTML = "x";}
  else {
    document.getElementById("mySidepanel").style.width = "0";
    document.getElementById("bars").innerHTML = "☰";
  }
  }

  //tooltip select all elements wit datatoggle=tooltip
  $('[data-toggle="tooltip"]').tooltip();
  
  function s_0(){

      
    document.getElementById("login").style.display = "none";
    document.getElementById("subjectc_0").style.display = "block";
    document.getElementById("subjectc_1").style.display = "none";
    document.getElementById("subjectc_2").style.display = "none";
    document.getElementById("subjectc_3").style.display = "none";
    document.getElementById("subjectc_4").style.display = "none";
    document.getElementById("subjectc_5").style.display = "none";
    document.getElementById("subjectc_6").style.display = "none";
    document.getElementById("subjectc_7").style.display = "none";
    document.getElementById("subjectc_8").style.display = "none";
    document.getElementById("subjectc_9").style.display = "none";
    document.getElementById("subjectc_10").style.display = "none";
}

  function s_1(){
      
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "block";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";
  }

  function s_2(){
      
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "block";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";
  }

  function s_3(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "block";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";
  }

  function s_4(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "block";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";
  }


  function s_5(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "block";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";

  }

  function s_6(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "block";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";

  }

  function s_7(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "block";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";


  }

  function s_8(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "block";
      document.getElementById("subjectc_9").style.display = "none";
      document.getElementById("subjectc_10").style.display = "none";

  }

  function s_9(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display =  "block";
      document.getElementById("subjectc_10").style.display = "none";

  }

  function s_10(){
      document.getElementById("login").style.display = "none";
      document.getElementById("subjectc_0").style.display = "none";
      document.getElementById("subjectc_1").style.display = "none";
      document.getElementById("subjectc_2").style.display = "none";
      document.getElementById("subjectc_3").style.display = "none";
      document.getElementById("subjectc_4").style.display = "none";
      document.getElementById("subjectc_5").style.display = "none";
      document.getElementById("subjectc_6").style.display = "none";
      document.getElementById("subjectc_7").style.display = "none";
      document.getElementById("subjectc_8").style.display = "none";
      document.getElementById("subjectc_9").style.display =  "none";
      document.getElementById("subjectc_10").style.display = "block";

  }
  //Gagan Sharma
  //19114032
  //gagansh7171@gmail.com