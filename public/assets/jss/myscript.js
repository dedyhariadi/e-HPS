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

// Function untuk search barang dropdown - Global scope
function searchBarang() {
    var input, filter, select, options, i, txtValue;
    input = document.getElementById("searchBarang");
    filter = input.value.toUpperCase();
    select = document.getElementById("idBarang");
    options = select.getElementsByTagName("option");

    // Reset dropdown jika pencarian kosong
    if (filter === "") {
        for (i = 0; i < options.length; i++) {
            options[i].style.display = "";
        }
        return;
    }

    // Filter options berdasarkan teks pencarian
    for (i = 0; i < options.length; i++) {
        txtValue = options[i].textContent || options[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            options[i].style.display = "";
        } else {
            options[i].style.display = "none";
        }
    }
}

// Event listener yang akan dijalankan setelah DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Event listener untuk memilih item dari dropdown berdasarkan pencarian
    var searchInput = document.getElementById("searchBarang");
    var selectBarang = document.getElementById("idBarang");
    
    if (searchInput && selectBarang) {
        searchInput.addEventListener("input", function() {
            var searchValue = this.value.toLowerCase();
            var options = selectBarang.getElementsByTagName("option");
            
            // Jika ada match exact, pilih otomatis
            for (var i = 0; i < options.length; i++) {
                var optionText = options[i].textContent || options[i].innerText;
                if (optionText.toLowerCase() === searchValue) {
                    selectBarang.selectedIndex = i;
                    break;
                }
            }
        });

        // Sinkronisasi input search dengan dropdown selection
        selectBarang.addEventListener("change", function() {
            var selectedText = this.options[this.selectedIndex].text;
            searchInput.value = selectedText;
        });
    }
});

	