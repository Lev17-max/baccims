<script>
   $(document).ready(function() {
      inactivityTime();
   });

   var inactivityTime = function() {
      var time;
      window.onload = resetTimer;
      // DOM Events
      document.onmousemove = resetTimer;
      document.onkeydown = resetTimer;
      document.onload = resetTimer;
      document.onmousemove = resetTimer;
      document.onmousedown = resetTimer; // touchscreen presses
      document.ontouchstart = resetTimer;
      document.onclick = resetTimer; // touchpad clicks
      document.onkeydown = resetTimer; // onkeypress is deprectaed

      document.addEventListener('scroll', resetTimer, true);
      //logout function
      function logout() {
         let timerInterval
         Swal.fire({
            title: 'Inactive User!',
            icon: 'warning',
            html: 'Please interact with the website or this will close for <b></b> Seconds.',
            timer: 10000,
            showConfirmButton: true,
            timerProgressBar: true,
            didOpen: () => {
               Swal.showLoading()
               const b = Swal.getHtmlContainer().querySelector('b')
               timerInterval = setInterval(() => {
                  b.textContent = Math.floor(Swal.getTimerLeft() /1000)
               }, 1000)
            },
            willClose: () => {
               clearInterval(timerInterval)
            }
         }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                 window.location.href = "logout.php?";
            }
         })
      }
      function resetTimer() {
         clearTimeout(time);
         time = setTimeout(logout, 60000)
         // 1000 milliseconds = 1 second
      }
   };
</script>