window.onload = function(){
var button = document.getElementById("lookup");
button.addEventListener("click", function(){
  let url = "world.php";
  let country = document.getElementById("country").value;
  //let cities = document.getElementById("cities").value;
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState === this.DONE && this.status === 200){
      let result = document.getElementById("result");
      result.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url + "?country=" + country + "&context=" ); // + "&context=" + cities);
  xhttp.send();
});



var cityButton = document.getElementById("cities");
cityButton.addEventListener("click", function(){
  let url = "world.php";
  let country = document.getElementById("country").value;

  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState === this.DONE && this.status === 200){
      let result = document.getElementById("result");
      result.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", url + "?country=" + country + "&context=cities");
  xhttp.send();
});


}
// function hey(){
//   alert("mhmm");
// }
