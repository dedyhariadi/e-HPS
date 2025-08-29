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

  // Reset form ketika modal ditutup
  $("#tambahReferensiModal").on("hidden.bs.modal", function () {
    // Reset form jika diperlukan
    $(this).find("form")[0].reset();
    // Clear validation errors
    $(this).find(".is-invalid").removeClass("is-invalid");
    $(this).find(".invalid-feedback").text("");
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

// Fungsi untuk mendapatkan nilai radio button kopSurat dan redirect ke cetak PDF
function getKopSuratValue(event, kegiatanId) {
  console.log("getKopSuratValue called with kegiatanId:", kegiatanId);
  console.log("Event:", event);
  console.log("Event type:", event.type);
  console.log("Event target:", event.target);

  event.preventDefault(); // Mencegah popup window langsung terbuka
  console.log("event.preventDefault() called");

  // Cari radio button yang dipilih
  var selectedKopSurat = document.querySelector(
    'input[name="kopSurat"]:checked'
  );
  console.log("Selected kopSurat element:", selectedKopSurat);

  if (!selectedKopSurat) {
    console.log("No radio button selected");
    alert("Silakan pilih jenis kop surat terlebih dahulu!");
    return false;
  }

  var kopSuratValue = selectedKopSurat.value;
  console.log("kopSuratValue:", kopSuratValue);

  // Buat URL dengan parameter kopSurat
  var url =
    "/kegiatan/cetakPdf/" +
    kegiatanId +
    "?kopSurat=" +
    encodeURIComponent(kopSuratValue);
  console.log("Generated URL:", url);

  // Buka popup window dengan URL yang sudah include parameter
  var popup = window.open(
    url,
    "_blank",
    "width=800,height=600,scrollbars=yes,resizable=yes,toolbar=no,menubar=no,location=no,directories=no,status=no"
  );

  if (popup) {
    popup.focus();
    console.log("Popup opened successfully");
  } else {
    alert(
      "Popup blocker mungkin aktif. Silakan izinkan popup untuk situs ini."
    );
    console.log("Popup blocked");
  }

  return false;
}

// Pastikan fungsi terdaftar secara global
window.getKopSuratValue = getKopSuratValue;
console.log(
  "getKopSuratValue function registered globally:",
  typeof window.getKopSuratValue
);

// Test function untuk memastikan JavaScript berjalan dengan baik
function testFunction() {
  console.log("testFunction called - JavaScript is working!");
  return "JavaScript OK";
}

// Daftarkan test function secara global
window.testFunction = testFunction;

// Jalankan test saat script dimuat
console.log("myscript.js loaded successfully");
console.log("Test function result:", testFunction());

// Cek apakah ada error JavaScript
window.addEventListener("error", function (e) {
  console.error("JavaScript error detected:", e.error);
});

window.addEventListener("unhandledrejection", function (e) {
  console.error("Unhandled promise rejection:", e.reason);
});

// ===== KEGIATAN DETAIL PAGE FUNCTIONS =====

// Fungsi untuk handle error modal create barang
function handleCreateBarangModalError() {
  console.log("handleCreateBarangModalError called");

  // Jika ada error dari create barang, buka modal create barang
  if (
    typeof window.createBarangErrors !== "undefined" &&
    window.createBarangErrors
  ) {
    $("#createBarangModal").modal("show");

    // Isi form dengan data lama jika ada
    if (
      typeof window.createBarangOldInput !== "undefined" &&
      window.createBarangOldInput
    ) {
      var oldInput = window.createBarangOldInput;
      $("#createBarangForm input[name='namaBarang']").val(
        oldInput.namaBarang || ""
      );
      $("#createBarangForm select[name='idSatuan']").val(
        oldInput.idSatuan || ""
      );
    }

    // Tampilkan error messages di modal
    if (
      typeof window.createBarangErrors !== "undefined" &&
      window.createBarangErrors
    ) {
      var errors = window.createBarangErrors;
      var errorHtml =
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
      errorHtml += "<strong>Gagal menyimpan data:</strong><ul>";
      for (var field in errors) {
        errorHtml += "<li>" + errors[field] + "</li>";
      }
      errorHtml += "</ul>";
      errorHtml +=
        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
      errorHtml += "</div>";

      $("#createBarangModal .modal-body").prepend(errorHtml);
    }
  }
}

// Fungsi untuk debug Cetak PDF button
function debugCetakPdfButton() {
  console.log("Debug: Checking Cetak PDF button...");
  var cetakBtn = $('a[href*="cetakPdf"]');
  if (cetakBtn.length > 0) {
    console.log("Cetak PDF button found:", cetakBtn);
    console.log("Onclick handler:", cetakBtn.attr("onclick"));
    console.log("Button HTML:", cetakBtn.prop("outerHTML"));
    console.log("Button classes:", cetakBtn.attr("class"));
    console.log("Button is disabled:", cetakBtn.hasClass("disabled"));
  } else {
    console.log("Cetak PDF button not found");
  }
}

// Fungsi untuk debug radio buttons
function debugRadioButtons() {
  var radioButtons = $('input[name="kopSurat"]');
  console.log("Radio buttons found:", radioButtons.length);
  radioButtons.each(function (index) {
    console.log(
      "Radio button " + index + ":",
      $(this).val(),
      $(this).is(":checked")
    );
  });
}

// Fungsi untuk debug tabel dan modal buttons
function debugTableAndModalButtons() {
  // Debug: Log semua baris tabel dengan data-trx-id
  console.log("Available table rows with trx-id:");
  $("tr[data-trx-id]").each(function () {
    console.log("Row trx-id:", $(this).attr("data-trx-id"));
  });

  // Debug: Log semua tombol modal
  console.log("Available modal buttons:");
  $(
    '[data-bs-target*="#modalTambahReferensi"], [data-bs-target*="#createReferensiModal"]'
  ).each(function () {
    console.log("Button target:", $(this).attr("data-bs-target"));
  });
}

// Fungsi untuk highlight baris tabel ketika modal referensi dibuka
function initializeTableHighlight() {
  console.log("=== INITIALIZING TABLE HIGHLIGHT SYSTEM ===");

  // Highlight baris tabel ketika modal referensi dibuka - menggunakan event delegation
  $(document).on(
    "click",
    '[data-bs-target*="#modalTambahReferensi"], [data-bs-target*="#createReferensiModal"]',
    function (e) {
      console.log("=== MODAL CLICK DETECTED ===");
      var targetModal = $(this).attr("data-bs-target");
      var trxId = "";

      console.log("Modal target clicked:", targetModal);

      // Ekstrak trxId dari target modal dengan regex
      var modalTambahMatch = targetModal.match(
        /#modalTambahReferensi(\d+)(r[12])/
      );
      var createModalMatch = targetModal.match(
        /#createReferensiModal(\d+)(r[12])/
      );

      if (modalTambahMatch) {
        trxId = modalTambahMatch[1]; // Ambil angka di tengah
        console.log("Extracted trxId from modalTambahReferensi:", trxId);
      } else if (createModalMatch) {
        trxId = createModalMatch[1]; // Ambil angka di tengah
        console.log("Extracted trxId from createReferensiModal:", trxId);
      }

      // Hapus highlight dari semua baris
      $("tr[data-trx-id]").removeClass("table-warning");
      console.log("Removed highlight from all rows");

      // Tambahkan highlight pada baris yang sesuai
      if (trxId) {
        var targetRow = $('tr[data-trx-id="' + trxId + '"]');
        console.log("Looking for row with trxId:", trxId);
        console.log("Target row found:", targetRow.length);

        if (targetRow.length > 0) {
          targetRow.addClass("table-warning");
          console.log("✅ Highlight ADDED to row with trxId:", trxId);

          // Scroll ke baris yang di-highlight
          targetRow[0].scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
        } else {
          console.log("❌ No row found with trxId:", trxId);
        }
      } else {
        console.log("❌ No trxId extracted from modal target");
      }
    }
  );

  // Hapus highlight ketika modal ditutup
  $(document).on("hidden.bs.modal", ".modal", function () {
    $("tr[data-trx-id]").removeClass("table-warning");
    console.log("Highlight removed from all rows when modal closed");
  });

  console.log("=== HIGHLIGHT SYSTEM INITIALIZED ===");
}

// Fungsi untuk inisialisasi halaman detail kegiatan
function initializeKegiatanDetailPage() {
  console.log("=== INITIALIZING KEGIATAN DETAIL PAGE ===");

  // Verifikasi bahwa fungsi tersedia
  console.log(
    "getKopSuratValue function available:",
    typeof window.getKopSuratValue
  );

  // Handle error modal
  handleCreateBarangModalError();

  // Debug functions
  debugCetakPdfButton();
  debugRadioButtons();
  debugTableAndModalButtons();

  // Initialize table highlight system
  initializeTableHighlight();

  console.log("=== KEGIATAN DETAIL PAGE INITIALIZED ===");
}

// Auto-initialize jika di halaman detail kegiatan
$(document).ready(function () {
  // Cek apakah kita di halaman detail kegiatan
  if (
    $('input[name="kopSurat"]').length > 0 ||
    $("tr[data-trx-id]").length > 0
  ) {
    console.log("Detected kegiatan detail page, initializing...");
    initializeKegiatanDetailPage();
  }
});
