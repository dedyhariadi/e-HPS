
// JS for barang dropdown search (moved from detail.php)
let dropdownHasMouse = false;
let dropdownIsOpen = false;

function showSearchBarang() {
	var input = document.getElementById('searchBarang');
	input.style.display = '';
}

function hideSearchBarang() {
	setTimeout(function() {
		var input = document.getElementById('searchBarang');
		var dropdown = document.getElementById('idBarang');
		if (!dropdown.matches(':focus') && !input.matches(':focus') && !dropdownHasMouse && !dropdownIsOpen) {
			input.style.display = 'none';
		}
	}, 200);
}

function cariBarangRealtime() {
	const searchInput = document.getElementById('searchBarang');
	const dropdownContainer = document.getElementById('dropdownBarangContainer');
	const query = searchInput.value;
	fetch('/barang/search?q=' + encodeURIComponent(query))
		.then(response => response.json())
		.then(data => {
			let options = '';
			for (const barang of data) {
				options += `<option value="${barang.idBarang}">${barang.namaBarang}</option>`;
			}
			const dropdown = `<select name="idBarang" class="form-select mb-3 fs-4" id="idBarang" onfocus="showSearchBarang()" onblur="hideSearchBarang()">${options}</select>`;
			dropdownContainer.innerHTML = dropdown;
		});
}

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

	