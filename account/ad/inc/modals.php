
                
<div class="container mt-3" style="z-index: 100px">

  <!-- Button to Open the Modal -->
 

  <!-- SIGNIN FORM -->

  <div class="modal fade mt-5 " id="myModal ">
  	<br>
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        
        <div id="signinform">

            <div class="modal-header">
              <h3 class="modal-title text-success"> <i class="fa fa-user"> </i> Login </h3>
              <button type="button" class=" close" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form onsubmit="alllogin()">
              
                <div class="form-group">
                  <div class="label">
                    <strong style="color:black">Email</strong>
                  </div>
                  <input type="email" id="loginemail" name="" placeholder="Email" class="form-control">
                </div>


                <div class="form-group">
                  <div class="label">
                    <strong style="color:black">Password</strong>
                  </div>
                  <input type="password" id="loginpassword" name="" placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                  <button id="loginbtn" name="loginbtn" class="btn btn-sm btn-success"><i class="fa fa-sign-in"></i> Login</button>

                  <p>Not yet Registered 

                <button type="button" class="text-success btn btn-link btn-sm" >
                    <!-- <span class="spinner-border text-sm spinner-border-sm" ></span>  -->
                    <i class="fa fa-sign-in"></i> Signup here
                </button>
              </p>

                </div>
              </form>
            </div>
        </div>


        <!-- SIGNUP FORM MODAL HERE -->






         <div id="signupform" class="d-none">
           <div class="modal-header">
              <h3 class="modal-title text-primary"> <i class="fa fa-user"> </i> Registration Form</h3>
              <button type="button" class="text-danger close" data-dismiss="modal">×</button>
            </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <small class="text-center">All fills with ( <span class="text-danger"> * </span> ) are important inputs and must be filled before submitting the form</small> <br><br>
          <form onsubmit="studentregistration()">
          
            <div class="form-group">
              <div class="label">
                <strong style="color:black">Fullname</strong> <strong class="text-danger">*</strong>
              </div>
              <input required type="text" id="studentname" name="studentname" placeholder="Fullname" class="form-control">
            </div>

            <div class="form-group">
              <div class="label">
                <strong style="color:black">Phone number</strong><strong class="text-danger">*</strong>
              </div>
              <input required type="number" id="studentphone" name="studentphone" placeholder="Phone number" class="form-control">
            </div>


            <div class="form-group">
              <div class="label mt-4">
                <strong style="color:black">Email</strong><strong class="text-danger">*</strong>
              </div>
              <input required type="email" id="studentemail" name="studentemail" placeholder="Email" class="form-control">
            </div>

            <div class="form-group">
              <div class="label mt-4">
                <strong style="color:black">address</strong>
              </div>
              <input type="text" name="studentaddress" id="studentaddress" placeholder="Address" class="form-control">
            </div>

            <div class="form-group">
              <div class="label mt-4">
                <strong style="color:black">Passport </strong><strong class="text-danger">*</strong>
              </div>
              <input required type="file" name="studentpassport" id="studentpassport" class="form-control">
            </div>



            <div class="form-group">
              <div class="label">
                <strong style="color:black">Password</strong><strong class="text-danger">*</strong>
              </div>
              <input required type="password" name="onepassword" id="onepassword" placeholder="Password" class="form-control">
              <small id="resone"></small>
            </div>

            <div class="form-group">
              <div class="label">
                <strong style="color:black">Confirm password</strong><strong class="text-danger">*</strong>
              </div>
              <input required type="password" oninput="checkpassword()" name="twopassword" id="twopassword" placeholder="Confirm password" class="form-control">
              <small id="restwo"></small>
            </div>

            <div class="form-group">
              <input required type="checkbox" name="studentterms" id="studentterms"> Accept terms and conditions
            </div>

            <div class="form-group">
              <button id="studentbutton"  name="studentbutton" class="w-50 btn btn-sm btn-primary"><i class="fa fa-sign-in"></i> Signup </button>  
              <p>Already Registered 

                <button type="button"  class=" btn btn-link btn-sm" onclick="toggledis('signupform', 'signinform')">
                    <!-- <span class="spinner-border text-sm spinner-border-sm" ></span>  -->
                    <i class="fa fa-sign-in"></i> Signin
                </button>
              </p>
            </div>
          </form>
        </div>
         </div> 

        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>










<div class="modal fade mt-5" id="beinstructor">
    <br><br><br><br>
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- SIGNUP FORM MODAL HERE -->
         <div id="signupform">
           <div class="modal-header">
              <h3 class="modal-title text-primary"> ---Become an Instructor---</h3>
              <button type="button" class=" close" data-dismiss="modal">×</button>
            </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form name="instructorForm" onsubmit="regInstructor()">
          
            <div class="form-group">
              <div class="label">
                <strong style="color:black">Fullname</strong>
              </div>
              <input type="text" name="fullname" placeholder="Fullname" class="form-control">
            </div>
            <div class="form-group">
              <div class="label">
                <strong style="color:black">Phone Number</strong>
              </div>
              <input type="number" name="phone" placeholder="Phone Number" class="form-control">
            </div>
            <div class="form-group">
              <div class="label">
                <strong style="color:black">Email</strong>
              </div>
              <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <div class="label">
                <strong style="color:black">Residential address</strong>
              </div>
              <input type="text" name="address" placeholder="Residential address" class="form-control">
            </div>

            <div class="form-group">
              <div class="label">
                <strong style="color:black">Experience</strong>
              </div>
              <textarea rows="3" class="form-control" name="experience" placeholder="Experience in Energy world"></textarea>
            </div>


             <div class="form-group">
             <div class="upload_file_container">
                <i class="fa fa-upload"></i> Upload CV
                <div id="upload-file-container" >
                   <input type="file" name="instructorcv" />
                </div>
            </div>
            </div>


            <div class="form-group">
              <button name="instruct_btn" class="btn btn-sm btn-primary"><i class="fa fa-sign-in"></i> Apply </button>  
             
            </div>
          </form>
        </div>
         </div> 

        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  
</div>


