		<!-- SCRIPTS -->

		

		<!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- Dashboard init js-->
<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

<!-- SCRIPTS -->

<!-- Morris Chart -->
<script src="{{asset('assets/libs/morris-js/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>

<!-- toast scripts -->
<script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/pages/toastr.init.js')}}"></script>

<!-- <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script> -->
<!-- toast scripts -->

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

        <script>
			function clear_ck_editor_instances(){
				var CKEDITOR   = window.parent.CKEDITOR;  
                
                for ( var i in CKEDITOR.instances ){
                   var currentInstance = i;
                   break;
                }
                var oEditor   = CKEDITOR.instances[currentInstance];
                if (typeof oEditor != 'undefined') {
                    // $('#'+tag_id).val(oEditor.getData());
                    var tag_id=oEditor.name;
                    $('#'+tag_id).removeAttr('style');
                    $('#'+tag_id).val(oEditor.getData());
                    
                    CKEDITOR.instances[currentInstance].destroy();
                }
			}
          function applay_ckeditor(element_id,timeout){
			// CKEDITOR.create(document.getElementById(element_id)).then(editor => { element_id = editor });

			clear_ck_editor_instances();

              $(document).ready(function() {
                    CKEDITOR.replace( element_id );
              });
              document.addEventListener("DOMContentLoaded", () => {
                  Livewire.hook('element.updated', (el, component) => {
                      setTimeout(() => {
                        CKEDITOR.replace( element_id );
                      }, timeout);
                  });
              });

          }
		  $('button[type="submit"]').on('click',function(){
			clear_ck_editor_instances();
          });
        </script>

        <script src="{{asset('jquery.tableToExcel.js')}}"></script>

        <script>
            function exportToExcel(table_id){
              $('#'+table_id).tblToExcel();
            }
        </script>








