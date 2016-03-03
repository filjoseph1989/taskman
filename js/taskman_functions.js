function popup (myclass, pos) {
  var p = window.pos;
  delete window.pos;

  if (myclass+'-'+pos == "task-parent") {
    $('.'+myclass+'-'+pos).click(function(){
      for (var i = 0; i <= p; i++) {
        $('.'+myclass+'-'+i).toggle();
      }
    });
  } else {
    $('.'+myclass+'-'+pos).click(function(){
      for (var i = pos+1; i <= p; i++) {
        $('.'+myclass+'-'+i).toggle();
      }
    });
  }
}
