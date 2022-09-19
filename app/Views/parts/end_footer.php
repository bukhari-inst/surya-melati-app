<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/assets/lib/wow/wow.min.js"></script>
<script src="<?= base_url(); ?>/assets/lib/easing/easing.min.js"></script>
<script src="<?= base_url(); ?>/assets/lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>/assets/lib/counterup/counterup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>/assets/js/datatables-simple-demo.js"></script>
<script>
// select poliklinik
function getFieldDataPoliklinik() {
    $('#tanggalkunjungan').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= site_url('/getPoliklinik') ?>",
            data: {
                tanggal: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $(' #poliklinik ').html(response.data);
                    $(' #poliklinik ').select2
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + " \ n " + xhr.responseText + " \ n " + thrownError);
            }
        });
    });
}

// select dokter
function getFieldDataDokter() {
    $('#poliklinik').change(function(e) {
        $.ajax({
            type: "post",
            url: "<?= site_url('/getDokter') ?>",
            data: {
                poliklinik: $(this).val()
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $(' #pilihdokter').html(response.data);
                    $(' #pilihdokter').select2
                }
            },
            error: function(xhr, thrownError) {
                alert(xhr.status + " \ n " + xhr.responseText + " \ n " + thrownError);
            }
        });
    });
}

function admSelectCheck(nameSelect) {
    if (nameSelect) {
        admOptionValue = document.getElementById("BPJS").value;
        if (admOptionValue == nameSelect.value) {
            document.getElementById("admDivCheck").style.display = "block";
        } else {
            document.getElementById("admDivCheck").style.display = "none";
        }
    } else {
        document.getElementById("admDivCheck").style.display = "none";
    }
}

$(document).ready(function() {
    getFieldDataPoliklinik();
    getFieldDataDokter();

    $('.js-example-basic-single').select2({
        width: 'resolve'
    });

    $('.select-pekerjaan').select2({
        width: 'resolve'
    });
});
</script>
<!-- Template Javascript -->
<script src="<?= base_url(); ?>/assets/js/main.js"></script>
</body>

</html>