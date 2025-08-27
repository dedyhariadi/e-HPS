// JS for barang dropdown search (moved from detail.php)
let dropdownHasMouse = false;
let dropdownIsOpen = false;

function showSearchBarang() {
  var input = document.getElementById("searchBarang");
  input.style.display = "";
}

function hideSearchBarang() {
  setTimeout(function () {
    var input = document.getElementById("searchBarang");
    var dropdown = document.getElementById("idBarang");
    if (
      !dropdown.matches(":focus") &&
      !input.matches(":focus") &&
      !dropdownHasMouse &&
      !dropdownIsOpen
    ) {
      input.style.display = "none";
    }
  }, 200);
}

function cariBarangRealtime() {
  const searchInput = document.getElementById("searchBarang");
  const filter = searchInput.value.toUpperCase();
  const select = document.getElementById("idBarang");
  const options = select.getElementsByTagName("option");

  for (let i = 0; i < options.length; i++) {
    const txtValue = options[i].textContent || options[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      options[i].style.display = "";
    } else {
      options[i].style.display = "none";
    }
  }
}

$(document).ready(function () {
  // preview gambar
  $(document).on("change", ".btn-file :file", function () {
    var input = $(this),
      label = input.val().replace(/\\/g, "/").replace(/.*\//, "");
    input.trigger("fileselect", [label]);
  });

  $(".btn-file :file").on("fileselect", function (event, label) {
    var input = $(this).parents(".input-group").find(":text"),
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
        $("#img-upload").attr("src", e.target.result);
        $("#errorGambar").addClass("hide");
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#gambar").change(function () {
    readURL(this);
  });

  // akhir preview gambar

  //datepicker
  $("#tanggal").datepicker({
    showAnim: "slideDown",
    dateFormat: "dd MM yy",
    changeMonth: true,
    changeYear: true,
    regional: "id",
  });
});
