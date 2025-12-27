<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('swal', function(e){
        details = e.detail[0];
        console.log(details);
        Swal.fire(details);
    });

</script>