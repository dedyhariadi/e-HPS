$(document).ready( function() {

	// preview gambar
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    // if( input.length ) {
		    //     input.val(log);
		    // } else {
		    //     if( log ) alert(log);
		    // }

		});
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		        
		        reader.onload = function (e) {
					$('#img-upload').attr('src', e.target.result);
					$('#errorGambar').addClass('hide');
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		
		$("#gambar").change(function(){
			readURL(this);
		}); 	

		// akhir preview gambar


		//datepicker
		$('#tanggal').datepicker({
			showAnim: 'slideDown',
			dateFormat: 'dd MM yy',
			changeMonth: true,
			changeYear: true,
			regional: 'id',
		});



	});

	