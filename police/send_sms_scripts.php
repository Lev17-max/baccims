  <script>
      $(document).ready(function() {
          $('#submitMsg').click(function() {
              var Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 4000,
              });
              Swal.fire({
                  title: 'Compose Message',
                  html:
                      '<div class="form-group"><input id="idMsg" class="d-none" value="<?php if (isset($_SESSION['USER_ID'])) {echo $_SESSION['USER_ID'];} ?>" name="id">' +
                      '<input id="dateMsg" class="d-none" value="<?php date_default_timezone_set('Asia/Manila');echo date('Y-m-d H:i:s');  ?>" name="date"><input id="subject" class="form-control" name="subject" placeholder="Subject:">' +
                      '</div><div class="form-group"><textarea id="compose-textarea" name="message" class="form-control" maxlength="100" rows="3"></textarea>' + '</div><div class="float-right"></div>',
                  focusConfirm: false,
                  customClass: {
                      container: 'overflow-hidden',

                  },
                  showCancelButton: true,
                  preConfirm: (value) => {
                      var id = document.getElementById('idMsg').value;
                      var date = document.getElementById('dateMsg').value;
                      var sub = document.getElementById('subject').value;
                      var msg = document.getElementById('compose-textarea').value;
                      if (id && date && sub && msg) {
                          $.ajax({
                              url: "send.php",
                              type: "post",
                              data: {
                                  id: id,
                                  date: date,
                                  subject: sub,
                                  date: date,
                                  message: msg,
                              },
                              cache: false,
                              success: function(result) {
                                  console.log(result);
                                  if (result) {
                                      Toast.fire({
                                          icon: 'success',
                                          title: 'Message Sent!',
                                      });
                                      message.value = '';
                                      sub.value = '';
                                      $('#msgtimeline').load('showmessage.php');
                                  }else if(!result){
                                    Toast.fire({
                                          icon: 'warning',
                                          title: 'Some user did not recieve the message!',
                                      });
                                      message.value = '';
                                      sub.value = '';
                                      $('#msgtimeline').load('showmessage.php');
                                    
                                  }else if(result == 3) {
                                    Toast.fire({
                                          icon: 'warning',
                                          text: 'No Residents Registered'+ result,
                                      });
                                  }else {
                                      Toast.fire({
                                          icon: 'error',
                                          text: 'Message Not Sent '+ result,
                                      });
                                      $('#msgtimeline').load('showmessage.php');
                                  }
                              },
                              error: function(jqXHR, textStatus, errorThrown) {
                                  alert(textStatus, errorThrown);
                              }
                          });
                      } else {
                          Swal.showValidationMessage(
                              'input data on all fields'
                          )
                      }









                  },
              });





          })
      });
  </script>