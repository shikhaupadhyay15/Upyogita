<?php include('layout/header.php');
include('controller/Request.php');
include_once('routes.php');

if (isset($_POST['name'])) {
   $fields['orgName'] = $_POST['name'];
}
if (isset($_POST['phone'])) {
   $fields['orgPhone'] = $_POST['phone'];
}
if (isset($_POST['email'])) {
   $fields['orgEmail'] = $_POST['email'];
}
if (isset($_POST['address'])) {
   $fields['orgAddress'] = $_POST['address'];
}
if (isset($_POST['og_type'])) {
   $fields['orgType'] = $_POST['og_type'];
}
if (isset($fields) && count($fields)> 1) {
   $request = new Request(OrganizationSignUp);
   $request->settype('POST');
   $request->setPostFields($fields);
   $request->execute();
}

?>
<!--  contact -->
<div class="signup">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Register Your Organization</h2>
                  </div>
               </div>
               <div class="col-md-6 offset-md-3">
                  <form class="main_form" method="POST"> 
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Organization Name" type="type" name="name" required/> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Organization Phone Number" type="type" name="phone" required/> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Organization Email" type="email" name="email" required/>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="contactus" placeholder="Organization Address" type="type" Message="address" name="address" required/></textarea>
                        </div>
                        <div class="col-md-12">
                            <select class="contactus" name="og_type" required/>
                                <lable for="og-type">Organization Type</lable>  
                                <option value="Manufactoring">Manufactoring</option>
                                <option value="Other">Other</option> 
                            </select>                                                 
                        </div>
                        <div class="col-sm-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->
<?php include('layout/footer.php'); ?>