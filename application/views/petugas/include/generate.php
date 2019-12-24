 <script language="javascript" type="text/javascript">
    function random_all() {
        var campur = "0123456789";
        var panjang = 10;
        var random_all = '';
        for (var i=0; i<panjang; i++) {
            var hasil = Math.floor(Math.random() * campur.length);
            random_all += campur.substring(hasil,hasil+1);
        }
        document.random_form.id_card.value = random_all;
        document.random_form.id_kodebuku.value = random_all;
    }

     function random_id() {
        var campur = "0123456789";
        var panjang = 10;
        var random_id = '';
        for (var i=0; i<panjang; i++) {
            var hasil = Math.floor(Math.random() * campur.length);
            random_id += campur.substring(hasil,hasil+1);
        }
        document.random_form.id_kodebuku.value = random_id;
    }
</script>