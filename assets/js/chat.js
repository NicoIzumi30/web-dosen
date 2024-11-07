$(document).ready(function() {
    $("#simpanButton").click(function() {
        var pesan = $("#pesan").val();
        $.ajax({
            url: "class/simpan_pesan.php",
            method: "POST",
            data: {
                pesan: pesan
            },
            success: function(response) {
                // Tanggapan dari server, Anda dapat memprosesnya di sini
                // alert("Data berhasil disimpan!");
                $("#pesan").val("");
            }
        });
    });
});
$(document).ready(function() {
    function fetchData() {
        $.ajax({
            url: 'class/getDiskusi.php',
            method: 'GET',
            success: function(data) {
                $('#pesanBox').html(data);
            }
        });
    }
    setInterval(fetchData, 1000);
});
window.addEventListener('DOMContentLoaded', function() {
    // Mengambil elemen div dengan id "scrollContainer"
    var scrollContainer = document.getElementById('pesanBox');

    // Memeriksa apakah elemen anak sudah dimuat sepenuhnya
    scrollContainer.addEventListener('load', function() {
        // Mengatur scrollTop ke nilai maksimum untuk menggulirkan ke bawah
        scrollContainer.scrollTop = scrollContainer.scrollHeight;
    });
});