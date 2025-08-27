// JS for barang dropdown search (moved from detail.php)
let dropdownHasMouse = false;
let dropdownIsOpen = false;

// Global functions untuk modal switching
function switchToCreateModal() {
  console.log("switchToCreateModal called");

  // Check if jQuery is available
  if (typeof $ === "undefined") {
    console.error("jQuery is not loaded");
    return;
  }

  try {
    // Tutup modal tambah barang
    $("#tambahBarangModal").modal("hide");

    // Tunggu sebentar lalu buka modal create
    setTimeout(function () {
      $("#createBarangModal").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#createBarangModal").modal("show");
    }, 300);
  } catch (error) {
    console.error("Error in switchToCreateModal:", error);
  }
}

function switchToTambahModal() {
  console.log("switchToTambahModal called");

  // Check if jQuery is available
  if (typeof $ === "undefined") {
    console.error("jQuery is not loaded");
    return;
  }

  try {
    // Gunakan setTimeout untuk memastikan modal tertutup dengan benar
    $("#createBarangModal").modal("hide");

    setTimeout(function () {
      console.log("Opening tambahBarangModal");
      $("#tambahBarangModal").modal({
        backdrop: "static",
        keyboard: false,
      });
      $("#tambahBarangModal").modal("show");
    }, 300);
  } catch (error) {
    console.error("Error in switchToTambahModal:", error);
    // Fallback: gunakan location.reload jika ada masalah
    location.reload();
  }
}

// Make function globally available
window.switchToTambahModal = switchToTambahModal;

$(document).ready(function () {
  // Event handler untuk tombol kembali (di dalam document.ready untuk memastikan jQuery loaded)
  $(document).on("click", "#btnKembaliCreate", function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("btnKembaliCreate clicked via jQuery");

    // Hapus focus dari tombol untuk menghindari aria-hidden error
    $(this).blur();

    // Pastikan modal create ada dan visible
    if ($("#createBarangModal").hasClass("show")) {
      console.log("Closing createBarangModal");

      // Tandai bahwa modal ditutup oleh tombol kembali
      $("#createBarangModal").data("closed-by-kembali", true);

      // Tutup modal create secara manual
      $("#createBarangModal").modal("hide");

      // Tunggu modal create tertutup, lalu buka modal tambah
      $("#createBarangModal").on("hidden.bs.modal", function () {
        console.log("createBarangModal closed, opening tambahBarangModal");

        // Pastikan modal tambah ada
        if ($("#tambahBarangModal").length > 0) {
          $("#tambahBarangModal").modal({
            backdrop: "static",
            keyboard: false,
          });
          $("#tambahBarangModal").modal("show");
        } else {
          console.error("tambahBarangModal not found");
        }

        // Hapus event handler setelah digunakan
        $(this).off("hidden.bs.modal");
      });
    } else {
      console.log("createBarangModal is not visible");
    }
  });

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

  // function untuk switch modal sudah dipindah ke global scope

  // Event listener untuk refresh dropdown setelah create modal ditutup
  // Hanya refresh jika modal ditutup oleh close button, bukan oleh tombol kembali
  $("#createBarangModal").on("hidden.bs.modal", function (e) {
    // Cek apakah ini bukan dari tombol kembali (yang sudah handle sendiri)
    if (!$(this).data("closed-by-kembali")) {
      console.log("createBarangModal closed by other means, refreshing page");
      // Refresh halaman untuk load data barang terbaru
      location.reload();
    } else {
      // Reset flag
      $(this).data("closed-by-kembali", false);
    }
  });

  // Modal event handlers untuk debugging dan memastikan focus management
  $("#createBarangModal").on("show.bs.modal", function () {
    console.log("createBarangModal shown");
  });

  $("#createBarangModal").on("hide.bs.modal", function () {
    console.log("createBarangModal hiding");
    // Pastikan tidak ada focus yang tertinggal
    $(this).find(":focus").blur();
  });

  $("#tambahBarangModal").on("show.bs.modal", function () {
    console.log("tambahBarangModal shown");
  });

  $("#tambahBarangModal").on("hide.bs.modal", function () {
    console.log("tambahBarangModal hiding");
    // Pastikan tidak ada focus yang tertinggal
    $(this).find(":focus").blur();
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
