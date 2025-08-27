// JS for barang dropdown search (moved from detail.php)
let dropdownHasMouse = false;
let dropdownIsOpen = false;

function showDropdown() {
  const dropdown = document.getElementById("customDropdown");
  dropdown.style.display = "block";
  dropdownIsOpen = true;
}

function hideDropdown() {
  setTimeout(function () {
    const input = document.getElementById("searchBarang");
    const dropdown = document.getElementById("customDropdown");
    if (!input.matches(":focus") && !dropdownHasMouse && !dropdownIsOpen) {
      dropdown.style.display = "none";
    }
  }, 200);
}

function selectOption(value, text) {
  document.getElementById("idBarangHidden").value = value;
  document.getElementById("searchBarang").value = text;
  document.getElementById("customDropdown").style.display = "none";
  dropdownIsOpen = false;
}

function cariBarangRealtime() {
  const searchInput = document.getElementById("searchBarang");
  const filter = searchInput.value.toUpperCase();
  const optionList = document.getElementById("optionList");
  const options = optionList.getElementsByTagName("li");

  for (let i = 0; i < options.length; i++) {
    const txtValue = options[i].textContent || options[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      options[i].style.display = "";
    } else {
      options[i].style.display = "none";
    }
  }

  // Tampilkan dropdown jika ada hasil
  const hasVisible = Array.from(options).some(
    (li) => li.style.display !== "none"
  );
  document.getElementById("customDropdown").style.display = hasVisible
    ? "block"
    : "none";
}

$(document).ready(function () {
  // Event untuk custom dropdown
  $("#customDropdown").on("mouseenter", function () {
    dropdownHasMouse = true;
  });
  $("#customDropdown").on("mouseleave", function () {
    dropdownHasMouse = false;
  });

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
