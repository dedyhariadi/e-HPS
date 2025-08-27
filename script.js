$(document).ready(function () {
  $("#input-533").on("keyup", function () {
    var query = $(this).val();
    $.ajax({
      url: "/get-dropdown-options", // Ganti dengan endpoint Anda
      method: "GET",
      data: { q: query },
      success: function (data) {
        var $dropdown = $("#dropdown-536");
        $dropdown.empty();
        $.each(data.options, function (i, option) {
          $dropdown.append(
            $("<option>", {
              value: option.value,
              text: option.text,
            })
          );
        });
      },
    });
  });
});

// Fungsi untuk menampilkan input pencarian saat fokus pada dropdown
function showSearchBarang() {
  $("#searchBarang").show();
  $("#searchBarang").focus();
}

// Fungsi untuk menyembunyikan input pencarian saat blur
function hideSearchBarang() {
  setTimeout(function () {
    $("#searchBarang").hide();
  }, 200); // Delay untuk memungkinkan klik pada dropdown
}

// Fungsi untuk pencarian real-time pada dropdown barang (client-side)
function cariBarangRealtime() {
  var input = document.getElementById("searchBarang");
  var filter = input.value.toUpperCase();
  var select = document.getElementById("idBarang");
  var options = select.getElementsByTagName("option");

  for (var i = 0; i < options.length; i++) {
    var txtValue = options[i].textContent || options[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      options[i].style.display = "";
    } else {
      options[i].style.display = "none";
    }
  }
}
