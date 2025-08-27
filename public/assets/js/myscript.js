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

function validateBarangForm() {
  try {
    const searchInput = document.getElementById("searchBarang");
    if (!searchInput) {
      throw new Error("Elemen searchBarang tidak ditemukan.");
    }

    const selectedText = searchInput.value.trim().toUpperCase();
    if (selectedText === "") {
      alert("Silakan pilih barang dari dropdown yang tersedia.");
      return false;
    }

    const optionList = document.getElementById("optionList");
    if (!optionList) {
      throw new Error("Elemen optionList tidak ditemukan.");
    }

    const options = optionList.getElementsByTagName("li");
    let isValid = false;
    let validValue = "";

    for (let i = 0; i < options.length; i++) {
      const optionText = options[i].textContent || options[i].innerText;
      const trimmedOptionText = optionText.trim().toUpperCase();

      if (trimmedOptionText === selectedText) {
        isValid = true;
        validValue = options[i].getAttribute("data-value");
        break;
      }
    }

    if (!isValid) {
      alert("Barang yang dipilih tidak valid. Silakan pilih dari dropdown.");
      return false;
    }

    // Set nilai hidden input dengan value yang valid
    const hiddenInput = document.getElementById("idBarangHidden");
    if (hiddenInput) {
      hiddenInput.value = validValue;
    }

    return true;
  } catch (error) {
    console.error("Error in validateBarangForm:", error);
    alert("Terjadi kesalahan: " + error.message);
    return false;
  }
}

$(document).ready(function () {
  // Event untuk custom dropdown
  $("#customDropdown").on("mouseenter", function () {
    dropdownHasMouse = true;
  });
  $("#customDropdown").on("mouseleave", function () {
    dropdownHasMouse = false;
  });

  // Event untuk menutup dropdown saat klik di luar dalam modal
  $("#tambahBarangModal .modal-body").on("click", function (e) {
    const target = $(e.target);
    const dropdown = $("#customDropdown");
    const input = $("#searchBarang");

    // Jika klik di luar dropdown dan input, tutup dropdown
    if (
      !dropdown.is(target) &&
      dropdown.has(target).length === 0 &&
      !input.is(target) &&
      input.has(target).length === 0
    ) {
      dropdown.hide();
      dropdownIsOpen = false;
    }
  });

  // Event untuk menutup dropdown saat modal ditutup
  $("#tambahBarangModal").on("hidden.bs.modal", function () {
    $("#customDropdown").hide();
    dropdownIsOpen = false;
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

  // preview gambar untuk create modal
  $("#gambarCreate").change(function () {
    readURLCreate(this);
  });

  function readURLCreate(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#img-upload-create").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  // function untuk switch modal
  function switchToCreateModal() {
    // Tutup modal tambah barang
    $("#tambahBarangModal").modal("hide");
    // Buka modal create barang
    $("#createBarangModal").modal("show");
  }

  // function untuk kembali ke modal tambah barang dari create modal
  function switchToTambahModal() {
    $("#createBarangModal").modal("hide");
    $("#tambahBarangModal").modal("show");
  }

  // Event listener untuk refresh dropdown setelah create modal ditutup
  $("#createBarangModal").on("hidden.bs.modal", function () {
    // Refresh halaman untuk load data barang terbaru
    location.reload();
  });

  //datepicker
  $("#tanggal").datepicker({
    showAnim: "slideDown",
    dateFormat: "dd MM yy",
    changeMonth: true,
    changeYear: true,
    regional: "id",
  });
});
