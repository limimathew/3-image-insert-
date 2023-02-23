//******************************  3 image insert



   <div class="col-lg-4 col-md-6 ">
                           <br> <br> <br> <br>
                                    <label > List Image</label>
                                    <div class="card image">
                                       <div class="card-body">
                                          <!-- <label for="input-file-disable-remove">You can disable remove button</label> -->
                                <input type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" id="fileToUpload" name="fileToUpload" class="dropify"   data-allowed-file-extensions="png jpg jpeg" data-max-file-size="100k"  />
								 	<input type="text" hidden id="image" name="image"  />
												  <progress value="0" id="uploader" max="100" style="display:none" >0%</progress>
												  <div id='progressid' style="display:none"><?PHP ECHO 'Uploading';?></div> 
                                       </div>
                                    </div>
                     </div>
                                   
                  
                                    <div class="col-lg-4 col-md-6 ">
                                    <br> <br> <br> <br>  

                                    <label > Top Image</label>
                                  
                                    <div class="card image">
                                       <div class="card-body">
                                          <!-- <label for="input-file-disable-remove">You can disable remove button</label> -->
                                <input type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="1M" id="fileToUpload2" name="fileToUpload2" class="dropify"   data-allowed-file-extensions="png jpg jpeg" data-max-file-size="100k"  />
								 	<input type="text" hidden id="image2" name="image2"  />
												  <progress value="0" id="uploader2" max="100" style="display:none" >0%</progress>
												  <div id='progressid2' style="display:none"><?PHP ECHO 'Uploading';?></div> 
                                       </div>
                                    </div>
                                    </div>
                  
                                    <div class="col-lg-4 col-md-6 ">
                                    <br> <br> <br> <br>  

                                    <label > Description Image</label>
                                  
                                    <div class="card image">
                                       <div class="card-body">
                                          <!-- <label for="input-file-disable-remove">You can disable remove button</label> -->
                                <input type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="10M" id="fileToUpload3" name="fileToUpload3" class="dropify"   data-allowed-file-extensions="png jpg jpeg" data-max-file-size="500k"  />
								 	<input type="text" hidden id="image3" name="image3"  />
												  <progress value="0" id="uploader3" max="100" style="display:none" >0%</progress>
												  <div id='progressid3' style="display:none"><?PHP ECHO 'Uploading';?></div> 
                                       </div>
                                    </div>
                                    </div>



                                    <!-- *****************   java script ********** -->


                                    <?php
                                    submitHandler: function(form) {
                           <?php if($_GET['page'] =='casestudy' ){ ?>
                                   
							var selectedFile; 
				var selectedFile2; 
				var selectedFile3; 
var iurls=''; 
var iurls2=''; 
var iurls3=''; 
var arr=[];
var arr2=[];
var arr3=[];
var files = document.getElementById("fileToUpload").files;
var files2 = document.getElementById("fileToUpload2").files;
var files3 = document.getElementById("fileToUpload3").files;
var pic = document.getElementById("fileToUpload");   
var pic2 = document.getElementById("fileToUpload2");   
var pic3 = document.getElementById("fileToUpload3");  

if(files.length==0){  
    
    functionsumitform(form); 

}else{
    captureimageupload();

}


function captureimageupload() 
{ 
for(i=0;i<files.length;i++){
          selectedFile = pic.files[i]; 
          var rtrn=myfunction(selectedFile); 
}  }

function myfunction(selectedFile) 
{ 
document.getElementById("progressid").style.display="";
document.getElementById("uploader").style.display="";
document.getElementById("progressid2").style.display="";
document.getElementById("uploader2").style.display="";
document.getElementById("progressid3").style.display="";
document.getElementById("uploader3").style.display="";
document.getElementById("submit").style.display="none";
          var name="Admin"+Date.now()+selectedFile.name; 
          var storageRef = firebase.storage().ref('Make/'+name); 
          var uploadTask = storageRef.put(selectedFile); 
          uploadTask.on('state_changed', function(snapshot){ 
            var progress =  (snapshot.bytesTransferred / snapshot.totalBytes) * 100; 
              var uploader = document.getElementById('uploader'); 
            
              uploader.value=progress; 
          }, function(error) {console.log(error); 
          }, function() { 
               uploadTask.snapshot.ref.getDownloadURL().then( 
                function(downloadURL) { 
            arr.push(downloadURL); 
            iurls = iurls+downloadURL+','; 
			   if(files.length==arr.length){
				   document.getElementById("image").value=iurls.substring(0, iurls.length - 1);
               captureimageupload2();
              
			   }
            }); 
          }); 
}	






function captureimageupload2() 
{ 
if(files2.length==0){  
   functionsumitform(form); 
}
for(j=0;j<files2.length;j++){

          selectedFile2 = pic2.files[j]; 
          var rtrn=myfunction2(selectedFile2); 
}  }



function captureimageupload3() 
{ 
if(files2.length==0){  
   functionsumitform(form); }
for(j=0;j<files2.length;j++){

          selectedFile3 = pic3.files[j]; 
          var rtrn=myfunction3(selectedFile3); 
} 
 }







 function myfunction2(selectedFile2) 
{ 
document.getElementById("progressid2").style.display="";
document.getElementById("uploader2").style.display="";
document.getElementById("submit").style.display="none";
          var name="Admin"+Date.now()+selectedFile2.name; 
          var storageRef = firebase.storage().ref('Category/'+name); 
          var uploadTask = storageRef.put(selectedFile2); 
          uploadTask.on('state_changed', function(snapshot){ 
            var progress =  (snapshot.bytesTransferred / snapshot.totalBytes) * 100; 
              var uploader = document.getElementById('uploader2'); 
              uploader.value=progress; 
          }, function(error) {console.log(error); 
          }, function() { 
               uploadTask.snapshot.ref.getDownloadURL().then( 
                function(downloadURL) { 
            arr2.push(downloadURL); 
            iurls2 = iurls2+downloadURL+','; 
			   if(files2.length==arr2.length){
				   document.getElementById("image2").value=iurls2.substring(0, iurls2.length - 1);
				    
               captureimageupload3();
			   }
            }); 
          }); 
}




function myfunction3(selectedFile3) 
{ 
document.getElementById("progressid3").style.display="";
document.getElementById("uploader3").style.display="";
document.getElementById("submit").style.display="none";
          var name="Admin"+Date.now()+selectedFile3.name; 
          var storageRef = firebase.storage().ref('Category/'+name); 
          var uploadTask = storageRef.put(selectedFile3); 
          uploadTask.on('state_changed', function(snapshot){ 
            var progress =  (snapshot.bytesTransferred / snapshot.totalBytes) * 100; 
              var uploader = document.getElementById('uploader3'); 
              uploader.value=progress; 
          }, function(error) {console.log(error); 
          }, function() { 
               uploadTask.snapshot.ref.getDownloadURL().then( 
                function(downloadURL) { 
            arr3.push(downloadURL); 
            iurls3 = iurls3+downloadURL+','; 
			   if(files3.length==arr3.length){
				   document.getElementById("image3").value=iurls3.substring(0, iurls3.length - 1);
				    
				   functionsumitform(form);
			   }
            }); 
          }); 
}


<?php }else{ ?>

functionsumitform(form);

<?php }   ?>





	
							function functionsumitform(form) 
{ 
//alert('submitted'); return;
							 
                             var formData = new FormData(form);
                             var form = $(add_make);
         					var url = 'MODULE_Casestudy';
         
         					$.ajax({
         					type: "POST",
         					url: url,
         					data: formData, // serializes the form's elements.
         					processData:false,
                            contentType: false,
         					cache:false,
         					success: function(data)
                            {
                              <?php if($_GET['page'] =='casestudy' ){ ?>
                                   
												document.getElementById("progressid").style.display="none";
												document.getElementById("uploader").style.display="none";
                                    document.getElementById("progressid2").style.display="none";
												document.getElementById("uploader2").style.display="none";
                                    document.getElementById("progressid3").style.display="none";
												document.getElementById("uploader3").style.display="none";
                                    <?php }  ?>
												document.getElementById("submit").style.display="";
												$( "#submit" ).prop( "disabled", false );
									  
         					//document.getElementById("add_service").reset();
                           if(Number(data)){
							    $('.dropify-clear').click();	 
							  document.getElementById("add_make").reset();

         	 Swal.fire({
                          text:  " Added Successfully ",
                         type: 'success',
         				showConfirmButton: false,
                         cancelButtonColor: '#d33',
         				 timer: 2500
                     }).then((result) => {
                         if (result.value) {
                          
                         }else{
         					  return false;
         				}
                     })
         				  }
         				  else{
         					Swal.fire({
                          text:  data,
                         type: 'error',
         				showConfirmButton: false,
                         cancelButtonColor: '#d33',
         				 timer: 2500
                     }).then((result) => {
                         if (result.value) {
                          
                         }else{
         					  return false;
         				}
                     })  
         				  }
         			
                            }
                               });
}				 
				 
						 			 
				 
