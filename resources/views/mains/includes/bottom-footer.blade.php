<script src="{{ asset('assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>

  <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('assets/ckeditor/samples/js/sample.js') }}"></script>

<script>

	initSample();

</script>



<!-- jQuery 3 -->



<!-- fullscreen -->

<script src="{{ asset('assets/vendor_components/screenfull/screenfull.js') }}"></script>





<!-- Bootstrap tagsinput -->

<script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>



<!-- Bootstrap touchspin -->



<!-- popper -->

<script src="{{ asset('assets/vendor_components/popper/dist/popper.min.js') }}"></script>



<!-- Bootstrap 4.0-->





<!-- date-range-picker -->







<!-- Slimscroll -->

<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>



<!-- FastClick -->

<script src="{{ asset('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>



<!-- eChart Plugins -->

<!-- <script src="assets/vendor_components/echarts/dist/echarts-en.min.js"></script> -->



<!-- Sparkline -->

<script src="{{ asset('assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>



<!-- toast -->

<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>







<!-- bootstrap datepicker -->

<script src="{{ asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>



<!-- bootstrap datetimepicker -->

<script src="{{ asset('assets/vendor_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- bootstrap time picker -->
<script src="{{ asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>

<script src="{{ asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/data-table.js') }}"></script>

<!-- Bootstrap WYSIHTML5 -->

<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>

<script src="{{ asset('assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>

<!-- VoiceX Admin for editor -->

<!-- <script src="{{ asset('assets/js/pages/editor.js') }}"></script> -->



<!-- VoiceX Admin App -->

<script src="{{ asset('assets/js/template.js') }}"></script>

<script src="{{ asset('assets/js/pages/voice-search.js') }}"></script>

<script src="{{ asset('assets/vendor_plugins/input-mask/jquery.inputmask.js') }}"></script>

<!-- VoiceX Admin dashboard demo (This is only for demo purposes) -->

<!-- <script src="{{ asset('assets/js/pages/dashboard4.js') }}"></script> -->

<script src="{{ asset('assets/vendor_components/select2/dist/js/select2.full.js') }}"></script>

<!-- VoiceX Admin for demo purposes -->

<script src="{{ asset('assets/js/demo.js') }}"></script>





<script src="{{ asset('assets/js/pages/advanced-form-element.js') }}"></script>

<script src="{{ asset('assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js') }}"></script>



<script>

	$("#flag-div").on("click", function () {

		$("#list-c").removeClass("hide")



	})







	$(".country").on("click", function () {

		alert($(this).data("dial-code"))

	});


  $(document).on("click",".remove_upload_ativity_images",function(){
    $(this).parent().remove();
  });



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
    //multiple file rendering
 function handleFileSelect(event) {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        // alert(files.length);
        var output = document.getElementById("previewImg");
        output.innerHTML="";

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var filesize = (files[i].size/1024).toFixed(4);

            //Only pics
            if (!file.type.match('image')) continue;

            if(filesize<=200)
            {
            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                 div.className = 'col-md-3';
                div.innerHTML = "<img class='upload_ativity_images_preview' src='" + picFile.result + "'" + "title='" + file.name + "' width=150 height=150 />";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
          }
          else
          {
            alert("Filesize should be less than or equal to 200kb");
          
          }
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

// document.getElementById('upload_ativity_images').addEventListener('change', handleFileSelect, false);
  //end of multiple file rendering

   //multiple file rendering
 function handleFileSelectTransport(event,output) {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById(output);
        output.innerHTML="";

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
              var filesize = (files[i].size/1024).toFixed(4);
            //Only pics
            if (!file.type.match('image')) continue;

            if(filesize<=200)
            {
            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                var div = document.createElement("div");
                 div.className = 'col-md-12';
                div.innerHTML = "<img class='upload_ativity_images_preview' src='" + picFile.result + "'" + "title='" + file.name + "' width=150 height=150 />";
                output.insertBefore(div, null);
            });
            //Read the image
            picReader.readAsDataURL(file);
             }
          else
          {
            alert("Filesize should be less than or equal to 200kb");

          }
        }
    } else {
        console.log("Your browser does not support File API");
    }
}

</script>
