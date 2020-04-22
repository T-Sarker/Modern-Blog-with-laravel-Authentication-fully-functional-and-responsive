 <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="footerContent">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('/')}}assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
  			$('#submitButtonxc').attr('disabled','disabled');
  			function recheckPassword(){

  				 var pass = document.getElementById('password').value;
  				 var confirmPass = document.getElementById('confirmPassword').value;
  				 if (pass==confirmPass) {
  				 	$('#checkPass').html("<span style='color:green'>Password Matched</span>");
  				 	$('#submitButtonxc').removeAttr('disabled');
  				 }else{
  				 	$('#checkPass').html("<span style='color:red'>Password Not Matched</span>");
  				 }  				
  			}
  </script>

  <script>
        $(document).ready(function(){
          $.ajaxSetup({

              headers: {

                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

              }

          });

          $("#Email").blur(function(){
              var email = $(this).val();
              console.log(email);
               $.ajax({

                 type:'POST',

                 url:'/checkEmail',

                 data:{emailx:email},

                 success:function(data){

                    if (data=='true') {
                      $('.emailValidate').html('<b style="color:red">Email Already Registered</b>');
                      $('#submitButtonxc').attr('disabled','disabled');
                    }else{
                      $('.emailValidate').html('<b style="color:green">Email Valid</b>');
                    }


                 }

              });
          });
        });
  </script>

  <script>
          $(document).ready(function(){
          $.ajaxSetup({

              headers: {

                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

              }

          });

              var id = $('#postId').val();
              
              console.log('test'+id);
              if (id != null) {
                console.log('inside'+id);
              var CommentUrl = '{{ route('get-comments')  }}';
               $.ajax({

                 type:'POST',

                 url:CommentUrl,
                 data:{postid:id},
                 dataType: 'json',


                 success:function(data){
                    if (data.length != 0 ) {
                      var i=0;
                      for(i=0;i<data.length;i++){
                        // console.log("lol"+data[i]['comment']);
                        var html = '<div class="media mb-4">';
                                  html+= '<img class="d-flex mr-3 rounded-circle" src="'+'{{ asset("") }}'+data[i]['image']+'" alt="">';
                                    html+= '<div class="media-body">';
                                     html+= ' <h5 class="mt-0">'+data[i]['visitorName']+'</h5>';
                                      html+=data[i]['comment'];
                                    html+= '</div>';
                                  html+= '</div>';
                        $('.commentWraper').append(html)
                      }
                      
                    }else{
                       $('.commentWraper').text('No Comments Yet.');
                    }


                 }

              });
             }
        });
      </script>

</body>

</html>
