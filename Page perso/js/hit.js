var audio = new Audio("audio/hit.mp3" ) ;

audio.oncanplaythrough = function(){
audio.play();
}

audio.loop = true;

audio.onended = function(){
audio.play();
}