// myscript.js

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchBarang');
    const dropdownContainer = document.getElementById('dropdownBarangContainer');
    if (!searchInput || !dropdownContainer) return;

    let ajaxTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(ajaxTimeout);
        ajaxTimeout = setTimeout(function() {
            const keyword = searchInput.value;
            fetch(`/kegiatan/searchBarang?keyword=${encodeURIComponent(keyword)}`)
                .then(response => response.text())
                .then(html => {
                    dropdownContainer.innerHTML = html;
                })
                .catch(err => {
                    dropdownContainer.innerHTML = '<span class="text-danger">Gagal memuat data barang</span>';
                });
        }, 300); // debounce 300ms
    });
});
