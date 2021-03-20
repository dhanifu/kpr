<script>
    function deleteUser(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda tidak akan bisa mengembalikan data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus ini!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "is Removing User",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteUser${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
        })
    }
</script>  