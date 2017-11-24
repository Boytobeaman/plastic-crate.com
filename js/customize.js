$(function(){
   $("#primary>#main").append($("#primary>#main>.term-description"));
   $("#primary>#main>.page-title + .term-description").remove();
});