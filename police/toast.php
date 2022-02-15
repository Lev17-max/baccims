             <?php
              if (isset($_GET['user_not_found'])) {
                echo "
      
                            Toast.fire({
                           
                            title: ' User Not Found',
                            icon: 'error',
                            });

                           ";

                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                           snd.play();';
              } elseif (isset($_GET['errorreg'])) {
                echo "
      
                            Toast.fire({
                           
                            title: 'Registration Failed',
                            icon: 'error',
                           
                            });



                           ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                           snd.play();';
              } elseif (isset($_GET['errorregpersonel'])) {
                echo "
    
                          Toast.fire({
                         
                          title: 'Registration Failed',
                          icon: 'error',
                         
                          });



                         ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                         snd.play();';
              } elseif (isset($_GET['erroraddpersonel'])) {
                echo "
    
                          Toast.fire({
                         
                          title: 'Adding Failed',
                          icon: 'error',
                         
                          });



                         ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                         snd.play();';
              } elseif (isset($_GET['errorreg'])) {
                echo "
      
                            Toast.fire({
                           
                            title: 'Registration Failed',
                            icon: 'error',
                           
                            });



                           ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                           snd.play();';
              } elseif (isset($_GET['erroradd'])) {
                echo "
    
                          Toast.fire({
                         
                          title: 'Place Not Added',
                          icon: 'error',
                         
                          });



                         ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                         snd.play();';
              } elseif (isset($_GET['errorpersonel'])) {
                echo "
  
                        Toast.fire({
                       
                        title: 'Error Happened',
                        icon: 'error',
                       
                        });



                       ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                       snd.play();';
              } elseif (isset($_GET['successadd'])) {
                echo "
  
                        Toast.fire({
                       
                        title: 'Place Added',
                        icon: 'success',
                       
                        });



                       ";
              } elseif (isset($_GET['successform'])) {
                echo "

                      Toast.fire({
                     
                      title: 'Incident Recorded',
                      icon: 'success',
                     
                      });



                     ";
              } elseif (isset($_GET['errorform'])) {
                echo "

                    Toast.fire({
                   
                    title: 'Incident Not Record',
                    icon: 'error',
                   
                    });



                   ";
                echo 'var snd = new Audio("sound/error.mp3"); // buffers automatically when created
                   snd.play();';
              } elseif (isset($_GET['sent'])) {
                echo "
      
                            Toast.fire({
                           
                            title: 'Message Sent',
                            icon: 'success',
                            
                            });



                           ";
              } elseif (isset($_GET['successaddpersonel'])) {
                echo "
    
                          Toast.fire({
                         
                          title: 'Success',
                          icon: 'success',
                          
                          });



                         ";
              } elseif (isset($_GET['errorfile'])) {
                echo "
      
                            Toast.fire({
                           
                            title: 'Image Upload Failed',
                            icon: 'error',
                            
                            });



                           ";
              } elseif (isset($_GET['unauthorized'])) {
                echo "
                       
                          Toast.fire({
                            icon: 'warning',
                            title: 'Unauthorized Access',
                            
                            });


                            ";
              } elseif (isset($_GET['duplicateaddpersonel'])) {
                echo "
                     
                        Toast.fire({
                          icon: 'warning',
                          title: 'Username is Taken',
                          
                          });


                          ";
              } elseif (isset($_GET['errorsize'])) {
                echo "
                       
                          Toast.fire({
                            icon: 'warning',
                            title: 'File size is too big',
                            
                            });


                            ";
              } elseif (isset($_GET['notfoundpass'])) {
                echo "
                     
                        Toast.fire({
                          icon: 'warning',
                          title: 'User not found',
                          
                          });


                          ";
              } elseif (isset($_GET['passerror'])) {
                echo "
                   
                      Toast.fire({
                        icon: 'error',
                        title: 'Reset Password Failed',
                        
                        });


                        ";
              } elseif (isset($_GET[''])) {
                echo "
                       
                          Toast.fire({
                            icon: 'warning',
                            title: 'Unauthorized Access',
                             
                            });


                            ";
              } elseif (isset($_GET['success'])) {
                echo "
                       
                          Toast.fire({
                            icon: 'success',
                            title: 'Registration Sent!',
                            text: 'A message will be sent to your mobile number after validation',
                            
                            });


                            ";
              } elseif (isset($_GET['passreset'])) {
                echo "
                     
                        Toast.fire({
                          icon: 'success',
                          title: 'Password reset!',
                          text: 'You changed your password successfully',
                          
                          });


                          ";
              } elseif (isset($_GET['successpersonel'])) {
                echo "
                     
                        Toast.fire({
                          icon: 'success',
                          title: 'Account Created!',
                          
                          });


                          ";
              } elseif (isset($_GET['nouser'])) {
                echo "
                      
                           Toast.fire({
                            icon: 'warning',
                            title: 'Please Enter a Username',
                           
                            });

                            ";
              } elseif (isset($_GET['nouserpass'])) {
                echo "
                      
                          Toast.fire({
                            icon: 'warning',
                            title: 'Please Enter a Username or Password',
                            
                            });

                            ";
              } elseif (isset($_GET['resetpassworderror'])) {
                echo "
                                       
                                          Toast.fire({
                                            icon: 'error',
                                            title: 'Reset Password Failed',
                                            
                                            });
                    
                    
                                            ";
              } elseif (isset($_GET['resetpasswordsuccess'])) {
                echo "
                                           
                                              Toast.fire({
                                                icon: 'success',
                                                title: 'Password Reset Successfully',
                                                 
                                                });
                    
                    
                                                ";
              } elseif (isset($_GET['erroraddingpassword'])) {
                echo "
                                           
                                              Toast.fire({
                                                icon: 'error',
                                                title: 'Error Adding Password',
                                                 
                                                });
                    
                    
                                                ";
              } elseif (isset($_GET['errorchangepass'])) {
                echo "
                      
                          Toast.fire({
                            icon: 'error',
                            title: 'The Password Entered Encountered an Error',
                            
                            });

                            ";
              } elseif (isset($_GET['successchangepass'])) {
                echo "
                      
                          Toast.fire({
                            icon: 'success',
                            title: 'You have successfully changed Password',
                            
                            });

                            ";
              }
              ?>
                             

  