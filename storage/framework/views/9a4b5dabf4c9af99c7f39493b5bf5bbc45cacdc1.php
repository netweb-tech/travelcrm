<script src="<?php echo e(asset('assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js')); ?>"></script>

  <script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>

<script src="<?php echo e(asset('assets/ckeditor/samples/js/sample.js')); ?>"></script>

<script>

	initSample();

</script>



<!-- jQuery 3 -->



<!-- fullscreen -->

<script src="<?php echo e(asset('assets/vendor_components/screenfull/screenfull.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/advanced-form-element.js')); ?>"></script>




<!-- Bootstrap tagsinput -->

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')); ?>"></script>



<!-- Bootstrap touchspin -->



<!-- popper -->

<script src="<?php echo e(asset('assets/vendor_components/popper/dist/popper.min.js')); ?>"></script>



<!-- Bootstrap 4.0-->





<!-- date-range-picker -->







<!-- Slimscroll -->

<script src="<?php echo e(asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>



<!-- FastClick -->

<script src="<?php echo e(asset('assets/vendor_components/fastclick/lib/fastclick.js')); ?>"></script>



<!-- eChart Plugins -->

<!-- <script src="assets/vendor_components/echarts/dist/echarts-en.min.js"></script> -->



<!-- Sparkline -->

<script src="<?php echo e(asset('assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js')); ?>"></script>



<!-- toast -->

<script src="<?php echo e(asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')); ?>"></script>







<!-- bootstrap datepicker -->

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')); ?>"></script>


<!-- bootstrap datetimepicker -->

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<!-- bootstrap time picker -->
<script src="<?php echo e(asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/moment/min/moment.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/datatable/datatables.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/pages/data-table.js')); ?>"></script>

<!-- Bootstrap WYSIHTML5 -->

<script src="<?php echo e(asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')); ?>"></script>

<!-- VoiceX Admin for editor -->

<!-- <script src="<?php echo e(asset('assets/js/pages/editor.js')); ?>"></script> -->


<script src="<?php echo e(asset('assets/vendor_plugins/iCheck/icheck.min.js')); ?>"></script>
<!-- VoiceX Admin App -->

<script src="<?php echo e(asset('assets/js/template.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/pages/voice-search.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_plugins/input-mask/jquery.inputmask.js')); ?>"></script>

<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->

<!-- <script src="<?php echo e(asset('assets/js/pages/dashboard4.js')); ?>"></script> -->

<script src="<?php echo e(asset('assets/vendor_components/select2/dist/js/select2.full.js')); ?>"></script>

<!-- VoiceX Admin for demo purposes -->

<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>





<script src="<?php echo e(asset('assets/js/pages/advanced-form-element.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/sweetalert/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js')); ?>"></script>

<!--daman-->
<script src="<?php echo e(asset('assets/vendor_components/OwlCarousel2/dist/owl.carousel.js')); ?>"></script>

	
	<!-- flexslider -->
	    <script src="<?php echo e(asset('assets/vendor_components/flexslider/jquery.flexslider.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/pages/slider.js')); ?>"></script>
     <script src="<?php echo e(asset('assets/vendor_plugins/bootstrap-slider/bootstrap-slider.js')); ?>"></script>
	



<script>

	$("#flag-div").on("click", function () {

		$("#list-c").removeClass("hide")



	})







	$(".country").on("click", function () {

		alert($(this).data("dial-code"))

	})



	function validateNumber(evt) {

  var theEvent = evt || window.event;



  // Handle paste

  if (theEvent.type === 'paste') {

      key = event.clipboardData.getData('text/plain');

  } else {

  // Handle key press

      var key = theEvent.keyCode || theEvent.which;

      key = String.fromCharCode(key);

  }

  var regex = /[0-9]|\./;

  if( !regex.test(key) ) {

    theEvent.returnValue = false;

    if(theEvent.preventDefault) theEvent.preventDefault();

  }

}


//     //multiple file rendering
//  function handleFileSelect(event) {
//     //Check File API support
//     if (window.File && window.FileList && window.FileReader) {

//         var files = event.target.files; //FileList object
//         var output = document.getElementById("previewImg");
//         output.innerHTML="";

//         for (var i = 0; i < files.length; i++) {
//             var file = files[i];
//             //Only pics
//             if (!file.type.match('image')) continue;

//             var picReader = new FileReader();
//             picReader.addEventListener("load", function (event) {
//                 var picFile = event.target;
//                 var div = document.createElement("div");
//                  div.className = 'col-md-3';
//                 div.innerHTML = "<img class='upload_ativity_images_preview' src='" + picFile.result + "'" + "title='" + file.name + "' width=150 height=150 />";
//                 output.insertBefore(div, null);
//             });
//             //Read the image
//             picReader.readAsDataURL(file);
//         }
//     } else {
//         console.log("Your browser does not support File API");
//     }
// }

// document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
//   //end of multiple file rendering

</script>
<?php /**PATH /home/tqfproco/crm.traveldoor.ge/resources/views/agent/includes/bottom-footer.blade.php ENDPATH**/ ?>