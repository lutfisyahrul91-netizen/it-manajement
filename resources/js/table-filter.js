document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const entriesSelect = document.getElementById("entriesSelect");
    const tableBody = document.getElementById("tableBody");
    const paginationContainer = document.getElementById("paginationContainer");

    if (!searchInput || !tableBody || !paginationContainer) return;

    // Ambil data tabel dari HTML (Hanya dilakukan sekali)
    const allRows = Array.from(tableBody.querySelectorAll("tr"));

    let currentPage = 1;
    let rowsPerPage = parseInt(entriesSelect.value) || 10;
    let filteredRows = [...allRows];

    // Fungsi Utama Update Tabel
    function updateTable() {
        // Sembunyikan semua dulu
        allRows.forEach((row) => (row.style.display = "none"));

        const totalRows = filteredRows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);

        // Pengamanan halaman
        if (currentPage < 1) currentPage = 1;
        if (currentPage > totalPages && totalPages > 0)
            currentPage = totalPages;

        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, totalRows);

        // Munculkan yang masuk filter dan halaman
        for (let i = startIndex; i < endIndex; i++) {
            filteredRows[i].style.display = "";
        }

        renderPagination(totalPages);
    }

    // Fungsi Render Tombol Sesuai Desain Anda
    function renderPagination(totalPages) {
        paginationContainer.innerHTML = "";
        if (totalPages <= 1 && filteredRows.length === 0) return;

        // Base CSS dari template Anda
        const btnBase =
            "font-family: 'Montserrat', sans-serif; font-size: 12px; font-weight: 500; cursor: pointer; outline: none; border: none; transition: 0.2s;";
        const stylePrevNext =
            btnBase + "background: transparent; color: #9E9E9E;";
        const styleActive =
            btnBase +
            "padding: 8px 12px; background: #624DE3; color: white; border-radius: 8px;";
        const styleInactive =
            btnBase +
            "padding: 8px 12px; background: #E0E0E0; color: black; border-radius: 8px;";

        // Tombol Previous
        const prevBtn = document.createElement("button");
        prevBtn.innerText = "Previous";
        prevBtn.style.cssText = stylePrevNext;
        if (currentPage === 1) {
            prevBtn.style.opacity = "0.5";
            prevBtn.style.cursor = "default";
        } else {
            prevBtn.addEventListener("click", () => {
                currentPage--;
                updateTable();
            });
        }
        paginationContainer.appendChild(prevBtn);

        // Tombol Angka (1, 2, ...)
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement("button");
            pageBtn.innerText = i;
            pageBtn.style.cssText =
                i === currentPage ? styleActive : styleInactive;

            if (i !== currentPage) {
                pageBtn.addEventListener("click", () => {
                    currentPage = i;
                    updateTable();
                });
            }
            paginationContainer.appendChild(pageBtn);
        }

        // Tombol Next
        const nextBtn = document.createElement("button");
        nextBtn.innerText = "Next";
        nextBtn.style.cssText = stylePrevNext;
        if (currentPage === totalPages || totalPages === 0) {
            nextBtn.style.opacity = "0.5";
            nextBtn.style.cursor = "default";
        } else {
            nextBtn.addEventListener("click", () => {
                currentPage++;
                updateTable();
            });
        }
        paginationContainer.appendChild(nextBtn);
    }

    // Aksi saat ketik di kolom Search
    searchInput.addEventListener("input", function (e) {
        const searchTerm = e.target.value.toLowerCase();
        filteredRows = allRows.filter((row) =>
            row.innerText.toLowerCase().includes(searchTerm),
        );
        currentPage = 1; // Reset ke hal 1
        updateTable();
    });

    // Aksi saat ganti Show 10/20 Entries
    entriesSelect.addEventListener("change", function (e) {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1; // Reset ke hal 1
        updateTable();
    });

    // Panggil saat pertama dimuat
    updateTable();
});
