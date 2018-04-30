var instagram = {

    urlInsta: "https://api.instagram.com/v1/users/self/media/recent?access_token=7557414501.00a57b7.739eb6a798954b319569737ebf86ca67",
    init: function init() {
    ajaxGet(instagram.urlInsta, function (reponse) {

    var insta = JSON.parse(reponse);
    console.log(insta);

  var insta = insta['data'];
  for (var i = 0; i < insta.length; i++) {
       

var insta_id = insta[i].id;  
var created =insta[i].created_time;
var link =insta[i].link;
var standard_resolution = insta[i].images.standard_resolution.url;
var thumbnail= insta[i].images.thumbnail.url;
var name = insta[i].user.full_name;
var profile_picture = insta[i].user.profile_picture;
var username = insta[i].user.username;


    
    var divElt = document.createElement("div");
    divElt.setAttribute("class", "col-lg-3 col-md-4 col-xs-6 photos");
    divElt.innerHTML = '<img class="img-responsive img-thumbnail" src="' + standard_resolution + '"/>';
document.getElementById("rudr_instafeed").appendChild(divElt); 



};


var divProfil = document.createElement("div");
   divProfil.setAttribute("class", "profile_picture col-lg-3 col-md-4 col-xs-6");
    divProfil.innerHTML = '<img class="img-responsive img-circle" src="' + profile_picture + '"/>';
document.getElementById("profil").appendChild(divProfil);

var divUsername = document.createElement("div");
divUsername.setAttribute("class", " col-lg-3 col-md-4 col-xs-6 username");
   var h3Elt = document.createElement("h3");
   h3Elt.innerHTML = username;
divUsername.appendChild(h3Elt);
document.getElementById("profil").appendChild(divUsername);

var btn = document.createElement("div");
var a = document.createElement("a");
a.setAttribute("class", "lien_insta");
a.setAttribute("href", " https://www.instagram.com/stephan.serri/");
btn.setAttribute("class", " col-lg-3 col-md-4 col-xs-6 btn_elt");
   var btnElt = document.createElement("btn");
   btnElt.setAttribute("class", " btn btn-primary");
   btnElt.innerHTML = "S'abonner";
   a.appendChild(btnElt);
btn.appendChild(a);
document.getElementById("profil").appendChild(btn);




});
 
}

}

instagram.init();


