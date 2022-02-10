function displayPage(page,num){
    var reports = document.getElementById('reports');
    var dash= document.getElementById('info');
    var cmaps= document.getElementById('maps');
    var form= document.getElementById('recordform');
    var user= document.getElementById('users');
    var msg= document.getElementById('message');
    const name = document.getElementById("name");
     name.innerHTML = page;
    const name2 = document.getElementById("name2");
     name2.innerHTML = page;

  if(num == 1){
     dash.classList.remove('d-none');
     msg.classList.add('d-none');
     reports.classList.add('d-none');
     user.classList.add('d-none');
     form.classList.add('d-none');
      cmaps.classList.add('d-none');
    

  }
   else if(num == 2){
     dash.classList.add('d-none');
     msg.classList.add('d-none');
     reports.classList.remove('d-none');
     user.classList.add('d-none');
     form.classList.add('d-none');
     cmaps.classList.add('d-none');

  }
    else if(num == 3){
     dash.classList.add('d-none');
     msg.classList.add('d-none');
     reports.classList.add('d-none');
     user.classList.add('d-none');
     form.classList.remove('d-none');
     cmaps.classList.add('d-none');

  }
   else if(num == 4){
     dash.classList.add('d-none');
     msg.classList.add('d-none');
     reports.classList.add('d-none');
     user.classList.add('d-none');
     form.classList.add('d-none');
     cmaps.classList.remove('d-none');
  }
    else if(num == 5){
     dash.classList.add('d-none');
     msg.classList.add('d-none');
     reports.classList.add('d-none');
     user.classList.remove('d-none');
     form.classList.add('d-none');
     cmaps.classList.add('d-none');
  }
  else if(num == 6){
     dash.classList.add('d-none');
     msg.classList.remove('d-none');
     reports.classList.add('d-none');
     user.classList.add('d-none');
     form.classList.add('d-none');
     cmaps.classList.add('d-none');
  }

   


}