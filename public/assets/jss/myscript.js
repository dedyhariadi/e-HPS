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



		$('#barang-search').select2
		(
			{
                                    placeholder: 'Cari barang...',
                                        allowClear: true,
                                        ajax: {
                                            url: '/barang/search',
                                            dataType: 'json',
                                            delay: 250,
                                            data: function(params) {
                                                return {
                                                    q: params.term // search term
                                                };
                                            },
                                            processResults: function(data) {
                                                return {
                                                    results: $.map(data, function(item) {
                                                        return {
                                                            id: item.idBarang,
                                                            text: item.namaBarang
                                                        }
                                                    })
                                                };
                                            },
                                            cache: true
                                        },
                                        minimumInputLength: 1
                                    });

	});

	